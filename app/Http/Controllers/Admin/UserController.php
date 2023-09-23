<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admins');
    }

    public function index()
    {
        $users = User::latest()->paginate(20);

        return view('admin.user.index', compact('users'));
    }

    public function show(User $user)
    {
        $user = User::findOrFail($user->id);
        $userProfile = $user->profile;

        return view('admin.user.show', compact('user', 'userProfile'));
    }
}
