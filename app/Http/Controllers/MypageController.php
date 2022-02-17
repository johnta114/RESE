<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Reservation;
use App\Models\Shop;
use Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MypageController extends Controller
{
// 一覧表示
    public function mypage(){
        $favorites = Favorite::where('user_id', Auth::user()->id)->get();
        $reservations = $reservations = Reservation::where('user_id', Auth::user()->id)->get();


        $items = [
            'favorites' => $favorites,
            'reservations' => $reservations,
        ];
        return view('mypage',$items);
    }

    // お気に入り解除
    public function unlike(Request $request) {
        $unlike = Favorite::where('shop_id', $request->shop_id)->where('user_id', Auth::user()->id)->first();
        $unlike -> delete();

        $favorites = Favorite::where('user_id', Auth::user()->id)->get();
        $reservations = $reservations = Reservation::where('user_id', Auth::user()->id)->get();

        $items = [
            'favorites' => $favorites,
            'reservations' => $reservations,
        ];

        return view('mypage',$items);
    }

    // 予約削除
    public function reservationDelete(Request $request){
        $delete = Reservation::where('id', $request->reservation_id)->where('created_at',$request->created_at)->first();
        $delete -> delete();
        $favorites = Favorite::where('user_id', Auth::user()->id)->get();
        $reservations = Reservation::where('user_id', Auth::user()->id)->get();

        $items = [
            'favorites' => $favorites,
            'reservations' => $reservations,
        ];
        return view('mypage',$items);
    }
}
