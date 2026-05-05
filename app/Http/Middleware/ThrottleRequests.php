<?php

namespace App\Http\Middleware;

use Illuminate\Routing\Middleware\ThrottleRequests as Middleware;

class ThrottleRequests extends Middleware
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, \Closure $next, $maxAttempts = 60, $decayMinutes = 1)
    {
        return $next($request);
    }
}