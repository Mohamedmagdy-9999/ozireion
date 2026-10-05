<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $table = "branches";
    protected $guarded = [];

    public function country()
    {
        return $this->belongsTo(Country::class , 'country_id');
    }
    
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
