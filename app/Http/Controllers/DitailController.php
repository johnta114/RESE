<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use App\Models\Reservation;
use App\Models\Review;
use Auth;

use Illuminate\Http\Request;

class DitailController extends Controller
{
// 店舗詳細画面
    public function ditail($shop_id)
    {
        $shop = Shop::where('id',$shop_id)->first();
        $reviews = Review::where('shop_id',$shop_id)->get();
        $reviewsExits = Review::where('shop_id',$shop_id)->exists();
        $items = [
            'shop' => $shop,
            'reviews' => $reviews,
            'reviewsExits' => $reviewsExits,
        ];
        return view('ditail',$items);
    }
}
