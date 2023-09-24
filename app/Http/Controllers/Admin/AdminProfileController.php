<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Update\UpdateAdminProfileRequest;
use App\Models\AdminProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Services\ImageService;

class AdminProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admins');
    }

    public function edit(): View
    {
        $adminId = Auth::user()->id;
        $adminProfile = AdminProfile::find($adminId);

        return view('admin.profile.edit', compact('adminProfile'));
    }

    public function update(UpdateAdminProfileRequest $request): RedirectResponse
    {
        $adminId = Auth::user()->id;
        $adminProfile = AdminProfile::findOrFail($adminId);

        $adminProfile->admin_id = $adminId;
        $adminProfile->lastname = $request->lastname;
        $adminProfile->firstname = $request->firstname;
        $adminProfile->lastname_kana = $request->lastname_kana;
        $adminProfile->firstname_kana = $request->firstname_kana;
        $adminProfile->birth = $request->birth;
        $adminProfile->gender = $request->gender;
        $adminProfile->zipcode = $request->zipcode;
        $adminProfile->address1 = $request->address1;
        $adminProfile->address2 = $request->address2;
        $adminProfile->address3 = $request->address3;
        $adminProfile->address4 = $request->address4;
        $adminProfile->phone_number = $request->phone_number;
        $adminProfile->website = $request->website;
        $adminProfile->facebook = $request->facebook;
        $adminProfile->twitter = $request->twitter;
        $adminProfile->instagram = $request->instagram;
        $adminProfile->youtube = $request->youtube;
        $adminProfile->line = $request->line;
        $adminProfile->status = $request->status;
        $adminProfile->role = $request->role;
        $adminProfile->start_date = $request->start_date;

        if ($request->file('admin_photo_path')) {
            $file = $request->file('admin_photo_path');
            $folderName = 'admins';
            $fileNameToStore = ImageService::uploadUser($file, $folderName);
            $adminProfile->admin_photo_path = $fileNameToStore;
        }

        $adminProfile->save();

        $notification = array(
            'message' => '管理者プロフィールの更新に成功しました。',
            'status' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
