<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Erea;
use App\Models\Genre;
use Auth;

class OwnerShopDitailController extends Controller
{
    public function ditail(Request $request)
    {
        $ereas = Erea::all();
        $genres = Genre::all();
        $shop =  Shop::where('id',$request->shop_id)->first();
        $items = [
            'ereas' => $ereas,
            'genres' => $genres,
            'shop' => $shop,
        ];
        return view('owner-shop-ditail',$items);
    }
    // 店舗情報更新
    public function update(Request $request)
    {
        $update = $request->all();
        unset($update['_token'],$update['shop_id']);
        Shop::where('id',$request->shop_id)->update($update);

        $ereas = Erea::all();
        $genres = Genre::all();
        $shop =  Shop::where('id',$request->shop_id)->first();
        $items = [
            'ereas' => $ereas,
            'genres' => $genres,
            'shop' => $shop,
        ];
        return view('owner-shop-ditail',$items);
    }
    // ユーザー削除
    public function delete(Request $request){
        $delete = Shop::where('id', $request->shop_id)->first();
        $delete -> delete();

        $shops =  Shop::where('user_id',Auth::user()->id)->get();
        return view('owner-shops',['shops' => $shops]);
    }
}
