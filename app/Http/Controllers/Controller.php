<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function responseWithSuccess($data, $message, $status = 200)
    {
        $response = [
            'success' => true,
            'data' => $data,
            'message' => $message
        ];

        return response()->json($response, $status);
    }

    public function responseWithError($errorData, $message, $status = 500)
    {
        $response = [];
        $response['message'] = $message;
        $response['success'] = false;
        if (!empty($errorData)) {
            $response['data'] = $errorData;
        }

        return response()->json($response, $status);
    }
}
