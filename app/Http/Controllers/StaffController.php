<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateStaff;


class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'Admin') {

            return view('staff.index', ['users' => User::all()]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function create()
    {

        if (Auth::user()->role == 'Admin') {
            return route('register');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function show($id)
    {
        if (Auth::user()->role == 'Admin') {
            return view('staff.show', ['user' => User::findOrFail($id)]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function edit($id)
    {
        if (Auth::user()->role == 'Admin') {

            return view('staff.edit', ['user' => User::findOrFail($id)]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }
    public function update(UpdateStaff $request, $id)
    {
        if (Auth::user()->role == 'Admin') {
            $user = User::findOrFail($id);
            $validated = $request->validated();
            $user->fill($validated);
            $user->save();


            $request->session()->flash('status', 'Informacije promijenjene');
            return redirect()->route('staff.index');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'Admin') {

                $user = User::findOrFail($id);
                $user->delete();

                session()->flash('status', 'Korisnik uspješno izbrisan');
                return redirect()->route('staff.index');
            } else {
                session()->flash('status', 'You do not have authority for this.');
                return redirect()->route('home');
            }
        }
    }
}
