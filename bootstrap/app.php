<?php

use App\Models\ErrorModel;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\Role;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // $exceptions->reportable(function(Throwable $e){
        //     $exc = $e->getTrace();
        //     if($user = Auth::user()){
        //     ErrorModel::create([
        //         'ID_USER' => $user->id,
        //         'Controller' => $exc[0]['class'],
        //         'Function' => $exc[0]['function'],
        //         'Error_Line' => $e->getLine(),
        //         'Error_Message' => $e->getMessage()
        //     ]);
        //     }
        // });
    })->create();
