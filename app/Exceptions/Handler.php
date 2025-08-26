<?php

namespace App\Exceptions;
use Throwable;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\ErrorLog;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        'Symfony\Component\HttpKernel\Exception\HttpException'
    ];

    public function report(Throwable $e)
    {
        return parent::report($e);
    }

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
        dd($exception);
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException && $exception->getStatusCode() != 422){
            $errorData = [
                'message' => $exception->getMessage(),
                'code' => $exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException? $exception->getStatusCode(): 0,
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                // Add any other relevant data
            ];
            $errorLog = new ErrorLog;
            $errorLog->message = $exception->getMessage(); // The error message
            $errorLog->context = json_encode($errorData);  // JSON-encoded context or exception information
            $errorLog->line = $exception->getLine(); // Get the line number
            $errorLog->filename = $exception->getFile(); // Get the file name
            $errorLog->user_id = Auth::check() ? Auth::user()->id : null ; // Get the user id
            $errorLog->ip = request()->ip();
            $errorLog->url = request()->url();
            $errorLog->save();
            if ($this->isHttpException($exception)) {
                if ($exception->getStatusCode() == 400) {
                    return response()->view('errors.400', ['title' => '400 - Bad Request'], 400);
                }
                if ($exception->getStatusCode() == 500) {
                    return response()->view('errors.500', ['title' => '500 - Internal Server Error'], 500);
                }
                if ($exception->getStatusCode() == 404) {
                    return response()->view('errors.404', ['title' => '404 - Page Not Found'], 404);
                }
            } else {
                return response()->view('errors.other', ['title' => 'Something went worng']);
            }
        } else {
            return parent::render($request, $exception);
        }
    }

}
