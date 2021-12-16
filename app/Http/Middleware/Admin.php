<?php

namespace App\Http\Middleware;

use App\Services\KCFinderService;
use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        app(KCFinderService::class);

        return $next($request);
    }
}
