<?php

namespace App\Exceptions;

use App\Libraries\DBUtils;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

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

    /**
     * Render error exception.
     * @param Request $request
     * @param Throwable                $e
     * @return JsonResponse|\Illuminate\Http\Response|Response
     * @throws Throwable
     */
    public function render($request, Throwable $e)
    {
        $this->logError($request, $e);
        return parent::render($request, $e);
    }

    /**
     * Log error result.
     * @param           $oRequest
     * @param Throwable $oThrowable
     */
    private function logError($oRequest, Throwable $oThrowable)
    {
        Log::channel('error_stack')->error(
            (empty($oThrowable->getMessage()) === true) ? Response::$statusTexts[$oThrowable->getStatusCode()] : $oThrowable->getMessage(),
            DBUtils::formatRequestLog($oRequest)
        );
    }
}
