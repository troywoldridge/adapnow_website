<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SinaliteService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Binding the SinaliteService in the container
        $this->app->singleton(SinaliteService::class, function ($app) {
            return new SinaliteService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
