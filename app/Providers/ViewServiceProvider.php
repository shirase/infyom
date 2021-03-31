<?php

namespace App\Providers;

use App\Http\View\Composers\BreadcrumbsComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        View::composer('layouts.breadcrumbs', BreadcrumbsComposer::class);
    }
}
