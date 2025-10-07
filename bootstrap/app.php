<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\LogRequests;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => AdminMiddleware::class,
            'log.requests' => LogRequests::class,
            // 'restrict.ip' => RestrictIpAccess::class,
        ]);
        // $middleware->append(LogRequests::class); // if i want to be globally
        // $middleware->prepend(RestrictIpAccess::class); // if i want to be globally
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
