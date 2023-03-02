<?php

namespace App\Services;

use App\Models\ApiLog;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Http;

class ClientService
{
    public function getBalance($inputs = [])
    {
        $balance = 0;
        try {
            if (empty($inputs['phone'])) {
                throw new CustomException(__('message.invalidEntity', ['entity' => 'phone']));
            }

            $apiUrl = config('site.momentum.baseUrl') . '/clients/' . $inputs['momentum_id'] . '/loans';

            $response = Http::withHeaders([
                'ApiKey' => config('site.momentum.authKey'),
            ])->get($apiUrl);

            if ($response->status() == 200) {
                $response = $response->json();
                $response = collect($response)->map(function ($item) {
                    if (in_array($item['accountState'], ['ACTIVE_IN_ARREARS', 'ACTIVE'])) {
                        return $item['loanAmount'] - $item['principalBalance'];
                    }
                    return 0;
                })->toArray();
                $balance = array_sum($response);
            }
        } catch (\Throwable $th) {
            throw new CustomException($th->getMessage());
        }
        return $balance;
    }

    public function userExists($inputs = [])
    {
        if (empty($inputs['phone'])) {
            throw new CustomException(__('message.invalidEntity', ['entity' => 'phone']));
        }

        try {
            $apiUrl = config('site.momentum.baseUrl') . '/clients:search';

            $postData = [
                'filterCriteria' => [
                    [
                        'field' => 'mobilePhoneNumber',
                        'operator' => 'EQUALS',
                        'value' => $inputs['phone']
                    ]
                ]
            ];

            $response = Http::withHeaders([
                'Accept' => 'application/vnd.mambu.v2+json',
                'ApiKey' => config('site.momentum.authKey'),
            ])->post($apiUrl, $postData);

            if ($response->status() != 200) {
                throw new CustomException(__('message.userNotFoundAtMambu'));
            }

            $response = $response->json();

            if (empty($response)) {
                throw new CustomException(__('message.userNotFoundAtMambu'));
            }
        } catch (\Throwable $th) {
            throw new CustomException($th->getMessage());
        }

        return current($response);
    }
}
