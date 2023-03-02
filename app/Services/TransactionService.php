<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\ApiLog;
use App\Models\UserLoan;
use App\Models\LoanTransaction;
use App\Helpers\ResourcesHelper;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Http;

class TransactionService
{
    private $model;

    public function __construct(LoanTransaction $model)
    {
        $this->model = $model;
    }

    public function collection($inputs = [])
    {
        $transactions = [];
        $transactions = $this->model;

        if (!empty($inputs['loan_id'])) {
            $loan = UserLoan::whereMomentumId($inputs['loan_id'])->first();

            if (empty($loan)) {
                throw new CustomException(__('message.invalidEntity', ['entity' => 'loan-id']));
            }
    
            $transactions = $this->model->whereUserLoanId($loan->id);
        }


        if (!empty($inputs['search'])) {
            $transactions = $transactions->search($inputs['search']);
        }

        if (!empty($inputs['filters'])) {
            $transactions = $transactions->filter($inputs['filters']);
        }

        $transactions = $transactions->paginate(config('site.pagination.limit'));
        return $transactions;
    }

    public function resource($id, $inputs = [])
    {
        $transaction = $this->model->findOrFail($id);
        return $transaction;
    }
}
