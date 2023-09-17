<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreReservationLogRequest;
use App\Http\Requests\Update\UpdateReservationLogRequest;
use App\Models\ReservationLog;

class ReservationLogController extends Controller
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
     * @param  \App\Http\Requests\StoreReservationLogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationLogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReservationLog  $reservationLog
     * @return \Illuminate\Http\Response
     */
    public function show(ReservationLog $reservationLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReservationLog  $reservationLog
     * @return \Illuminate\Http\Response
     */
    public function edit(ReservationLog $reservationLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservationLogRequest  $request
     * @param  \App\Models\ReservationLog  $reservationLog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservationLogRequest $request, ReservationLog $reservationLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReservationLog  $reservationLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReservationLog $reservationLog)
    {
        //
    }
}
