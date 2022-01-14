<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Erea extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'erea_name',
    ];
   // リレーション
    public function shop(){
        return $this->hasOne('App\Models\shop');
    }
}