<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreAdminProfileRequest;
use App\Http\Requests\Update\UpdateAdminProfileRequest;
use App\Models\Admin;
use App\Models\AdminProfile;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');
    }
    
    public function create($admin): View
    {
        $admin = Admin::findOrFail($admin);

        return view('owner.admin.profile.create', compact('admin'));
    }

    public function store(StoreAdminProfileRequest $request)
    {
        $adminProfile = AdminProfile::create([
            'admin_id' => $request->admin_id,
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
            'website' => $request->website,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'line' => $request->line,
            'status' => $request->status,
            'role' => $request->role,
            'start_date' => $request->start_date,
        ]);

        if ($request->file('admin_photo_path')) {
            $file = $request->file('admin_photo_path');
            $folderName = 'admins';
            $fileNameToStore = ImageService::uploadUser($file, $folderName);
            $adminProfile->admin_photo_path = $fileNameToStore;
        }

        $adminProfile->save();

        $adminId = $request->admin_id;

        $notification = array(
            'message' => 'プロフィールの登録に成功しました。続いて、店舗情報を登録してください。',
            'status' => 'success'
        );

        return redirect()->route('owner.shop.create', ['admin' => $adminId])->with($notification);
    }

    public function edit($admin_id, $adminProfile_id): View
    {
        $admin = Admin::findOrFail($admin_id);
        $adminProfile = AdminProfile::findOrFail($adminProfile_id);

        return view('owner.admin.profile.edit', compact('adminProfile', 'admin'));
    }

    public function update(UpdateAdminProfileRequest $request, AdminProfile $adminProfile): RedirectResponse
    {
        $adminProfile = AdminProfile::findOrFail($adminProfile->id);

        $adminProfile->admin_id = $request->admin_id;
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
            'message' => 'プロフィールの更新に成功しました。',
            'status' => 'success'
        );

        return redirect()->route('owner.admin.index')->with($notification);
    }
}
