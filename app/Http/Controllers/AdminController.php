<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;

class AdminController extends Controller
{
    // メニュー画面
    public function admin(Request $request)
    {
        return view('admin');
    }
}
