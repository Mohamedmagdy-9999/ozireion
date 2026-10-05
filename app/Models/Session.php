<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $table = "sessions";
    protected $guarded = [];

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}