<?php

namespace Raahin\HumanResource\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class HumanResourceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . "/../../migrations");
        $this->loadRoutesFrom(__DIR__ . "/../../routes/routes.php");

        $this->publishes([
            __DIR__.'/../../config/main.php' => config_path('human-resource.php'),
        ], 'config');


    }
}
