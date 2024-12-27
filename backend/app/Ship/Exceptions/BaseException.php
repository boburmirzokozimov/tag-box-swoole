<?php

namespace Ship\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

abstract class BaseException extends Exception
{
    public function render(): JsonResponse
    {
        return response()->json([
            'success' => false,
            'data' => [],
            'error' => [
                'message' => $this->getMessage()
            ],
        ]);
    }
}
