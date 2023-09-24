<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Update\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:employees');
    }

    public function edit(): View
    {
        $employee = Auth::user();

        return view('employee.profile.edit', compact('employee'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee): RedirectResponse
    {
        $employee = Auth::user();

        $employee->email = $request->email;
        $employee->save();

        $notification = array(
            'message' => '従業員の更新に成功しました。',
            'status' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
