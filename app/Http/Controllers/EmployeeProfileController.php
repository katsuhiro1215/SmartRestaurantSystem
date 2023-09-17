<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreEmployeeProfileRequest;
use App\Http\Requests\Update\UpdateEmployeeProfileRequest;
use App\Models\EmployeeProfile;

class EmployeeProfileController extends Controller
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
     * @param  \App\Http\Requests\StoreEmployeeProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeProfile  $employeeProfile
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeProfile $employeeProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeProfile  $employeeProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeProfile $employeeProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeProfileRequest  $request
     * @param  \App\Models\EmployeeProfile  $employeeProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeProfileRequest $request, EmployeeProfile $employeeProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeProfile  $employeeProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeProfile $employeeProfile)
    {
        //
    }
}
