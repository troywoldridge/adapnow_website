<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SinaliteService;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log; // Ensure this is imported

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Binding the SinaliteService in the container
        $this->app->singleton(SinaliteService::class, function () {
            return new SinaliteService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share categories with all views
        view()->composer('*', function ($view) {
            // Caching categories for better performance
            $categories = Cache::remember('categories', now()->addMinutes(60), function () {
                return Category::all();
            });

            // Correct logging of the categories array
            Log::info('Categories fetched:', ['categories' => $categories->toArray()]);

            // Sharing categories across all views
            $view->with('categories', $categories);
        });
    }
}


