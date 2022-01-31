<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkTime extends Model
{
    protected $fillable = ['day1','day2','time1','time2','active'];

    use HasFactory;
}
