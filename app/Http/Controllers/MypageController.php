<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Reservation;
use App\Models\Shop;
use App\Models\Review;
use Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;

class MypageController extends Controller
{
// 一覧表示
    public function mypage(){
        $favorites = Favorite::where('user_id', Auth::user()->id)->get();
        $favoritesExists = Favorite::where('user_id', Auth::user()->id)->exists();
        $reservations = Reservation::where('user_id', Auth::user()->id)
            ->whereDate('reservation_date','>=',Carbon::today()->toDateString())
            ->where('visited_at',null)
            ->orderBy('reservation_date', 'asc')
            ->orderBy('reservation_time', 'asc')
            ->get();
        $reservationsExists = Reservation::where('user_id', Auth::user()->id)
            ->whereDate('reservation_date','>=',Carbon::today()->toDateString())
            ->where('visited_at',null)
            ->orderBy('reservation_date', 'asc')
            ->orderBy('reservation_time', 'asc')
            ->exists();
        $visits = Reservation::whereNotNull('visited_at')
            ->orderBy('reservation_date', 'asc')
            ->orderBy('reservation_time', 'asc')
            ->get();
        $visitsExists = Reservation::whereNotNull('visited_at')
            ->orderBy('reservation_date', 'asc')
            ->orderBy('reservation_time', 'asc')
            ->exists();

        $items = [
            'favorites' => $favorites,
            'favoritesExists' => $favoritesExists,
            'reservations' => $reservations,
            'reservationsExists' => $reservationsExists,
            'visits' => $visits,
            'visitsExists' => $visitsExists,
        ];

        return view('mypage',$items);
    }

    // お気に入り解除
    public function unlike(Request $request) {
        $unlike = Favorite::where('shop_id', $request->shop_id)->where('user_id', Auth::user()->id)->first();
        $unlike -> delete();

        $favorites = Favorite::where('user_id', Auth::user()->id)->get();
        $favoritesExists = Favorite::where('user_id', Auth::user()->id)->exists();
        $reservations = Reservation::where('user_id', Auth::user()->id)
            ->whereDate('reservation_date','>=',Carbon::today()->toDateString())
            ->where('visited_at',null)
            ->orderBy('reservation_date', 'asc')
            ->orderBy('reservation_time', 'asc')
            ->get();
        $reservationsExists = Reservation::where('user_id', Auth::user()->id)
            ->whereDate('reservation_date','>=',Carbon::today()->toDateString())
            ->where('visited_at',null)
            ->orderBy('reservation_date', 'asc')
            ->orderBy('reservation_time', 'asc')
            ->exists();
        $visits = Reservation::whereNotNull('visited_at')
            ->orderBy('reservation_date', 'asc')
            ->orderBy('reservation_time', 'asc')
            ->get();
        $visitsExists = Reservation::whereNotNull('visited_at')
            ->orderBy('reservation_date', 'asc')
            ->orderBy('reservation_time', 'asc')
            ->exists();

        $items = [
            'favorites' => $favorites,
            'favoritesExists' => $favoritesExists,
            'reservations' => $reservations,
            'reservationsExists' => $reservationsExists,
            'visits' => $visits,
            'visitsExists' => $visitsExists,
        ];

        return view('mypage',$items);
    }

    // 予約削除
    public function reservationDelete(Request $request){
        $delete = Reservation::where('id', $request->reservation_id)->where('created_at',$request->created_at)->first();
        $delete -> delete();
        $favorites = Favorite::where('user_id', Auth::user()->id)->get();
        $favoritesExists = Favorite::where('user_id', Auth::user()->id)->exists();
        $reservations = Reservation::where('user_id', Auth::user()->id)
            ->whereDate('reservation_date','>=',Carbon::today()->toDateString())
            ->where('visited_at',null)
            ->orderBy('reservation_date', 'asc')
            ->orderBy('reservation_time', 'asc')
            ->get();
        $reservationsExists = Reservation::where('user_id', Auth::user()->id)
            ->whereDate('reservation_date','>=',Carbon::today()->toDateString())
            ->where('visited_at',null)
            ->orderBy('reservation_date', 'asc')
            ->orderBy('reservation_time', 'asc')
            ->exists();
        $visits = Reservation::whereNotNull('visited_at')
            ->orderBy('reservation_date', 'asc')
            ->orderBy('reservation_time', 'asc')
            ->get();
        $visitsExists = Reservation::whereNotNull('visited_at')
            ->orderBy('reservation_date', 'asc')
            ->orderBy('reservation_time', 'asc')
            ->exists();

        $items = [
            'favorites' => $favorites,
            'favoritesExists' => $favoritesExists,
            'reservations' => $reservations,
            'reservationsExists' => $reservationsExists,
            'visits' => $visits,
            'visitsExists' => $visitsExists,
        ];
        return view('mypage',$items);
    }
}
