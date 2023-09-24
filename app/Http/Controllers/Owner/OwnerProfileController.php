<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Update\UpdateOwnerProfileRequest;
use App\Models\OwnerProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Services\ImageService;

class OwnerProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');
    }

    public function edit(): View
    {
        $ownerId = Auth::user()->id;
        $ownerProfile = OwnerProfile::find($ownerId);

        return view('owner.profile.edit', compact('ownerProfile'));
    }

    public function update(UpdateOwnerProfileRequest $request): RedirectResponse
    {
        $ownerId = Auth::user()->id;
        $ownerProfile = OwnerProfile::findOrFail($ownerId);

        $ownerProfile->owner_id = $ownerId;
        $ownerProfile->lastname = $request->lastname;
        $ownerProfile->firstname = $request->firstname;
        $ownerProfile->lastname_kana = $request->lastname_kana;
        $ownerProfile->firstname_kana = $request->firstname_kana;
        $ownerProfile->birth = $request->birth;
        $ownerProfile->gender = $request->gender;
        $ownerProfile->zipcode = $request->zipcode;
        $ownerProfile->address1 = $request->address1;
        $ownerProfile->address2 = $request->address2;
        $ownerProfile->address3 = $request->address3;
        $ownerProfile->address4 = $request->address4;
        $ownerProfile->phone_number = $request->phone_number;
        $ownerProfile->mobile_number = $request->mobile_number;
        $ownerProfile->fax_number = $request->fax_number;
        $ownerProfile->website = $request->website;
        $ownerProfile->facebook = $request->facebook;
        $ownerProfile->twitter = $request->twitter;
        $ownerProfile->instagram = $request->instagram;
        $ownerProfile->youtube = $request->youtube;
        $ownerProfile->line = $request->line;

        if ($request->file('owner_photo_path')) {
            $file = $request->file('owner_photo_path');
            $folderName = 'owners';
            $fileNameToStore = ImageService::uploadUser($file, $folderName);
            $ownerProfile->owner_photo_path = $fileNameToStore;
        }

        $ownerProfile->save();

        $notification = array(
            'message' => 'オーナープロフィールの更新に成功しました。',
            'status' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
