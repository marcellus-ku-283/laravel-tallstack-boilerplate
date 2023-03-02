<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\ApiLog;
use App\Helpers\ResourcesHelper;
use Illuminate\Support\Facades\Http;

class LoanProductService
{
    private $modelKeys = [
        'id',
        'productName',
        'loanProductType',
        'category',
        'minLoanAmount',
        'accountInitialState',
        'activated',
        'loanProductRules',
        'currency',
    ];

    public function collection($inputs = [])
    {
        $loanProducts = [];

        try {
            $apiUrl = config('site.momentum.baseUrl') . '/loanproducts';

            $response = Http::withHeaders([
                'ApiKey' => config('site.momentum.authKey'),
            ])->get($apiUrl);

            if ($response->status() == 200) {
                $loanProducts = ResourcesHelper::collection($response->json(), $this->modelKeys);
            }
        } catch (\Throwable $th) {
            throw new CustomException($th->getMessage());
        }

        return collect($loanProducts ?? []);
    }

    public function resource($id, $inputs = [])
    {
        try {
            $apiUrl = config('site.momentum.baseUrl') . '/loanproducts/' . $id;

            $response = Http::withHeaders([
                'ApiKey' => config('site.momentum.authKey'),
            ])->get($apiUrl);

            if ($response->status() == 200) {
                $loanProduct = ResourcesHelper::resource($response->json(), $this->modelKeys);
            }
        } catch (\Throwable $th) {
            throw new CustomException($th->getMessage());
        }

        return $loanProduct ?? null;
    }
}
