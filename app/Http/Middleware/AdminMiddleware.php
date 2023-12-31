<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is logged in and has the 'admin' user_type
        if (auth()->check() && auth()->user()->user_type === 'admin') {
            return $next($request);
        }

        // If not, redirect to a different route (you can customize this)
        return redirect('/')->with('error', 'Unauthorized access');
    }
}
