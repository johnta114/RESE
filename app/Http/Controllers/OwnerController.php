<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{
    // 責任者ページ表示
    public function owner(Request $request)
    {
        return view('owner');
    }
}