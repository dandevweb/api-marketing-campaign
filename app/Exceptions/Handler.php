<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Lcobucci\JWT\Validation\ConstraintViolation;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof AuthorizationException) {

            return response()->json([
                'error' => class_basename(AuthorizationException::class),
                'message' => 'This action us unauthorized'
            ], 403);

        } elseif ($exception instanceof ModelNotFoundException) {

            $modelName = class_basename($exception->getModel());
            $apiErrorCode = $modelName . 'NotFoundException';
            $message = $modelName . ' not found.';

            return response()->json([
                'error' => $apiErrorCode,
                'message' => $message
            ], 404);

        } elseif ($exception instanceof QueryException) {

            return response()->json([
                'error' => 'Integrity constraint violation',
                'message' => 'There are fields from other tables linked to this model'
            ], 500);
        }

        return parent::render($request, $exception);
    }
}