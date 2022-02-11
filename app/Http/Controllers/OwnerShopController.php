<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Shop;

class OwnerShopController extends Controller
{
    // 一覧表示
    public function shops(Request $request)
    {
        $shops =  Shop::where('user_id',Auth::user()->id)->get();
        return view('owner-shops',['shops' => $shops]);
    }
}
