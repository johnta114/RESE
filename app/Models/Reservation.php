<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory;
    use SoftDeletes;

       // リレーション
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function shop(){
        return $this->belongsTo('App\Models\shop');
    }
}
