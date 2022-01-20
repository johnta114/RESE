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

        return view('ditail',['shop' => $shop]);
    }
}
