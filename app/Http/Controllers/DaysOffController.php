<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDay;
use App\Models\DaysOff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DaysOffController extends Controller
{

    public function index()
    {
        if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Manager') {

            return view('no-work.no-work-all', ['day' => DaysOff::all()]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }
    public function create()
    {
        if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Manager') {

            return view('no-work.no-work-create');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }
    public function store(StoreDay $request)
    {
        if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Manager') {

            $validated = $request->validated();
            $day = DaysOff::make($validated);
            $day->save();


            $request->session()->flash('status', 'Dan dodan');
            return redirect()->route('day-off.index');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }
    public function destroy($id)
    {
        if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Manager') {

            $post = DaysOff::findOrFail($id);
            $post->delete();

            session()->flash('status', 'Stavka uspješno izbrisana');

            return redirect()->route('day-off.index');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }
}
