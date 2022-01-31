<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    protected $fillable = ['title', 'title_en', 'desc', 'desc_en', 'price', 'active', 'category_id'];
    
    use HasFactory;
}
