<?php

namespace App\Providers;

use App\Page\PageRouteMethods;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class PageServiceProvider extends ServiceProvider
{
    public function register()
    {
        Route::mixin(new PageRouteMethods());
    }

    public function boot()
    {

    }
}
