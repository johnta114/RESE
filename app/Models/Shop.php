<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use HasFactory;
    use SoftDeletes;

    // リレーション
    public function erea(){
        return $this->hasOne('App\Models\Erea');
    }
    public function genre(){
        return $this->hasOne('App\Models\Genre');
    }
    public function favorites(){
        return $this->hasMany('App\Models\Favorite');
    }
    public function reservations(){
        return $this->hasMany('App\Models\Reservation');
    }
}