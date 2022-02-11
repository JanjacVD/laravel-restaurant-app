<?php

namespace App\Http\Controllers;

use App\Mail\PendingReservation as MailPendingReservation;
use App\Models\PendingReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Uuid;

class PendingReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'unique:pending_reservations',
            'order_number' => 'unique:pending_reservations'
        ]);
        $token = Uuid::uuid1()->toString();
        $originalDate = $request['reservation_date'];
        $emailDate = date("d-m-Y", strtotime($originalDate));
        $newDate = date("Y-m-d", strtotime($originalDate));
        $ON = rand();
        $pending = new PendingReservation;
        $pending->order_number = $ON;
        $pending->name = $request->name;
        $pending->email = $request->email;
        $pending->phone = $request->phone;
        $pending->smoke = $request->smoke;
        $pending->people = $request->people;
        $pending->reservation_date = $newDate;
        $pending->reservation_time = $request->reservation_time;
        $pending->token = $token;
        $pending->save();

        $details = [
            'order_number' =>  $ON,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'smoke' => $request->smoke,
            'people' => $request->people,
            'date' => $emailDate,
            'dtbDate' => $newDate,
            'time' => $request->reservation_time,
            'token' => $token
        ];

        Mail::to($request->email)->send(new MailPendingReservation($details));
        return view('public.pending');
    }
}
