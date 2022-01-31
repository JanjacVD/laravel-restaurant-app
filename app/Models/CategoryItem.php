<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryItem extends Model
{
    protected $fillable = ['title', 'title_en', 'active', 'section_id'];

    use HasFactory;
}
