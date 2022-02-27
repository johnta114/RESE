<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Erea;
use App\Models\Genre;

class AdminShopController extends Controller
{
    // 一覧表示
    public function shops(Request $request)
    {
        $ereas = Erea::all();
        $genres = Genre::all();
        $shops =  Shop::all();

        $items = [
            'ereas' => $ereas,
            'genres' => $genres,
            'shops' => $shops,
        ];
        return view('owner-shops',$items);
    }
    // 検索
    public function search(Request $request){
        $ereas = Erea::all();
        $genres = Genre::all();
        $shopCount = Shop::count();

        $search1 = $request->input('keyword');
        $search2 = $request->input('erea');
        $search3 = $request->input('genre');

        if($search2 == null && $search3 == null) {
            $shops = Shop::where('shop_name', 'LIKE',"%{$search1}%")->get();
        }elseif($search2 == null){
            $shops = Shop::where('shop_name', 'LIKE',"%{$search1}%") -> where('genre_id', $search3)->get();
        }elseif($search3 == null){
            $shops = Shop::where('shop_name', 'LIKE',"%{$search1}%")->where('erea_id', $search2)->get();
        }else{
            $shops = Shop::where('shop_name', 'LIKE',"%{$search1}%")->where('genre_id', $search3)->where('erea_id', $search2)->get();
        }

        $items =[
            'ereas' => $ereas,
            'genres' => $genres,
            'shops' => $shops,
        ];

        return view('owner-shops',$items);
    }
}
