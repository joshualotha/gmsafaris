<?php

namespace App\Http\Middleware;

use Illuminate\Cache\Middleware\SetCacheHeaders as Middleware;

class SetCacheHeaders extends Middleware
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, \Closure $next, ...$options)
    {
        return $next($request);
    }
}