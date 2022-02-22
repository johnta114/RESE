<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserDitailController extends Controller
{
    public function ditail(Request $request)
    {
        $user =  User::where('id',$request->user_id)->first();
        return view('admin-user-ditail',['user' => $user]);
    }
    // ユーザー情報更新
    public function update(Request $request)
    {
        $update = $request->all();
        unset($update['_token']);
        User::where('id',$request->id)->update($update);

        $user = User::where('id', $request->id)->first();
        return view('admin-user-ditail',['user' => $user]);
    }
    // ユーザー削除
    public function delete(Request $request){
        $delete = User::where('id', $request->id)->first();
        $delete -> delete();

        $users =  User::all();
        return view('admin-users',['users' => $users]);
    }
}
