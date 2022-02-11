<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\PendingReservation;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmedReservation;
use App\Mail\SendToAdmin;
use App\Mail\CancelToAdmin;
use App\Models\AvaliableTime;


use function PHPUnit\Framework\isEmpty;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $token = $_GET['token'];
        return view('public.cancel-reservation', ['info' => Reservation::where('token', "=", $token)->select('id', 'token')->firstOrFail()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $token = $_GET['token'];
            return view('public.confirm', ['info' => PendingReservation::where('token', "=", $token)->select('id', 'token')->firstOrFail()]);
        } catch (ModelNotFoundException $e) {
            return view('public.timeout');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $token = $request['token'];
        $email = $request['email'];
        if ($request['message'] != "") {
            $message = $request['message'];
        } else {
            $message = "No-message";
        }
        try {
            $info = PendingReservation::where('token', "=", $token)->firstOrFail();
            $existing = Reservation::where('token', "=", $token)->count();
            if ($existing > 0) {
                return view('public.already-booked');
            }
            if ($info['email'] == $email) {
                $max = AvaliableTime::sum('capacity');
                if (count(Reservation::where('reservation_date', $info['reservation_date'])->get()) >= $max) {
                    return view('public.overbooked');
                } else {

                    $randomPassword = Str::random(12);
                    $reservation = new Reservation;
                    $reservation->token = $token;
                    $reservation->order_number = $info['order_number'];
                    $reservation->name = $info['name'];
                    $reservation->email = $info['email'];
                    $reservation->phone = $info['phone'];
                    $reservation->smoke = $info['smoke'];
                    $reservation->people = $info['people'];
                    $reservation->reservation_date = $info['reservation_date'];
                    $reservation->reservation_time = $info['reservation_time'];
                    $reservation->cancel_key = Hash::make($randomPassword);
                    $reservation->message = $message;
                    $reservation->save();

                    $msgDate = date('d-m-Y', strtotime($info['reservation_date']));

                    $details = [
                        'order' =>  $info['order_number'],
                        'name' => $info['name'],
                        'email' => $info['email'],
                        'phone' => $info['phone'],
                        'people' => $info['people'],
                        'date' => $msgDate,
                        'time' => $info['reservation_time'],
                        'token' => $token,
                        'key' => $randomPassword
                    ];

                    Mail::to($info['email'])->send(new ConfirmedReservation($details));
                    Mail::to(env('MAIL_FROM_ADDRESS'))->send(new SendToAdmin($details));

                    $info->delete();

                    return view('public.booking-sucess');
                }
            } else {
                session()->flash('email', 'E-mail adresa se ne podudara');
                return redirect()->back();
            }
        }
        // catch(Exception $e) catch any exception
        catch (ModelNotFoundException $e) {
            return view('public.timeout');
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $canceled = Reservation::findOrFail($id);
            if ($canceled['token'] == $request['token']) {
                if (Hash::check($request['key'], $canceled['cancel_key'])) {
                    $details = [
                        'order' => $canceled['order_number'],
                        'name' => $canceled['name'],
                        'time' => $canceled['reservation_time'],
                        'date' => $canceled['reservation_date'],
                        'email' => $canceled['email']
                    ];
                    Mail::to(env('MAIL_FROM_ADDRESS'))->send(new CancelToAdmin($details));
                    $canceled->delete();
                } else {
                    session()->flash('password', 'Lozinka se ne podudara');
                    return redirect()->back();
                }
                return view('public.cancel.sucess');
            }
        } catch (ModelNotFoundException $e) {
            return view('public.no-exist');
        }
    }
}
