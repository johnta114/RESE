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
        $inputs = $request->all();
        $reservations = new Reservation;
        $reservations->user_id = Auth::user()->id;
        $reservations->shop_id = $request->shop_id;
        $reservations->reservation_date = $request->reservation_date;
        $reservations->reservation_time = $request->reservation_time;
        $reservations->number_people = $request->number_people;
        $reservations->save();
        return view('done');
    }
}