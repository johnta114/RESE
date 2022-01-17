<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Erea;
use App\Models\Genre;
use App\Models\Favorite;
use Auth;

class HomeController extends Controller
{
// 一覧表示
    public function home()
    {
        $ereas = Erea::all();
        $genres = Genre::all();
        $shops = Shop::all();
        $auth = Auth::user();


        $items = [
            'ereas' => $ereas,
            'genres' => $genres,
            'shops' => $shops,
            'auth' => $auth,
        ];

        return view('home',$items);
    }

// 検索
    public function search(Request $request){
        $ereas = Erea::all();
        $genres = Genre::all();
        // クエリ発行
        $query = Shop::query();
        $shops = $query->where('shop_name', 'LIKE',"%{$request->input('keyword')}%")
        ->where('erea_id', 'LIKE',"%{$request->input('erea')}%")
        ->where('genre_id', 'LIKE',"%{$request->input('genre')}%")
        ->get();

        $items =[
            'ereas' => $ereas,
            'genres' => $genres,
            'shops' => $shops,
        ];

        return view('home',$items);
    }
// お気に入り登録
    public function like(Request $request)
    {
        $favorites = new Favorite;
        $favorites->shop_id = $request->shop_id;
        $favorites->user_id = Auth::user()->id;
        $favorites->save();
        return back();
    }
// お気に入り解除
    public function unlike(Request $request) {
        $user=Auth::user()->id;
        $favorites=Favorite::where('shop_id', $request->shop_id)->where('user_id', $user)->first();
        $favorites->delete();
        return back();
    }
}
