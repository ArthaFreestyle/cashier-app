<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MyHelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        require_once app_path('helper/myhelper.php');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
