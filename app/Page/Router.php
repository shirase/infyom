<?php

namespace App\Page;

use App\Http\Controllers\PageController;

/**
 * Class Router
 * @deprecated
 */
class Router extends \Illuminate\Routing\Router
{
    public static function add()
    {
        /** @var \Illuminate\Routing\Router $router */
        $router = app('router');

        $routes = $router->getRoutes();

        $route = (new Route(['GET', 'POST', 'HEAD'], '{slug}', [PageController::class, 'show']))
            ->setRouter($router)
            ->setContainer(app())
        ;

        // If we have groups that need to be merged, we will merge them now after this
        // route has already been created and is ready to go. After we're done with
        // the merge we will be ready to return the route back out to the caller.
        if ($router->hasGroupStack()) {
            $router->mergeGroupAttributesIntoRoute($route);
        }

        $router->addWhereClausesToRoute($route);

        $routes->add($route);
    }
}
