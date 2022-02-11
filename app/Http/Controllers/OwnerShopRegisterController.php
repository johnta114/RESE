<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerShopRegisterController extends Controller
{
    // 作成画面表示
    public function create(Request $request)
    {
        return view('shop-register');
    }
}
