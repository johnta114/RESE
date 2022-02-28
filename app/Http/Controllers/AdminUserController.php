<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    // 一覧表示
    public function users(Request $request)
    {
        $users =  User::where('role','<=',2)->get();
        return view('users',['users' => $users]);
    }

    // 検索
    public function search(Request $request){
        $search1 = $request->input('name');
        $search2 = $request->input('email');
        $search3 = $request->input('role');

        if($search2 == null && $search3 == null) {
            $users = User::where('role','<=',2)->where('name', 'LIKE',"%{$search1}%")->get();
        }elseif($search2 == null){
            $users = User::where('role','<=',2)->where('name', 'LIKE',"%{$search1}%")->where('role', $search3)->get();
        }elseif($search3 == null){
            $users = User::where('role','<=',2)->where('name', 'LIKE',"%{$search1}%")->where('email','LIKE',"%$search2%")->get();
        }else{
            $users = User::where('role','<=',2)->where('name', 'LIKE',"%{$search1}%")->where('role', $search3)->where('email','LIKE',"%$search2%")->get();
        }

        return view('users',['users' => $users]);
    }
}
