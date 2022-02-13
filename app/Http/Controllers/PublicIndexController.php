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
use App\Models\LimitReservations;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Gallery;

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
        return view(
            'public.booking',
            [
                'dateOff' => DatesOff::orderBy('noDate')->get(), 'dayOff' => DaysOff::all(),
                "booked" => Reservation::groupBy('reservation_date')
                    ->having(Reservation::raw('count(reservation_date)'), '>=', $max)
                    ->pluck('reservation_date'),
                'bookingStatus' => LimitReservations::first()->get()
            ]
        );
    }
    public function time(Request $request)
    {

        $originalDate = $request['date'];
        $newDate = date("Y-m-d", strtotime($originalDate));
        return view(
            'public.time',
            [
                'time' => AvaliableTime::orderBy('avaliable_time')->select('avaliable_time', 'capacity')->get(),
                'banned_period' =>  Reservation::where('reservation_date', $newDate)->select('reservation_time', Reservation::raw('count(*) as count'))
                    ->groupBy('reservation_time')
                    ->get()
            ]
        );
    }
    public function contact()
    {
        return view('public.contact');
    }
    public function sendmail(Request $request)
    {
        $details = [
            'name' => $request['name'],
            'email' => $request['email'],
            'subject' => $request['subject'],
            'message' => $request['message'],
        ];
        Mail::to(env('CONTACT_MAIL'))->send(new ContactMail($details));
        session()->flash('status', 'Vaša poruka je usjpešno poslana.');
        return redirect()->route('public.contact');
    }
    public function gallery()
    {
        return view('public.gallery', ['gallery'=>Gallery::where('active', '1')->orderby('order','ASC')->get()]);
    }
}
