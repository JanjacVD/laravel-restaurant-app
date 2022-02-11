<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatus;
use App\Models\LimitReservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LimitReservationsController extends Controller
{
    public function settings()
    {
        if (Auth::user()->role == 'Admin') {

            return view('settings.index', ['status' => LimitReservations::all()]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function index()
    {
        if (Auth::user()->role == 'Admin') {
            return view('status.index', ['status' => LimitReservations::all()]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function create()
    {
        $count = count(LimitReservations::all());
        if ($count > 0) {
            session()->flash('status', 'Status već postoji');
            return redirect()->route('status.index');
        } else {
            return view('status.create');
        }
    }

    public function update(StoreStatus $request, $id)
    {
        if (Auth::user()->role == 'Admin') {
            $status = LimitReservations::findOrFail($id);
            $validated = $request->validated();
            $status->fill($validated);
            $status->save();

            $request->session()->flash('status', 'Status promijenjen');
            return redirect()->route('status.index');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }
    public function edit($id)
    {
        return view('status.edit', ['status' => LimitReservations::findOrFail($id)]);
    }
    public function store(StoreStatus $request)
    {
        if (Auth::user()->role == 'Admin') {
            $validated = $request->validated();
            $status = LimitReservations::make($validated);
            $status->save();


            $request->session()->flash('status', 'Status dodan');
            return redirect()->route('status.index');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }
    public function destroy($id)
    {
    }
}
