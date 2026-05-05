<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // Check if the request is for the admin guard
            if ($request->is('admin/*') || $request->routeIs('admin.*')) {
                return route('admin.login');
            }

            return route('login');
        }
    }
}