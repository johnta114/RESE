<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use App\Mail\SendUserMail;

class UserMailController extends Controller
{
    public function mail (Request $request){
        return view('mail');
    }
    public function send (Request $request){
        if($request->address == 'all'){
            $users = User::all();
        }elseif($request->address == 'owner'){
            $users = User::where('role',2)->get();
        }else{
            $users = User::where('role',4)->get();
        }
        foreach($users as $user){
            $items = [
                'message' => $request->message,
                'subject' => $request->subject,
                'user' => $user->name,
            ];
            
            Mail::to($user->email)->send(new SendUserMail($items));
        }
        return view('mail-send');
    }
}
