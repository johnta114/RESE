<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Auth;
use App\Http\Requests\ReservationRequest;

class DoneController extends Controller
{
// 予約登録
    public function done(ReservationRequest $request) {
        $reservation = Reservation::create([
            'user_id' => Auth::user()->id,
            'shop_id' => $request->shop_id,
            'reservation_date' => $request->reservation_date,
            'reservation_time' => $request->reservation_time,
            'number_people' => $request->number_people,
        ]);
        return view('done');
    }
}