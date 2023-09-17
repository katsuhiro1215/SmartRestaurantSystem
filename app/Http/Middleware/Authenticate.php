<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    protected $user_route = 'user.login';
    protected $admin_route = 'admin.login';
    protected $employee_route = 'employee.login';
    protected $owner_route = 'owner.login';

    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if (Route::is('owner.*')) {
                return route($this->owner_route);
            } elseif (Route::is('admin.*')) {
                return route($this->admin_route);
            } elseif (Route::is('employee.*')) {
                return route($this->employee_route);
            } else {
                return route($this->user_route);
            }
        }
    }
}
