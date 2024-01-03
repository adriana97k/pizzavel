<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->is_admin) {
            // User is an admin, allow access
            return $next($request);
        }

        // Redirect or show an error message for non-admin users
        return redirect('/')->with('error', 'You do not have permission to access this page.');
    }
}
