<?php

namespace App\Http\Controllers\Admins;

use App\User;
use App\UserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        if(Auth::user()){
            return Auth::user()->can('browse-admin')? '': redirect()->back();
        };
    }
    public function index(){
        $ret = [
            'new_user' => 0,
            'total_employee' => 0,
            'user' => 0,
            'unique_visitor' => 0
        ];
        if(Auth::user()->can('browse-admin')){
            $date = date('Y-m-d H:i:s',time());
            $month = substr($date,5,2)-1;
            if($month<10){
                $month = '0'.$month;
            }
            $date = substr_replace($date,$month,5,2);
            $ret = [
                'new_user' => count(User::where('created_at','>',$date)->get()),
                'total_employee' => count(UserRole::all()),
                'user' => count(User::all()),
                'unique_visitor' => 0,
                'employees' => UserRole::all()
            ];
            return view('Admins.dashboard.index',compact('ret'));
        }
    }
}
