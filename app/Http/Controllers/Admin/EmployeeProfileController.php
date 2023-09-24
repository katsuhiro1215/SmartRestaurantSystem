<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreEmployeeProfileRequest;
use App\Http\Requests\Update\UpdateEmployeeProfileRequest;
use App\Models\Employee;
use App\Models\EmployeeProfile;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EmployeeProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admins');
    }
    
    public function create($employee): View
    {
        $employee = Employee::findOrFail($employee);

        return view('admin.employee.profile.create', compact('employee'));
    }

    public function store(StoreEmployeeProfileRequest $request)
    {
        $employeeProfile = EmployeeProfile::create([
            'employee_id' => $request->employee_id,
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'lastname_kana' => $request->lastname_kana,
            'firstname_kana' => $request->firstname_kana,
            'birth' => $request->birth,
            'gender' => $request->gender,
            'zipcode' => $request->zipcode,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'address3' => $request->address3,
            'address4' => $request->address4,
            'phone_number' => $request->phone_number,
            'status' => $request->status,
            'role' => $request->role,
            'start_date' => $request->start_date,
        ]);

        if ($request->file('employee_photo_path')) {
            $file = $request->file('employee_photo_path');
            $folderName = 'employees';
            $fileNameToStore = ImageService::uploadUser($file, $folderName);
            $employeeProfile->employee_photo_path = $fileNameToStore;
        }

        $employeeProfile->save();

        $notification = array(
            'message' => 'プロフィールの登録に成功しました。',
            'status' => 'success'
        );

        return redirect()->route('admin.employee.index')->with($notification);
    }

    public function edit($employee_id, $employeeProfile_id): View
    {
        $employee = Employee::findOrFail($employee_id);
        $employeeProfile = EmployeeProfile::findOrFail($employeeProfile_id);

        return view('admin.employee.profile.edit', compact('employeeProfile', 'employee'));
    }

    public function update(UpdateEmployeeProfileRequest $request, EmployeeProfile $employeeProfile): RedirectResponse
    {
        $employeeProfile = EmployeeProfile::findOrFail($employeeProfile->id);

        $employeeProfile->employee_id = $request->employee_id;
        $employeeProfile->lastname = $request->lastname;
        $employeeProfile->firstname = $request->firstname;
        $employeeProfile->lastname_kana = $request->lastname_kana;
        $employeeProfile->firstname_kana = $request->firstname_kana;
        $employeeProfile->birth = $request->birth;
        $employeeProfile->gender = $request->gender;
        $employeeProfile->zipcode = $request->zipcode;
        $employeeProfile->address1 = $request->address1;
        $employeeProfile->address2 = $request->address2;
        $employeeProfile->address3 = $request->address3;
        $employeeProfile->address4 = $request->address4;
        $employeeProfile->phone_number = $request->phone_number;
        $employeeProfile->status = $request->status;
        $employeeProfile->role = $request->role;
        $employeeProfile->start_date = $request->start_date;

        if ($request->file('employee_photo_path')) {
            $file = $request->file('employee_photo_path');
            $folderName = 'employees';
            $fileNameToStore = ImageService::uploadUser($file, $folderName);
            $employeeProfile->employee_photo_path = $fileNameToStore;
        }

        $employeeProfile->save();

        $notification = array(
            'message' => 'プロフィールの更新に成功しました。',
            'status' => 'success'
        );

        return redirect()->route('admin.employee.index')->with($notification);
    }
}
