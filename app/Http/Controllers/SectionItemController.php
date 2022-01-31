<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryItem;
use App\Models\SectionItem;
use App\Http\Requests\StoreSection;
use Illuminate\Support\Facades\Auth;

class SectionItemController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Manager') {

            return view('menu.all-sections', ['section' => SectionItem::all()]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function show($id)
    {
        if (Auth::user()->role == 'Admin') {

            return view('menu.show-section', ['section' => SectionItem::findOrFail($id), 'category_item' => CategoryItem::where('section_id', $id)->get()]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function edit($id)
    {
        if (Auth::user()->role == 'Admin') {

            return view('menu.edit-section', ['section' => SectionItem::findOrFail($id)]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function update(StoreSection $request, $id)
    {
        if (Auth::user()->role == 'Admin') {

            $section_item = SectionItem::findOrFail($id);
            $validated = $request->validated();
            $section_item->fill($validated);
            $section_item->save();

            $request->session()->flash('status', 'Odjeljak je promijenjen!');
            return redirect()->route('section.index');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function create()
    {
        if (Auth::user()->role == 'Admin') {

            return view('menu.create-section', ['section' => SectionItem::all()]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function store(Storesection $request)
    {
        if (Auth::user()->role == 'Admin') {

            $validated = $request->validated();
            $section_item = SectionItem::make($validated);
            $section_item->order = (SectionItem::all()->count() + 1);
            $section_item->save();


            $request->session()->flash('status', 'Odjeljak je stvoren!');
            return redirect()->route('section.index');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function destroy($id)
    {
        if (Auth::user()->role == 'Admin') {

            CategoryItem::where('section_id', $id)->update(['section_id' => 0]);

            $section_item = SectionItem::findOrFail($id);
            $section_item->delete();

            session()->flash('status', 'Odjeljak uspješno izbrisan');
            return redirect()->route('section.index');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }
}
