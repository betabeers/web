<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class BaseApiController extends Controller
{
    public function errorResponse(string $message, int $status, array $errors = [])
    {
        return response([
            'message' => $message,
            'status_code' => $status,
            'errors' => $errors,
        ], $status);
    }
}