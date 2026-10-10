<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class Client extends Authenticatable implements JWTSubject
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['image_url','gender'];
    protected $hidden = ['password','test'];
    

     public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    // ✅ مطلوب من JWT
    public function getJWTCustomClaims()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'image' => $this->image_url,
            'gender' => $this->gender,
            

        ];
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('clients/' . $this->image);
        }
        return null;
    }

    
    public function getGenderAttribute()
    {
        if ($this->gender_id == 1) {
            return 'male';
        }

        if ($this->gender_id == 2) {
            return 'female';
        }

        return null;
    }
}
