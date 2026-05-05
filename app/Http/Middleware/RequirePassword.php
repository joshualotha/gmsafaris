<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\RequirePassword as Middleware;

class RequirePassword extends Middleware
{
    /**
     * The timeout for the password confirmation.
     *
     * @var int
     */
    protected int $timeout = 0;

    /**
     * Handle an incoming request.
     */
    public function handle($request, \Closure $next, $guard = null, $redirectTo = null)
    {
        return $next($request);
    }
}