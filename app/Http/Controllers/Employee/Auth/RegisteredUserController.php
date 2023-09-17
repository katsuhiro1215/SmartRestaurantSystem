<?php

namespace App\Http\Controllers\Employee\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('employee.auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Employee::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $employee = Employee::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($employee));

        Auth::login($employee);

        return redirect(RouteServiceProvider::EMPLOYEE_HOME);
    }
}