<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Override public_path() to return base_path() since this project
        // was restructured for cPanel: the public/ directory was removed and
        // index.php + .htaccess serve directly from the project root.
        // Without this, public_path() returns {base}/public/ which doesn't exist.
        $this->app->instance('path.public', base_path());
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}