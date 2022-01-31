<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaysOff extends Model
{
    protected $fillable = ['day'];

    use HasFactory;
}
