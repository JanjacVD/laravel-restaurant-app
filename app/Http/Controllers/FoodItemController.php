<?php

namespace App\Http\Controllers;

use App\Models\FoodItem;
use App\Models\CategoryItem;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFoodItem;
use Illuminate\Support\Facades\Auth;

class FoodItemController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Manager') {
            return view('menu.all-items', ['item' => FoodItem::orderBy('category_id', 'asc')->get(), 'category' => CategoryItem::all()]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function edit($id)
    {
        if (Auth::user()->role == 'Admin') {

            return view('menu.edit-item', ['item' => FoodItem::findOrFail($id), 'category' => CategoryItem::all()]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function update(StoreFoodItem $request, $id)
    {

        if (Auth::user()->role == 'Admin') {
            $food_item = FoodItem::findOrFail($id);
            $validated = $request->validated();
            $food_item->fill($validated);
            $food_item->save();

            $request->session()->flash('status', 'Stavka je promijenjena!');
            return redirect()->route('food.index');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function create()
    {
        if (Auth::user()->role == 'Admin') {
            return view('menu.create-item', ['category' => CategoryItem::all()]);
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }



    public function store(StoreFoodItem $request)
    {
        if (Auth::user()->role == 'Admin') {
            $validated = $request->validated();
            $food_item = FoodItem::make($validated);
            $food_item->order = (FoodItem::all()->count() + 1);
            $food_item->save();


            $request->session()->flash('status', 'Stavka je stvorena!');
            return redirect()->route('food.index');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }

    public function destroy($id)
    {
        if (Auth::user()->role == 'Admin') {

            $post = FoodItem::findOrFail($id);
            $post->delete();

            session()->flash('status', 'Stavka uspješno izbrisana');

            return redirect()->route('food.index');
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }
}
