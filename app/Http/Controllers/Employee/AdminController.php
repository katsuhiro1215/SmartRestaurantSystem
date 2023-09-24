<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreAdminRequest;
use App\Http\Requests\Update\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:employees');
    }

    public function index()
    {
        $admins = Admin::latest()->paginate(20);

        return view('employee.admin.index', compact('admins'));
    }

    public function show(Admin $admin)
    {
        $admin = Admin::findOrFail($admin->id);
        $adminProfile = $admin->adminProfile;
        $age = date_diff(date_create($adminProfile->birth), date_create('today'))->y;

        return view('employee.admin.show', compact('admin', 'adminProfile', 'age'));
    }
}
