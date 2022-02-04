<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkTime;
use App\Models\CategoryItem;
use App\Models\FoodItem;
use App\Models\SectionItem;
use App\Models\Reservation;

class PublicIndexController extends Controller
{
    public function index()
    {
        return view('public.index', ['time' => WorkTime::all()]);
    }
    public function menu()
    {
        return view('public.menu', ['section' => SectionItem::where('active', '1')->get(), 'category' => CategoryItem::where('active', '1')->get(), 'food' => FoodItem::where('active', '1')->get()]);
    }
    public function booking()
    {
        return view('public.booking', ['date-full' => Reservation::all()->countBy()]);
    }
}
