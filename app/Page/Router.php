<?php

namespace App\Page;

use App\Http\Controllers\PageController;

class Router
{
    public static function page()
    {
        /** @var \Illuminate\Routing\Router $router */
        $router = app('router');

        $routes = $router->getRoutes();

        $route = (new Route(['GET', 'POST'], '{slug}', [PageController::class, 'show']))
            ->setRouter($router)
            ->setContainer(app());
        ;
        $routes->add($route);
    }
}
