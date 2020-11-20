<?php

namespace App\Page;

use App\Models\Page;
use Illuminate\Http\Request;

class Route extends \Illuminate\Routing\Route
{
    public function matches(Request $request, $includingMethod = true)
    {
        $path = rawurldecode(trim($request->getPathInfo(), '/') ?: '/');
        return Page::query()->where('slug', $path)->active()->exists();
    }
}
