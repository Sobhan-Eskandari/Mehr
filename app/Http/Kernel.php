<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'admin' => \App\Http\Middleware\RedirectIfNotAdmin::class,
        'admin.guest' => \App\Http\Middleware\RedirectIfAdmin::class,
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'CreateCustomerMiddleware' => \App\Http\Middleware\CreateCustomerMiddleware::class,
        'EditCustomerMiddleware' => \App\Http\Middleware\EditCustomerMiddleware::class,
        'DeleteCustomerMiddleware' => \App\Http\Middleware\DeleteCustomerMiddleware::class,
        'CreateMarketMiddleware' => \App\Http\Middleware\CreateMarketMiddleware::class,
        'EditMarketMiddleware' => \App\Http\Middleware\EditMarketMiddleware::class,
        'DeleteMarketMiddleware' => \App\Http\Middleware\DeleteMarketMiddleware::class,
        'CreateAdminMiddleware' => \App\Http\Middleware\CreateAdminMiddleware::class,
        'EditAdminMiddleware' => \App\Http\Middleware\EditAdminMiddleware::class,
        'DeleteAdminMiddleware' => \App\Http\Middleware\DeleteAdminMiddleware::class,
        'ViewMessageMiddleware' => \App\Http\Middleware\ViewMessageMiddleware::class,
        'CreateNewsMiddleware' => \App\Http\Middleware\CreateNewsMiddleware::class,
        'EditNewsMiddleware' => \App\Http\Middleware\EditNewsMiddleware::class,
        'DeleteNewsMiddleware' => \App\Http\Middleware\DeleteNewsMiddleware::class,
        'jibirish' => \App\Http\Middleware\jibirish::class,
    ];
}
