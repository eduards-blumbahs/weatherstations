<?php

namespace App\Providers;

use App\Services\StationService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(StationService::class, function () {
            return new StationService(
                config('services.stations.base_path'),
                config('services.stations.resource_id')
            );
        });
    }
}
