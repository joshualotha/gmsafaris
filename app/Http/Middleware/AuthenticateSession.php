<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\AuthenticateSession as Middleware;

class AuthenticateSession extends Middleware
{
    /**
     * Update the session authentication.
     */
    public function handle($request, \Closure $next, $guard = null, $config = [])
    {
        return $next($request);
    }
}