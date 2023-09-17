<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    private const GUARD_USER = 'users';
    private const GUARD_ADMIN = 'admins';
    private const GUARD_EMPLOYEE = 'employees';
    private const GUARD_OWNER = 'owners';

    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::guard(self::GUARD_USER)->check() && $request->routeIs('user.*')) {
            return redirect(RouteServiceProvider::HOME);
        }

        if(Auth::guard(self::GUARD_ADMIN)->check() && $request->routeIs('admin.*')) {
            return redirect(RouteServiceProvider::ADMIN_HOME);
        }

        if(Auth::guard(self::GUARD_EMPLOYEE)->check() && $request->routeIs('employee.*')) {
            return redirect(RouteServiceProvider::EMPLOYEE_HOME);
        }

        if(Auth::guard(self::GUARD_OWNER)->check() && $request->routeIs('owner.*')) {
            return redirect(RouteServiceProvider::OWNER_HOME);
        }

        return $next($request);
    }
}
