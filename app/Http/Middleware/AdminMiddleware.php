<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Access\AuthorizationException;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
           // Check if the authenticated user is an admin
        if (auth()->check() && auth()->user()->role !== 'admin') {
            throw new AuthorizationException('Unauthorized. This page for Admin Only!.');
        }

        return $next($request);
    }
}
