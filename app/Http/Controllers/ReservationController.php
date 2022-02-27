<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Reservation;

class ReservationController extends Controller
{
    // 一覧表示
    public function reservation(Request $request){
        $reservation = Reservation::where('id', $request->reservation_id)->first();
        return view('reservation',['reservation' => $reservation]);
    }

    // 予約変更
    public function update(Request $request){

        $update = $request->all();
        unset($update['_token']);
        unset($update['reservation_id']);
        Reservation::where('id', $request->reservation_id)->update($update);

        $reservation = Reservation::where('id', $request->reservation_id)->first();
        return view('reservation-update',['reservation' => $reservation]);
    }

}
