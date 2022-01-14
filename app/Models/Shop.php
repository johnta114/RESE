<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'shop_name',
        'overview',
    ];

    // リレーション
    public function erea(){
        return $this->belongsTo('App\Models\Erea');
    }
    public function genre(){
        return $this->belongsTo('App\Models\Genre');
    }
    public function favorites(){
        return $this->hasMany('App\Models\Favorite');
    }
    public function reservations(){
        return $this->hasMany('App\Models\Reservation');
    }
}