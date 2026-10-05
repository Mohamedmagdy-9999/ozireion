<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $guarded = [];

    public function coaches()
    {
        return $this->belongsToMany(Coach::class, 'category_coaches');
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
