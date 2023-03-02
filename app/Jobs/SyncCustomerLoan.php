<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\User;
use App\Models\ApiLog;
use App\Models\UserLoan;
use Illuminate\Bus\Queueable;
use App\Helpers\ResourcesHelper;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SyncCustomerLoan implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;
    private $modelKeys = [
        'id',
        'loanName',
        'loanAmount',
        'principalDue',
        'principalBalance',
        'principalPaid',
        'interestDue',
        'interestPaid',
        'interestBalance',
        'accountState',
        'repaymentInstallments',
        'interestRate',
        'creationDate'
    ];
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $apiUrl = config('site.momentum.baseUrl') . '/clients/' . ($this->user->momentum_id) . '/loans';


            $response = Http::withHeaders([
                'ApiKey' => config('site.momentum.authKey'),
            ])->get($apiUrl);

            if ($response->status() == 200) {
                $loans = ResourcesHelper::collection($response->json(), $this->modelKeys);

                if ($loans->count() > 0) {
                    $loans->each(function ($item) {
                        $userLoan = UserLoan::updateOrCreate([
                            'momentum_id' => $item['id'],
                            'user_id' => $this->user->id
                        ], [
                            'user_id' => $this->user->id,
                            'momentum_id' => $item['id'],
                            'loan_name' => $item['loanName'],
                            'account_state' => $item['accountState'],
                            'interest_balance' => $item['interestBalance'],
                            'interest_due' => $item['interestDue'],
                            'interest_paid' => $item['interestPaid'],
                            'interest_rate' => $item['interestRate'],
                            'loan_amount' => $item['loanAmount'],
                            'principal_balance' => $item['principalBalance'],
                            'principal_due' => $item['principalDue'],
                            'principal_paid' => $item['principalPaid'],
                            'repayment_installments' => $item['repaymentInstallments'],
                            'creationDate' => Carbon::parse($item['creationDate'])
                        ]);
                    });
                }
            }
        } catch (\Throwable $th) {
            Log::info('========');
            Log::info('FAILED to Mambu API : ' . $th->getMessage());
            Log::info('========');
        }
    }
}
