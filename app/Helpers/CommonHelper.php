<?php

namespace App\Helpers;

use App\Models\ApiLog;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Http;

class CommonHelper
{
    public static function generateOtp(): Int
    {
        return rand(100000, 999999);
    }

    public static function sendSMS($inputs = [])
    {
        $http = new Http;

        try {
            $headers = config('site.sendSms.headers');
            $headers += [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ];

            $payload = [
                'messages' => [
                    'from' => config('site.sendSms.sendFrom'),
                    'destinations' => [
                        [
                            'to' => $inputs['phone']
                        ]
                    ],
                    'text' => $inputs['message']
                ]
            ];

            $response = $http::withHeaders($headers)->post(config('site.sendSms.apiUrl'), $payload);

            if ($response->status() == 200) {
                return true;
            }
        } catch (\Throwable $th) {
            throw new CustomException(__('message.sendSmsFailed'));
        }
        return false;
    }
}
