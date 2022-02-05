<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationTime;
use App\Models\AvaliableTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvaliableTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'Admin') {
            return view('time.index', ['time' => AvaliableTime::all()]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role == 'Admin') {
            return view('time.create');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    
    public function store(StoreReservationTime $request)
    {
        $validated = $request->validated();
        $time = AvaliableTime::make($validated);
        $time->save();

        $request->session()->flash('status', 'Vrijeme promijenjeno');
        return redirect()->route('time.index');
    }

    public function edit($id)
    {
        if (Auth::user()->role == 'Admin') {
            return view('time.edit', ['time' => AvaliableTime::findOrFail($id)]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function update(StoreReservationTime $request, $id)
    {
        $time = AvaliableTime::findOrFail($id);
        $validated = $request->validated();
        $time->fill($validated);
        $time->save();

        $request->session()->flash('status', 'Vrijeme promijenjeno');
        return redirect()->route('time.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AvaliableTime  $avaliableTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(AvaliableTime $avaliableTime)
    {
        //
    }
}
