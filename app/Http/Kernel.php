<?php

namespace TruckJee\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \TruckJee\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \TruckJee\Http\Middleware\VerifyCsrfToken::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \TruckJee\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \TruckJee\Http\Middleware\RedirectIfAuthenticated::class,
        'truckowner' => \TruckJee\Http\Middleware\TruckOwnerMiddleware::class,
        'admin' => \TruckJee\Http\Middleware\AdminMiddleware::class,
        'transporter' => \TruckJee\Http\Middleware\TransporterMiddleware::class,
    ];
}
