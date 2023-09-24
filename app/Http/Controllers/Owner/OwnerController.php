<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Update\UpdateOwnerRequest;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');
    }

    public function edit(): View
    {
        $owner = Auth::user();

        return view('owner.profile.edit', compact('owner'));
    }

    public function update(UpdateOwnerRequest $request): RedirectResponse
    {
        $ownerId = Auth::user()->id;
        $owner = Owner::findOrFail($ownerId);

        $owner->email = $request->email;

        $owner->save();
        
        $notification = array(
            'message' => 'オーナーの更新に成功しました。',
            'status' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
