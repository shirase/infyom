<?php

namespace App\Page;

use App\Models\Page;
use Illuminate\Http\Request;

class Route extends \Illuminate\Routing\Route
{
    public static function add()
    {
        /** @var \Illuminate\Routing\Router|PageRouteMethods $router */
        $router = app('router');
        $router->page();
    }

    public function matches(Request $request, $includingMethod = true)
    {
        $path = rawurldecode(trim($request->getPathInfo(), '/') ?: '/');
        return Page::query()->where('slug', $path)->active()->exists();
    }
}
