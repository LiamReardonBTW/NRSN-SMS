<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ManagerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user() &&  (Auth::user()->role == 1 || Auth::user()->role == 0)) {
            return $next($request);
     }

    return redirect()->route('dashboard')->with('alert-fail','Error: You must be a Manager to access the requested page.');

    }
}
