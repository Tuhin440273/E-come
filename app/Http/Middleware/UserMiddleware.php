<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   // UserMiddleware.php
public function handle($request, Closure $next)
{
    if (auth()->user() && auth()->user()->role == 'admin') {
        return $next($request);
    }

    return redirect('/home')->with('error', 'You do not have permission to access this page.');
}
}