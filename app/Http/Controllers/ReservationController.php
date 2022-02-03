<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Reservation;

class ReservationController extends Controller
{
    // 一覧表示
    public function reservation(Request $request){
        $reservation = Reservation::where('id', $request->reservation_id)->where('created_at',$request->created_at)->first();
        return view('reservation',['reservation' => $reservation]);
    }

    // 予約変更
    public function update(Request $request){

        $update = $request->all();
        unset($update['_token']);
        Reservation::where('id', $request->id)->update($update);

        $favorites = Favorite::where('user_id', Auth::user()->id)->get();
        $reservations = Reservation::where('user_id', Auth::user()->id)->get();
        $items = [
            'favorites' => $favorites,
            'reservations' => $reservations,
        ];
        return view('mypage',$items);
    }

}
