<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use App\Models\Reservation;
use Auth;

use Illuminate\Http\Request;

class DitailController extends Controller
{
    public function ditail(Request $request)
    {
        $shop = Shop::find($request->shop_id);
        $user=Auth::user()->id;
        $reservations = Reservation::where('shop_id', $request->shop_id)->where('user_id', $user)->get();
// dd($reservations);
        $item=  [
            'shop' => $shop,
            'reservations' => $reservations
        ];

        return view('ditail',$item);
    }
}
