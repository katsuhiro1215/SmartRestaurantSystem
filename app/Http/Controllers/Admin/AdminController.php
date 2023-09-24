<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Update\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admins');
    }

    public function edit(): View
    {
        $admin = Auth::user();

        return view('admin.profile.edit', compact('admin'));
    }

    public function update(UpdateAdminRequest $request, Admin $admin): RedirectResponse
    {
        $admin = Auth::user();

        $admin->email = $request->email;
        $admin->save();

        $notification = array(
            'message' => '管理者の更新に成功しました。',
            'status' => 'success'
        );
        
        return redirect()->back()->with($notification);
    }
}
