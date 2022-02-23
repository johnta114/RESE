<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Shop;
use Carbon\Carbon;

class OwnerShopReservationController extends Controller
{
    public function reservation(Request $request)
    {
        $reservations = Reservation::where('shop_id',$request->shop_id)
            ->orderBy('reservation_date', 'asc')
            ->orderBy('reservation_time', 'asc')
            ->get();
        $shop = Shop::selectRaw('shop_name')->where('id',$request->shop_id);
        // dd($shop);

        $items =[
            'reservations' => $reservations,
            'shop' => $shop,
        ];

        return view('owner-shop-reservation',$items);
    }
    public function visit(Request $request)
    {
        $visit = Reservation::where('id',$request->reservation_id)->first();
        $visit->visited_at = new Carbon('now');
        $visit->save();

        $reservations = Reservation::where('shop_id',$request->shop_id)
            ->orderBy('reservation_date', 'asc')
            ->orderBy('reservation_time', 'asc')
            ->get();

        $shop = Shop::selectRaw('shop_name')->where('id',$request->shop_id);
        // dd($shop);

        $items =[
            'reservations' => $reservations,
            'shop' => $shop,
        ];

        return view('owner-shop-reservation',$items);
    }
}
