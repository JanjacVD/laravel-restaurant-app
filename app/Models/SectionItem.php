<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionItem extends Model
{
    protected $fillable = ['title', 'title_en', 'active'];

    use HasFactory;
}
