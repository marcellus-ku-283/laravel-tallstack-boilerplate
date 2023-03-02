<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\UserLoan;
use Illuminate\Bus\Queueable;
use App\Models\LoanTransaction;
use App\Helpers\ResourcesHelper;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Support\Facades\Log;

class SyncCustomerLoanTransaction implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $loan;
    private $modelKeys = [
        'encodedKey',
        'id',
        'creationDate',
        'type',
        'amount',
        'balance',
        'accountBalances',
        'totalBalance',
        'currency',
        'interestPaid',
        'principalBalance'
    ];
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(UserLoan $loan)
    {
        $this->loan = $loan;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //try {
        $apiUrl = config('site.momentum.baseUrl') . '/loans/' . $this->loan->momentum_id . '/transactions';


        $response = Http::withHeaders([
            'ApiKey' => config('site.momentum.authKey'),
        ])->get($apiUrl);

        if ($response->status() == 200) {
            $transactions = ResourcesHelper::collection($response->json(), [...$this->modelKeys, 'transactionId']);

            $loan = $this->loan;
            $transactions->each(function ($item) use ($loan) {
                LoanTransaction::updateOrCreate([
                    'user_loan_id' => $loan->id,
                    'user_id' => $loan->user_id,
                    'momentum_id' => $item['transactionId']
                ], [
                    'user_id' => $loan->user_id,
                    'user_loan_id' => $loan->id,
                    'momentum_id' => $item['transactionId'],
                    'encoded_key' => $item['encodedKey'],
                    'type' => $item['type'],
                    'principal_balance' => $item['principalBalance'],
                    'interest_paid' => $item['interestPaid'],
                    'balance' => $item['balance'],
                    'amount' => $item['amount'],
                    'creationDate' => Carbon::parse($item['creationDate'])
                ]);
            });

            $transactions = $transactions->map(function ($item) {
                $item['id'] = $item['transactionId'];
                unset($item['transactionId']);
                return $item;
            });
        }

        // } catch (\Throwable $th) {
        //     Log::info('========');
        //     Log::info('FAILED to Mambu API : ' . $th->getMessage());
        //     Log::info('========');
        // }
    }
}
