<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreAdminProfileRequest;
use App\Http\Requests\Update\UpdateAdminProfileRequest;
use App\Models\AdminProfile;

class AdminProfileController extends Controller
{
    public function edit(AdminProfile $adminProfile)
    {
        //
    }

    public function update(UpdateAdminProfileRequest $request, AdminProfile $adminProfile)
    {
        //
    }

}
