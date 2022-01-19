<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use App\Models\Reservation;
use Auth;

use Illuminate\Http\Request;

class DitailController extends Controller
{
// 詳細表示
    public function ditail(Request $request)
    {
        $shop = Shop::find($request->shop_id);
    // 予約情報取得
        $user=Auth::user()->id;
        $reservations = Reservation::where('shop_id', $request->shop_id)->where('user_id', $user)->get();

        $item=  [
            'shop' => $shop,
            'reservations' => $reservations
        ];

        return view('ditail',$item);
    }
}
