<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Erea extends Model
{
    use HasFactory;
    use SoftDeletes;

           // リレーション
        public function shop(){
            return $this->belongsTo('App\Models\shop');
        }
}