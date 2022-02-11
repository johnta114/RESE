<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'genre_name',
    ];
       // リレーション
    public function shop(){
        return $this->hasOne('App\Models\shop');
    }
}
