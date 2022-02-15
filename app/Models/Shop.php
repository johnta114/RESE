<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Shop extends Model
{
    use HasFactory;


    protected $fillable = [
        'id',
        'user_id',
        'erea_id',
        'genre_id',
        'shop_name',
        'overview',
        'image',
    ];

    // リレーション
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
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
    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }

// お気に入り状況の確認
    public function is_favorited_by_auth_user()
    {
        $id = Auth::id();

        $favoriters = array();
        foreach($this->favorites as $favorite) {
            array_push($favoriters, $favorite->user_id);
        }

        if (in_array($id, $favoriters)) {
            return true;
        } else {
            return false;
        }
    }

}