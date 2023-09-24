<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreEmployeeRequest;
use App\Http\Requests\Update\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admins');
    }
    
    public function index(): View
    {
        $employees = Employee::latest()->paginate(20);

        return view('admin.employee.index', compact('employees'));
    }

    public function create(): View
    {
        return view('admin.employee.create');
    }

    public function store(StoreEmployeeRequest $request): RedirectResponse
    {
        $employee = Employee::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $employeeId = $employee->id;

        $employee->shops()->attach($request->shop_id);

        $notification = array(
            'message' => '従業員の登録に成功しました。続いて、プロフィールを登録してください。',
            'status' => 'success'
        );

        return redirect()->route('admin.employeeProfile.create', ['employee' => $employeeId])->with($notification);
    }

    public function show(Employee $employee): View
    {
        $employee = Employee::findOrFail($employee->id);
        $employeeProfile = $employee->employeeProfile;

        $age = date_diff(date_create($employeeProfile->birth), date_create('today'))->y;

        return view('admin.employee.show', compact('employee', 'employeeProfile', 'age'));
    }

    public function edit(Employee $employee): View
    {
        $employee = Employee::findOrFail($employee->id);

        return view('admin.employee.edit', compact('employee'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee): RedirectResponse
    {
        $employee->email = $request->email;
        $employee->save();

        $notification = array(
            'message' => '従業員の更新に成功しました。',
            'status' => 'success'
        );

        return redirect()->route('admin.employee.index')->with($notification);
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        Employee::findOrFail($employee->id)->delete();

        $notification = array(
            'message' => '従業員の削除に成功しました。',
            'status' => 'success'
        );

        return redirect()->route('admin.employee.index')->with($notification);
    }

    public function expiredIndex()
    {
        $expiredEmployee = Employee::onlyTrashed()->get();

        return view('admin.employee.expired', compact('expiredEmployee'));
    }

    public function expiredRestore($id)
    {
        Employee::withTrashed()->findOrFail($id)->restore();

        $notification = array(
            'message' => '従業員の復元に成功しました。',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.expiredEmployee.index')->with($notification);
    }

    public function expiredDestroy($id)
    {
        $expiredEmployee = Employee::onlyTrashed()->findOrFail($id);

        $expiredEmployee->employeeProfile()->forceDelete();

        $expiredEmployee->stores()->detach();

        $expiredEmployee->forceDelete();

        $notification = array(
            'message' => '従業員を完全に削除しました。',
            'alert-type' => 'danger'
        );

        return redirect()->route('admin.expiredEmployee.index')->with($notification);
    }
}
