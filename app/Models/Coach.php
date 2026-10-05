<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    protected $table = "coaches";
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_coaches');
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
