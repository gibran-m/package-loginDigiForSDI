<?php

namespace Smpl\Logindigiforsdi;

use Illuminate\Support\ServiceProvider;

class LoginDigiForSdiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Smpl\Logindigiforsdi\Http\Controllers\LoginDigiForSDIController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'login');

        $this->publishes([
            __DIR__.'/../resources/config/login.php' => config_path('login.php')
        ],'config');
        $this->publishes([
            __DIR__.'/../resources/views/login'  => resource_path('views/vendor/login')
        ],'views');
        $this->publishes([
            __DIR__.'/../public/'  => public_path('/')
        ],'public');
    }
}
