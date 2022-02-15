<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Erea;
use App\Models\Genre;
use App\Models\Favorite;
use App\Models\Review;
use Auth;

class HomeController extends Controller
{
// 一覧表示
    public function home()
    {
        $ereas = Erea::all();
        $genres = Genre::all();
        $shops = Shop::all();
        $stars = Review::selectRaw('shop_id, AVG(star) as star_avg')->groupBy('shop_id')->get();
        $auth = Auth::user();

        $items = [
            'ereas' => $ereas,
            'genres' => $genres,
            'shops' => $shops,
            'stars' => $stars,
            'auth' => $auth,
        ];

        return view('home',$items);
    }

// 検索
    public function search(Request $request){
        $ereas = Erea::all();
        $genres = Genre::all();

        $search1 = $request->input('keyword');
        $search2 = $request->input('erea');
        $search3 = $request->input('genre');

        // クエリ発行
        $query = Shop::query();

        if($search2 == null && $search3 == null) {
            $shops = $query->where('shop_name', 'LIKE',"%{$search1}%")->get();
        }elseif($search2 == null){
            $shops = $query->where('shop_name', 'LIKE',"%{$search1}%") -> where('genre_id', $search3)->get();
        }elseif($search3 == null){
            $shops = $query->where('shop_name', 'LIKE',"%{$search1}%")->where('erea_id', $search2)->get();
        }else{
            $shops = $query->where('shop_name', 'LIKE',"%{$search1}%")->where('genre_id', $search3)->where('erea_id', $search2)->get();
        }

        $stars = Review::selectRaw('shop_id, AVG(star) as star_avg')->groupBy('shop_id')->get();

        $items =[
            'ereas' => $ereas,
            'genres' => $genres,
            'shops' => $shops,
            'stars' => $stars,
        ];

        return view('home',$items);
    }
// お気に入り登録
    public function like(Request $request)
    {

        $favorite = Favorite::create([
            'shop_id' => $request->shop_id,
            'user_id' => Auth::user()->id,
        ]);
        
        return back();
    }
// お気に入り解除
    public function unlike(Request $request) {
        $favorites=Favorite::where('shop_id', $request->shop_id)->where('user_id', Auth::user()->id)->first();
        $favorites->delete();
        return back();
    }
}
