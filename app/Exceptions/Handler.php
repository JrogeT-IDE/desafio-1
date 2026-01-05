<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Database\QueryException;
use Throwable;
use App\Http\Traits\ApiResponses;

class Handler extends ExceptionHandler
{
    use ApiResponses;

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->renderable(function (Throwable $e, $request) {
            if ($request->is('api/*')) {
                return $this->handleApiException($e, $request);
            }
        });
    }

    protected function handleApiException(Throwable $exception, $request)
    {
        if ($exception instanceof ValidationException) {
            return $this->validationExceptionResponse($exception->errors());
        }

        if ($exception instanceof ModelNotFoundException) {
            $model = class_basename($exception->getModel());
            return $this->notFoundResponse("$model not found");
        }

        if ($exception instanceof NotFoundHttpException) {
            return $this->notFoundResponse('Endpoint not found');
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return $this->badRequestResponse('Method not allowed for this endpoint');
        }

        if ($exception instanceof AuthenticationException) {
            return $this->unauthenticatedResponse($request, $exception);
        }

        if ($exception instanceof AuthorizationException) {
            return $this->unauthorizedResponse($exception->getMessage());
        }

        if ($exception instanceof QueryException) {
            if (config('app.debug')) {
                return $this->serverErrorResponse($exception->getMessage());
            }

            return $this->serverErrorResponse('Database query error');
        }

        if ($exception instanceof HttpException) {
            return $this->badRequestResponse($exception->getMessage());
        }

        if (config('app.debug')) {
            return $this->serverErrorResponse($exception->getMessage());
        }

        return $this->serverErrorResponse();
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return $this->unauthenticatedResponse();
        }

        return parent::unauthenticated($request, $exception);
    }
}