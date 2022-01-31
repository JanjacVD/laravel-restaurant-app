<?php

namespace App\Http\Controllers;

use App\Models\WorkDay;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTime;
use App\Models\WorkTime;
use Illuminate\Support\Facades\Auth;

class WorkTimeController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'Admin') {

            return view('work-time.show-work', ['time' => WorkTime::all()]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }


    public function create()
    {
        if (Auth::user()->role == 'Admin') {

            $count = count(WorkTime::all());
            if ($count > 0) {
                session()->flash('status', 'Radno vrijeme već postoji');
                return redirect()->route('work-time.index');
            }
            return view('work-time.create-work');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }


    public function store(StoreTime $request)
    {
        if (Auth::user()->role == 'Admin') {

            $validated = $request->validated();
            $day = WorkTime::make($validated);
            $day->save();

            $request->session()->flash('status', 'Radno vrijeme dodano');
            return redirect()->route('work-time.index');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function show($id)
    {
        if (Auth::user()->role == 'Admin') {

            $time = WorkTime::findOrFail($id);
            if ($time->active == '0') {
                WorkTime::where('id', $id)->update(['active' => '1']);

                session()->flash('status', 'Privremeno zatvoreno');
                return redirect()->route('work-time.index');
            } else {
                WorkTime::where('id', $id)->update(['active' => '0']);

                session()->flash('status', 'Otvoreno');
                return redirect()->route('work-time.index');
            }
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function update(StoreTime $request, $id)
    {
        if (Auth::user()->role == 'Admin') {

            $day = WorkTime::findOrFail($id);
            $validated = $request->validated();
            $day->fill($validated);
            $day->save();

            $request->session()->flash('status', 'Radno vrijeme promijenjeno');
            return redirect()->route('work-time.index');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }



    public function edit($id)
    {
        if (Auth::user()->role == 'Admin') {

            return view('work-time.edit-work', ['time' => WorkTime::findOrFail($id)]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }
}
