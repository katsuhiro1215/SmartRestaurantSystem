<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreAdminRequest;
use App\Http\Requests\Update\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Throwable;

class AdminController extends Controller
{
    public function index(): View
    {
        $admins = Admin::latest()->paginate(20);

        return view('owner.admin.index', compact('admins'));
    }

    public function create(): View
    {
        return view('owner.admin.create');
    }

    public function store(StoreAdminRequest $request)
    {
        $admin = Admin::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $adminId = $admin->id;

        $notification = array(
            'message' => '管理者の登録に成功しました。続いて、プロフィールを登録してください。',
            'status' => 'success'
        );

        return redirect()->route('owner.adminProfile.create', ['admin' => $adminId])->with($notification);
    }

    public function show(Admin $admin): View
    {
        $admin = Admin::findOrFail($admin->id);
        $adminProfile = $admin->adminProfile;
        $age = date_diff(date_create($adminProfile->birth), date_create('today'))->y;

        return view('owner.admin.show', compact('admin', 'adminProfile', 'age'));
    }

    public function edit(Admin $admin): View
    {
        $admin = Admin::findOrFail($admin->id);

        return view('owner.admin.edit', compact('admin'));
    }

    public function update(UpdateAdminRequest $request, Admin $admin): RedirectResponse
    {
        $admin->email = $request->email;
        $admin->save();

        $notification = array(
            'message' => '管理者の更新に成功しました。',
            'status' => 'success'
        );

        return redirect()->route('owner.admin.index')->with($notification);
    }

    public function destroy(Admin $admin): RedirectResponse
    {
        Admin::findOrFail($admin->id)->delete();

        $notification = array(
            'message' => '管理者の削除に成功しました。',
            'status' => 'success'
        );

        return redirect()->route('owner.admin.index')->with($notification);
    }
}
