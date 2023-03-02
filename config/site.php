<?php

return [
    'send_otp' => env('APP_ENV', 'development') == 'production' ? true : false,
    'sendSms' =>  [
        'apiUrl' => env('MAMBU_SEND_SMS_API_URL', null),
        'headers' => [
            'Authorization' => 'App '.env('MAMBU_SEND_SMS_AUTHRIZATION', null),
            'ApiKey' => env('MAMBU_SEND_SMS_APIKEY', null), 
        ],
        'sendFrom' => env('MAMBU_SEND_SMS_FROM', null)
    ],
    'momentum' => [
        'baseUrl' => env('MAMBU_API_BASEURL', null),
        'authKey' => env('MAMBU_API_KEY', null)
    ],
    'in_activity_expiration' => '10',
    'pagination' => [
        'limit' => 10
    ]
];