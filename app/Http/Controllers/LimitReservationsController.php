<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatus;
use App\Models\LimitReservations;
use Illuminate\Http\Request;

class LimitReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('status.index', ['status' => LimitReservations::all()]);
    }

    public function settings()
    {
        return view('settings.index', ['status' => LimitReservations::all()]);
    }
    public function create()
    {
        return view('status.create');
    }

    public function store(StoreStatus $request)
    {
        
    }
    public function show(LimitReservations $limitReservations)
    {
        
    }
    public function edit(LimitReservations $limitReservations)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LimitReservations  $limitReservations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LimitReservations $limitReservations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LimitReservations  $limitReservations
     * @return \Illuminate\Http\Response
     */
    public function destroy(LimitReservations $limitReservations)
    {
        //
    }
}
