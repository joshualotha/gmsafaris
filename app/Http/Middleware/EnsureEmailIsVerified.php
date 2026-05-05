<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\EnsureEmailIsVerified as Middleware;

class EnsureEmailIsVerified extends Middleware
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, \Closure $next, $redirectToRoute = null)
    {
        return $next($request);
    }
}