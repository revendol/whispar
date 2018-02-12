<?php

namespace App\Http\Controllers\Admins;

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
        if(Auth::user()->can('browse-admin')){
            return view('Admins.dashboard.index');
        }
    }
}
