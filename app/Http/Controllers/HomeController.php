<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Erea;
use App\Models\Genre;

class HomeController extends Controller
{
    public function home()
    {
        $ereas = Erea::all();
        $genres = Genre::all();
        $shops = Shop::all();

        $items = [
            'ereas' => $ereas,
            'genres' => $genres,
            'shops' => $shops,
        ];

        return view('home',$items);
    }

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
}
