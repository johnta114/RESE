<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Review;
use Auth;

class ReviewController extends Controller
{
    public function review(Request $request){
        $shop = Shop::where('id',$request->shop_id)->first();

        return view('review',['shop' => $shop]);
    }
    public function done(Request $request){
        $favorite = Review::create([
            'user_id' => Auth::user()->id,
            'shop_id' => $request->shop_id,
            'star' => $request->star,
            'comment' =>$request->comment,
        ]);
        return view('done');
    }
}
