<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof ModelNotFoundException && $request->wantsJson())  {
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        }

        if ($exception instanceof TokenInvalidException && $request->wantsJson()) {


            return response()->json(['error' => 'Token is invalid'], 400);

        } elseif ($exception instanceof TokenExpiredException && $request->wantsJson()) {

            return response()->json(['error' => 'Token is expired'], 400);

        } elseif ($exception instanceof JWTException && $request->wantsJson()) {

            return response()->json(['error' => 'There is a problem with your token'], 400);

        }

        return parent::render($request, $exception);
    }
}
