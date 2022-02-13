<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use App\Models\Reservation;
use Auth;

use Illuminate\Http\Request;

class DitailController extends Controller
{
// 店舗詳細画面
    public function ditail($shop_id)
    {
        $shop = Shop::where('id',$shop_id)->first();
        return view('ditail',['shop' => $shop]);
    }
}
