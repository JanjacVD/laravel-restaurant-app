<?php

namespace App\Http\Controllers;

use App\Models\NoWorkDate;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDate;
use App\Models\DatesOff;
use Illuminate\Support\Facades\Auth;

class DatesOffController extends Controller
{

    public function index()
    {
        if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Manager') {

            return view('no-work-date.all-dates', ['date' => DatesOff::all()]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function create()
    {
        if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Manager') {

            return view('no-work-date.add-date');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }
    public function store(StoreDate $request)
    {
        if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Manager') {

            $validated = $request->validated();
            $date = DatesOff::make($validated);
            $date->save();

            $request->session()->flash('status', 'Datum dodan');
            return redirect()->route('date-off.index');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }
    public function destroy($id)
    {
        if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Manager') {

            $date = DatesOff::findOrFail($id);
            $date->delete();

            session()->flash('status', 'Datum uspješno izbrisan');
            return redirect()->route('date-off.index');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }
}
