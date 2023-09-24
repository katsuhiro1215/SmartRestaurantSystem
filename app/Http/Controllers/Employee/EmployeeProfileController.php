<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Update\UpdateEmployeeProfileRequest;
use App\Models\EmployeeProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Services\ImageService;

class EmployeeProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:employees');
    }

    public function edit(): View
    {
        $employeeId = Auth::user()->id;
        $employeeProfile = EmployeeProfile::find($employeeId);

        return view('employee.profile.edit', compact('employeeProfile'));
    }

    public function update(UpdateEmployeeProfileRequest $request): RedirectResponse
    {
        $employeeId = Auth::user()->id;
        $employeeProfile = EmployeeProfile::findOrFail($employeeId);

        $employeeProfile->employee_id = $employeeId;
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

        return redirect()->back()->with($notification);
    }
}
