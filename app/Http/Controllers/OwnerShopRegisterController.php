<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Erea;
use App\Models\Genre;
use Auth;
use App\Models\Shop;

class OwnerShopRegisterController extends Controller
{
    // 作成画面表示
    public function create(Request $request)
    {
        $ereas = Erea::all();
        $genres = Genre::all();

        $items = [
            'ereas' => $ereas,
            'genres' => $genres,
        ];
        return view('shop-register',$items);
    }
    // 店舗作成
    public function store(Request $request)
    {

        $post_data = $request->except('imagefile');
        $imagefile = $request->file('imagefile');
        $path = $imagefile->store('public');
        $read_path = str_replace('public', 'storage', $path);

        $shop = Shop::create([
            'shop_name' => $request->shop_name,
            'user_id' => Auth::user()->id,
            'erea_id' => $request->erea_id,
            'genre_id' => $request->genre_id,
            'overview' => $request->overview,
            'image' => $read_path,
        ]);

        $shops =  Shop::where('user_id',Auth::user()->id)->get();
        $ereas = Erea::all();
        $genres = Genre::all();

        $items =[
            'ereas' => $ereas,
            'genres' => $genres,
            'shops' => $shops,
        ];

        return view('shops',$items);
    }
}
