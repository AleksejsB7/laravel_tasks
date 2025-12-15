<?php

namespace Testsproject\LaravelTasks;

use Illuminate\Support\ServiceProvider;

class LaravelTasksServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Load routes from this package
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        // Load migrations from this package
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
