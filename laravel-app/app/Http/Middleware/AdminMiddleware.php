<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        Log::info('AdminMiddleware accessed by user: ', [auth()->user()]);

        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect('/login')->with('error', 'You are not authorized to access this page.');
        }

        return $next($request);
    }
}
