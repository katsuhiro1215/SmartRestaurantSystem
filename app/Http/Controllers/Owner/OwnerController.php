<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Update\UpdateOwnerRequest;
use App\Models\Owner;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function edit(Owner $owner)
    {
        
        //
    }

    public function update(UpdateOwnerRequest $request, Owner $owner)
    {
        //
    }

    public function destroy(Owner $owner)
    {
        //
    }
}
