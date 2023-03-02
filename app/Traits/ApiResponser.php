<?php

namespace App\Traits;

trait ApiResponser
{
    public function success($data = [], $message = '')
    {
        $responseData = [
            'success' => true,
            'errorcode' => 1,
            'message' => empty($message) ? 'Successful.' : $message,
            'data' => $data ?? [],
            'access_token' => '',
            'app_versions' => []
        ];
        return response()->json($responseData, 200);
    }

    public function failed($data = [], $message = '')
    {
        $responseData = [
            'success' => false,
            'errorcode' => 0,
            'message' => $message ?? 'Request failed to process.',
            'data' => $data ?? [],
            'access_token' => '',
            'app_versions' => []
        ];
        return response()->json($responseData, 200);
    }

    public function validationError($data = [], $message = '')
    {
        $responseData = [
            'success' => false,
            'errorcode' => -11,
            'message' => $message ?? 'Validation failed.',
            'data' => $data ?? [],
            'access_token' => '',
            'app_versions' => []
        ];
        return response()->json($responseData, 200);
    }

    public function invalidAccessToken($data = [], $message = '')
    {
        $responseData = [
            'success' => false,
            'errorcode' => -13,
            'message' => $message ?? 'Invalid access token.',
            'data' => $data ?? [],
            'access_token' => '',
            'app_versions' => []
        ];
        return response()->json($responseData, 200);
    }
}
