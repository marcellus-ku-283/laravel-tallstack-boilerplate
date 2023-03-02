<?php

namespace App\services;

use Carbon\Carbon;
use App\Models\UserOTP;
use App\Helpers\CommonHelper;
use App\Exceptions\CustomException;

class UserOtpService
{
    protected $model;

    public function __construct(UserOTP $model)
    {
        $this->model = $model;
    }

    public function sendOtp($inputs = [])
    {
        $otpData = [];

        $otpData['code'] = CommonHelper::generateOtp();
        $otpData['code_for'] = $inputs['code_for'];

        // Check if user is logged-in
        if (auth()->check() && !empty(auth()->user())) {
            $otpData['user_id'] = auth()->id();
        } else {
            $otpData['phone'] = $inputs['phone'] ?? null;
        }

        $otpData['expired_at'] = Carbon::now()->addMinute(15);
        $userOtp = UserOTP::create($otpData);

        // Check project environment for prepare response
        if (config('site.send_otp') === true) {
            CommonHelper::sendSMS([
                'phone' => $inputs['phone'],
                'message' => __('message.sendSmsStr', [
                    'code' => $userOtp->code,
                    'code_for' => str()->replace('-', ' ', $inputs['code_for'])
                ])
            ]);
            return [];
        }

        $data = [];
        $data['code'] = $userOtp->code;
        return $data;
    }

    public function verifyOtp($inputs = [])
    {
        $userOtp = $this->model->whereCode($inputs['code'])->whereCodeFor($inputs['code_for']);

        if (auth()->check() && !empty(auth()->user())) {
            $userOtp = $userOtp->whereUserId(auth()->id());
        } else {
            $userOtp = $userOtp->wherePhone($inputs['phone']);
        }

        $userOtp = $userOtp->first();

        // Check for invalid OTP.
        if (empty($userOtp) || (!empty($userOtp) && !empty($userOtp->used_at))) {
            throw new CustomException(__('message.invalidEntity', ['entity' => 'OTP']));
        }

        if ($userOtp->expired_at < strtotime(date('Y-m-d H:i:s'))) {
            throw new CustomException(__('message.otpExpired'));
        }


        $userOtp->used_at = Carbon::now();
        $userOtp->save();
        return [];
    }
}
