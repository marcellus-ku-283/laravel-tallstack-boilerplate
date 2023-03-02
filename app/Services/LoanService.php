<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\ApiLog;
use App\Models\UserLoan;
use App\Helpers\ResourcesHelper;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class LoanService
{
    private $model;

    public function __construct(UserLoan $model)
    {
        $this->model = $model;
    }

    public function collection($inputs = [])
    {
        $loans = [];

        if (auth()->user()->role == 'admin') {
            $loans = $this->model;
        } else {
            $loans = $this->model->whereUserId(auth()->id() ?? null);
        }
        

        if (!empty($inputs['search'])) {
            $loans = $loans->search($inputs['search']);
        }

        if (!empty($inputs['filters'])) {
            $loans = $loans->filter($inputs['filters']);
        }
        $loans = $loans->paginate(config('site.pagination.limit'));
        return $loans;
    }

    public function resource($id, $inputs = [])
    {
        $loan = $this->model->whereMomentumId($id)->firstOrFail();
        return $loan;
    }
}
