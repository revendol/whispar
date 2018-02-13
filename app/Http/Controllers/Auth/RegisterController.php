<?php

namespace App\Http\Controllers\Auth;

use App\Mail\MasterMail;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => str_split($data['email'],strpos($data['email'],'@'))[0]."_".rand(1,9999),
            'password' => bcrypt($data['password']),
            'status' => false,
            'verify_token' => base64_encode(str_split($data['email'],strpos($data['email'],'@'))[0]."_".rand(1,9999).time())
        ]);
        if($user){
            $link = route('user.activate', $user->verify_token);
            $send_file = new MasterMail(
                [
                    'name'=> $user->name,
                    'link' => $link
                ],
                'Registration'
            );
            Mail::to($user->email)->send($send_file);
        }
        return $user;
    }
}
