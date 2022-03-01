<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Erea;
use App\Models\Genre;
use Auth;
use App\Models\Shop;
use Storage;

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

        $form = $request->all();
  
        //s3アップロード開始
        $image = $request->file('imagefile');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('/', $image, 'public');


        $shop = Shop::create([
            'shop_name' => $request->shop_name,
            'user_id' => Auth::user()->id,
            'erea_id' => $request->erea_id,
            'genre_id' => $request->genre_id,
            'overview' => $request->overview,
             // アップロードした画像のフルパスを取得
            'image' => Storage::disk('s3')->url($path),
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
