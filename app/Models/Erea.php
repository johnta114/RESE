<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Erea extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'erea_name',
    ];
   // リレーション
    public function shop(){
        return $this->hasOne('App\Models\Shop');
    }
}