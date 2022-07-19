<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, String $role)
    {
        if ($role == 'admin' && Auth::user()->role != 'admin') {
            abort(403);
        } elseif ($role == 'tenant-admin' && Auth::user()->role != 'tenant-admin') {
            abort(403);
        } elseif ($role == 'user' && Auth::user()->role != 'user') {
            abort(403);
        }

        return $next($request);
    }
}
