<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Update\UpdateOwnerRequest;
use App\Models\Owner;
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

    public function update(UpdateOwnerRequest $request, Owner $owner): RedirectResponse
    {
        $owner = Auth::user();

        $owner->email = $request->email;
        $owner->save();
        
        return redirect()->back();
    }

    public function destroy(Owner $owner)
    {
        //
    }
}
