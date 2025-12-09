<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\checkRoleLogin;
use App\Http\Middleware\checkRoleLoginAdmin;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        api:__DIR__.'/../routes/api.php',
        
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->append(\Illuminate\Http\Middleware\HandleCors::class);
        $middleware->alias([
            "ClientAuth"=>checkRoleLogin::class,
            "AdminAuth"=>checkRoleLoginAdmin::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
