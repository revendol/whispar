<?php

namespace App\Http\Controllers\Users;

use App\Mail\MasterMail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function verifyEmail($token)
    {
        if($token){
            $user = User::where('verify_token',$token)->firstOrFail();
            if($user){
                $user->status = true;
                $user->verify_token = '';
                $user->save();
                Auth::loginUsingId($user->id, 60 * 60 * 24 * 30);
                return redirect()->route('home');
            }
        }
        return view('Admins.permission');
    }

    public function mailCheck(){
        $user = User::find(1);
        dd($user);
    }
}
