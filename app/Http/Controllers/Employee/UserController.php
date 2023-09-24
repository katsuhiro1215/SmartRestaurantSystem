<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:employees');
    }

    public function index()
    {
        $users = User::latest()->paginate(20);

        return view('employee.user.index', compact('users'));
    }

    public function show(User $user)
    {
        $user = User::findOrFail($user->id);
        $userProfile = $user->userProfile;
        $age = date_diff(date_create($userProfile->birth), date_create('today'))->y;

        return view('employee.user.show', compact('user', 'userProfile', 'age'));
    }
}
