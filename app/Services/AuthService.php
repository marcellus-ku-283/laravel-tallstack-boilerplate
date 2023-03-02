<?php

namespace App\services;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserOTP;
use App\Models\UserDevice;
use App\Jobs\SyncCustomerLoan;
use App\Services\ClientService;
use App\Exceptions\CustomException;
use App\Http\Resources\User\Resource;
use App\Jobs\SyncCustomerLoanTransaction;
use App\Models\UserSecurityQuestionAnswer;
use App\Exceptions\UnauthenticatedException;

class AuthService
{
    protected $model;

    public function __construct(User $model)
    {
        if (!empty(request()->get('includes'))){
            $this->model = $model->with(request()->get('includes'));
        } else {
            $this->model = $model;
        }
    }

    public function login($inputs = [])
    {
        $user = $this->model->wherePhone($inputs['phone'])->first();

        if (empty($user) || !($inputs['pin'] == $user->pin)) {
            throw new UnauthenticatedException();
        }

        $this->updateDeviceToken($user->id);

        SyncCustomerLoan::dispatch($user);
        
        $user->refresh();
        $user = new Resource($user);
        
        $user->loans->each(function($item){
            SyncCustomerLoanTransaction::dispatch($item);
        });

        $data = [
            'user' => $user,
            'token' => $user->createToken(config('app.name'))->plainTextToken
        ];

        return $data;
    }

    public function register($inputs = [])
    {
        $userData = (new ClientService())->userExists([
            'phone' => $inputs['phone']
        ]);


        // Fetch user for phone number from request data
        $user = $this->model
            ->wherePhone($inputs['phone'])->first();

        if (!empty($user)) {
            throw new CustomException(__('message.userAlreadyExists'));
        }

        // Verify OTP process
        $otpService = new UserOtpService(new UserOTP());
        $otpService->verifyOtp([
            'code' => $inputs['code'],
            'code_for' => $inputs['code_for'],
            'phone' => $inputs['phone'],
        ]);


        // Created user after OTP verification.
        $user = User::create([
            'first_name' => $userData['firstName'],
            'last_name' => $userData['lastName'],
            'email' => $userData['emailAddress'],
            'momentum_id' => $userData['id'],
            'momentum_user_key' => $userData['assignedUserKey'],
            'phone' => $inputs['phone'],
            'pin' => $inputs['pin']
        ]);

        UserSecurityQuestionAnswer::create([
            'user_id' => $user->id,
            'question_id' => $inputs['question_id'],
            'answer' => $inputs['answer']
        ]);

        SyncCustomerLoan::dispatch($user);
        
        $user->refresh();
        $user = new Resource($user);
        
        $user->loans->each(function($item){
            SyncCustomerLoanTransaction::dispatch($item);
        });
        $data = [
            'user' => $user,
            'token' => $user->createToken(config('app.name'))->plainTextToken
        ];

        return $data;
    }

    public function forgotPin($inputs = [])
    {
        $user = User::wherePhone($inputs['phone'])->firstOrFail();

        if (empty($user->securityAnswer)) {
            throw new CustomException(__('message.questionIsNotAssociatedWithUser'));
        }

        if ($user->securityAnswer->answer != $inputs['security_answer']) {
            throw new CustomException(__('message.wrongAnswer'));
        }

        $userOtp = new UserOtpService(new UserOTP());
        $userOtp = $userOtp->sendOtp([
            'phone' => $inputs['phone'],
            'code_for' => $inputs['code_for'],
        ]);

        return [];
    }

    public function resetPin($inputs = [])
    {
        $userOtp = new UserOtpService(new UserOTP());
        $userOtp = $userOtp->verifyOtp([
            'phone' => $inputs['phone'],
            'code_for' => $inputs['code_for'],
            'code' => $inputs['code'],
        ]);

        $user = $this->model->wherePhone($inputs['phone'])->first();

        if (empty($user)) {
            throw new CustomException(__('message.invalidEntity', ['entity' => 'user']));
        }

        $user->pin = $inputs['pin'];
        $user->save();
        return [];
    }

    public function changePin($inputs = [])
    {
        $user = $this->model->whereId(auth()->id())->wherePin($inputs['old_pin'])->first();

        if (empty($user)) {
            throw new CustomException(__('message.invalidEntity', ['entity' => 'user']));
        }

        $user->pin = $inputs['new_pin'];
        $user->save();
        return [];
    }

    public function me($inputs = [])
    {
        return new Resource(auth()->user());
    }

    public function updateDeviceToken($userId = null): void
    {
        $userDevice = UserDevice::whereUserId($userId)->whereIntUdid(request()->header('int-udid'))->first();
        if (!empty($userDevice)) {
            // Check inactivity of user and logged-out user. 
            if (strtotime($userDevice->updated_at) <= Carbon::now()->subMinutes(config('site.in_activity_expiration'))->format('U')) {
                if(!empty(request()->user()))  request()->user()->currentAccessToken()->delete();
            }
            $userDevice->device_token = request()->header('device-token');
            $userDevice->updated_at = Carbon::now();
            $userDevice->save();
        } else {
            UserDevice::create([
                'user_id' => $userId,
                'int_udid' => request()->header('int-udid'),
                'device_type' => request()->header('device-type'),
                'device_token' => request()->header('device-token'),
                'is_login' => true
            ]);
        }
    }
}
