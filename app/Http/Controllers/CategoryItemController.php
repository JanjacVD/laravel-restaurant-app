<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryItem;
use App\Models\FoodItem;
use App\Models\SectionItem;
use App\Http\Requests\StoreCategory;
use Illuminate\Support\Facades\Auth;

class CategoryItemController extends Controller
{

    public function index()
    {
        if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Manager') {

            return view('menu.all-categories', ['category' => CategoryItem::orderBy('section_id', 'asc')->get(), 'section' => SectionItem::all()]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function show($id)
    {
        if (Auth::user()->role == 'Admin') {

            return view('menu.show-category', ['category' => CategoryItem::findOrFail($id), 'food_item' => FoodItem::where('category_id', $id)->get()]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function edit($id)
    {
        if (Auth::user()->role == 'Admin') {

            return view('menu.edit-category', ['category' => CategoryItem::findOrFail($id), 'section' => SectionItem::all()]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function update(StoreCategory $request, $id)
    {
        if (Auth::user()->role == 'Admin') {

            $category_item = CategoryItem::findOrFail($id);
            $validated = $request->validated();
            $category_item->fill($validated);
            $category_item->save();

            $request->session()->flash('status', 'Kategorija je promijenjena!');
            return redirect()->route('category.show', $id);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function create()
    {
        if (Auth::user()->role == 'Admin') {

            return view('menu.create-category', ['section' => SectionItem::all()]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function store(StoreCategory $request)
    {
        if (Auth::user()->role == 'Admin') {

            $validated = $request->validated();
            $category_item = CategoryItem::make($validated);
            $category_item->order = (CategoryItem::all()->count() + 1);
            $category_item->save();


            $request->session()->flash('status', 'Kategorija je stvorena!');
            return redirect()->route('category.index');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function destroy($id)
    {
        if (Auth::user()->role == 'Admin') {

            FoodItem::where('category_id', $id)->update(['category_id' => 0]);

            $category_item = CategoryItem::findOrFail($id);
            $category_item->delete();


            session()->flash('status', 'Kategorija uspješno izbrisana');

            return redirect()->route('category.index');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }
}
