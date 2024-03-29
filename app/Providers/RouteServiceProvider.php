<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapColegiosRoutes();
        $this->mapWebRoutes();
        $this->mapAdminRoutes();
        $this->mapUserRoutes();
        $this->mapUserServiceRoutes();
        $this->mapWebService();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => ['web'],
            'namespace' => $this->namespace,
            'domain' => env('APP_DOMAIN', "cambalachea.co"),
        ], function ($router) {
            require base_path('routes/web.php');
        });
    }
    
    protected function mapColegiosRoutes()
    {
        Route::group([
            'middleware' => ["web"],
            'namespace' => $this->namespace,
            'domain' => env('APP_SUBDOMAIN', "colegios").".".env('APP_DOMAIN', "camblcambalacheaachea.co"),
        ], function ($router) {
            require base_path('routes/colegios.php');
        });
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::group([
            'middleware' => ['web','auth','admin'],
            'namespace' => $this->namespace, 
            'prefix' => "admin",
            'domain' => env('APP_DOMAIN', "cambalachea.co"),
        ], function ($router) {
            require base_path('routes/admin.php');
        });
    }

    /**
     * Define the "user" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapUserRoutes()
    {
        Route::group([
            'middleware' => ['web','userAccess','notAdmin','userPending'],
            'namespace' => $this->namespace, 
            'domain' => env('APP_DOMAIN', "cambalachea.co"),
        ], function ($router) {
            require base_path('routes/user.php');
        });
    }

    protected function mapUserServiceRoutes()
    {
        Route::group([
            'middleware' => ['web','auth','userService'],
            'namespace' => $this->namespace,  
            'domain' => env('APP_DOMAIN', "cambalachea.co"),
        ], function ($router) {
            require base_path('routes/service.php');
        });
    }
    
    protected function mapWebService()
    {
        Route::group([
            'middleware' => ['web'],
            'namespace' => $this->namespace,
            'domain' => env('APP_DOMAIN', "cambalachea.co"),
        ], function ($router) {
            require base_path('routes/webService.php');
        });
    }
}
