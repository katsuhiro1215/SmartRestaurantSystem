<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreOwnerProfileRequest;
use App\Http\Requests\Update\UpdateOwnerProfileRequest;
use App\Models\OwnerProfile;

class OwnerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOwnerProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOwnerProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OwnerProfile  $ownerProfile
     * @return \Illuminate\Http\Response
     */
    public function show(OwnerProfile $ownerProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OwnerProfile  $ownerProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(OwnerProfile $ownerProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOwnerProfileRequest  $request
     * @param  \App\Models\OwnerProfile  $ownerProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOwnerProfileRequest $request, OwnerProfile $ownerProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OwnerProfile  $ownerProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(OwnerProfile $ownerProfile)
    {
        //
    }
}
