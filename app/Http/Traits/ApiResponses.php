<?php

namespace App\Http\Traits;

trait ApiResponses
{
    protected function successResponse($data, $message = 'Request successful')
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], 200);
    }

    protected function createdResponse($data, $message = 'Resource created')
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], 201);
    }

    protected function notFoundResponse($message = 'Resource not found')
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => null
        ], 404);
    }
}