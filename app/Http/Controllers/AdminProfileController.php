<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminProfileRequest;
use App\Http\Requests\UpdateAdminProfileRequest;
use App\Models\AdminProfile;

class AdminProfileController extends Controller
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
     * @param  \App\Http\Requests\StoreAdminProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminProfile  $adminProfile
     * @return \Illuminate\Http\Response
     */
    public function show(AdminProfile $adminProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminProfile  $adminProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminProfile $adminProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminProfileRequest  $request
     * @param  \App\Models\AdminProfile  $adminProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminProfileRequest $request, AdminProfile $adminProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminProfile  $adminProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminProfile $adminProfile)
    {
        //
    }
}
