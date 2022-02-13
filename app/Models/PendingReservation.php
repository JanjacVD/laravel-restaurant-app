<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingReservation extends Model
{
    protected $fillable = ['order_number', 'name', 'email', 'phone', 'smoke', 'people', 'reservation_date', 'reservation_time', 'token'];

    use HasFactory;
}
