<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth as Middleware;

class AuthenticateWithBasicAuth extends Middleware
{
    /**
     * Get the routine that should be used to authenticate users.
     */
    protected function authenticate($request, array $guards)
    {
        //
    }
}