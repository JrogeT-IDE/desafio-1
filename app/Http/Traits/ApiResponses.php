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

    protected function badRequestResponse($message = 'Bad request')
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => null
        ], 400);
    }

    protected function conflictResponse($message = 'Conflict occurred')
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => null
        ], 409);
    }

    protected function validationExceptionResponse($errors, $message = 'Validation failed')
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'errors' => $errors
        ], 422);
    }

    protected function unauthenticatedResponse($message = 'Unauthenticated')
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => null
        ], 401);
    }

    protected function unauthorizedResponse($message = 'Unauthorized action')
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => null
        ], 403);
    }

    protected function serverErrorResponse($message = 'Server error')
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => null
        ], 500);
    }
}