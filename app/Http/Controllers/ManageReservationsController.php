<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ManageReservationsController extends Controller
{
    public function index()
    {
        return view('reservations.index' , ['customer' => Reservation::all()]);
    }
}
