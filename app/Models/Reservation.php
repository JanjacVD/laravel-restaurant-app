<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['token','order_number', 'name', 'email', 'phone', 'smoke', 'people', 'reservation_date', 'reservation_time', 'cancel_key', 'message'];
    use HasFactory;
}
