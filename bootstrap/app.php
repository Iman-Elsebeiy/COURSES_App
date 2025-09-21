<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Foundation\Application;
use App\Http\Middleware\RedirectIfAdmin;
use App\Http\Middleware\AdminConfirmPassword;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
          // Global middleware
        // $middleware->append(RoleMiddleware::class);
        //
        $middleware->alias([
            'role' =>CheckRole::class,
            // 'guest' => RedirectIfAuthenticated::class,
            //admin middleware
            'admin.guest'=>RedirectIfAdmin::class, 
           

        ]);

     
        // 'auth' => Authenticate::class,
        // 'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        // 'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        // 'can' => \Illuminate\Auth\Middleware\Authorize::class,
        // 'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        // 'guest' => RedirectIfAuthenticated::class,
        // 'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        // 'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        // 'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        // 'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
   
        // 'admin' => AdminMiddleware::class,
 
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
