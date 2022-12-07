<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Inertia\Inertia;
use Throwable;
use Exception;

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
        
        
        $this->reportable(function (Throwable $e){
           // $this->render($request,$e);
        });
    }
    
    public function renders($request, Throwable $e)
    {
        
        $response = parent::render($request, $e);

        if (in_array($response->status(), [403, 404, 500, 503])) {
            return Inertia::render('Error', ['status' => $response->status()])
                ->toResponse($request)
                ->setStatusCode($response->status());
        }

        return $response;
    }
    /**
     * Prepare exception for rendering.
     *
     * @param  \Throwable  $e
     * @return \Throwable
     */
    public function renderss($request, Throwable $e)
    {
        $response = parent::render($request, $e);
        

        return Inertia::render('Errors/Notfound', ['status' => $response->status()])
                ->toResponse($request)
                ->setStatusCode($response->status());

        if (!app()->environment(['local', 'testing']) && in_array($response->status(), [500, 503, 404, 403])) {
            return Inertia::render('Errors/Notfound', ['status' => $response->status()])
                ->toResponse($request)
                ->setStatusCode($response->status());
                //return Inertia::render('Errors/Notfound');
        } else if ($response->status() === 419) {
            return back()->with([
                'message' => 'The page expired, please try again.',
            ]);
        }

        return $response;
    }
}