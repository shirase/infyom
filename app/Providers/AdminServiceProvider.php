<?php

namespace App\Providers;

use App\Services\KCFinderService;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views/admin', 'admin');

        $this->publishes([
            __DIR__.'/../../node_modules/ckeditor4' => public_path('vendor/ckeditor4'),
        ], 'public');

        $this->publishes([
            __DIR__.'/../../vendor/sunhater/kcfinder' => public_path('vendor/kcfinder'),
        ], 'public');

        $this->app->get(KCFinderService::class);
    }
}
