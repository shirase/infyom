<?php

namespace App\Page;

use App\Http\Controllers\PageController;
use App\Models\Page;
use Illuminate\Http\Request;

class Route extends \Illuminate\Routing\Route
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

    public function matches(Request $request, $includingMethod = true)
    {
        $path = rawurldecode(trim($request->getPathInfo(), '/') ?: '/');
        return Page::query()->where('slug', $path)->active()->exists();
    }
}
