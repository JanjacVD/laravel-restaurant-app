<?php

namespace App\Http\Controllers;

use App\Models\AvaliableTime;
use Illuminate\Http\Request;
use App\Models\WorkTime;
use App\Models\CategoryItem;
use App\Models\FoodItem;
use App\Models\SectionItem;
use App\Models\Reservation;
use App\Models\DatesOff;
use App\Models\DaysOff;

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
        $max = AvaliableTime::orderBy('avaliable_time', 'ASC')->sum('capacity');
        return view('public.booking', 
        ['dateOff' => DatesOff::orderBy('noDate')->get(), 'dayOff' => DaysOff::all(), 
        "booked" =>Reservation::groupBy('reservation_date')
        ->having(Reservation::raw('count(reservation_date)'), '>=', $max)
        ->pluck('reservation_date')]);
    }
}