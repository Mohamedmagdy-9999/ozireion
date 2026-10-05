<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryCoach extends Model
{
    use HasFactory;

    protected $table = "category_coaches";
    protected $guarded = [];
}
