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
        return view('admin-user',['users' => $users]);
    }
}
