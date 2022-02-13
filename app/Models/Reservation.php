<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id',
        'reservation_date',
        'reservation_time',
        'number_people',
    ];
       // リレーション
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function shop(){
        return $this->belongsTo('App\Models\shop');
    }
}
