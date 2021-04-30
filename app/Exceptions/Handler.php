<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /*
    public function report(Throwable $exception)
{
    if ($exception instanceof CustomException) {
        return redirect()->intended('login');
    }
    return redirect()->intended('login');
    parent::report($exception);
}

*/
/*
public function render($request, Exception $exception)
{
    if ($exception instanceof \Illuminate\Http\Exceptions\PostTooLargeException) {

       return \Illuminate\Support\Facades\Redirect::back()->withErrors(['msg' => 'The Message']);
    }

    return parent::render($request, $exception);
}
*/
}
