<?php

namespace App\Http\Controllers\Admins;

use App\Mail\MasterMail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Get User List
    public function userList(){
        $users = User::where('deleted_at','=',null)->get();
        return view('Admins.user-management.userList',compact('users'));
    }
    //Get User List for manage user
    public function manageUser(){
        $users = User::where('deleted_at','=',null)->get();
        return view('Admins.user-management.manageUser',compact('users'));
    }
    //delete user
    public function deleteUser($id){
        $user = User::where('id','=',$id)->firstOrFail();
        $user->deleted_at = time();
        $user->save();
        return back()->with('success','User was deleted successfully');
    }
    //suspend user and mail them
    public function suspendUser($id){
        $message = '';
        $campaign = '';
        $user = User::where('id','=',$id)->firstOrFail();
        if($user->suspension_status){
            $user->suspension_status = false;
            $campaign = 'AccountSuspensionRemoved';
            $message = 'User suspension was removed successfully';
        } else {
            $user->suspension_status = true;
            $message = 'User was suspended successfully';
            $campaign = 'AccountSuspension';
        }
        $user->save();
        $send_file = new MasterMail(
            [
                'name'=> $user->name
            ],
            $campaign
        );
        Mail::to($user->email)->send($send_file);
        return back()->with('success',$message);
    }
    //Get user and return to it's view for edit
    public function editUser($id){
        $user = User::where('id',$id)->firstOrFail();
        return view('Admins.user-management.editUser',compact('user'));
    }
    //Get user and return to it's view for edit
    public function updateUser(Request $request, $id){
        $this->validate($request,[
            'name'    => 'required|min:3',
            'email'   => 'required|email',
            'username' => 'required'
        ]);
        $user = User::where('id',$id)->firstOrFail();
//        dd($user);
        if($user){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;
            if(isset($request->verified_status)){
                $verify = $request->verified_status=='on'? true : false;
                $user->status = $verify;
            }
            if(isset($request->suspension_status)){
                $verify = $request->suspension_status=='on'? true : false;
                $user->suspension_status = $verify;
            }
            $user->save();

            return back()->with('success','User uas updated successfully updated.');
        }
        return back()->with('warning','User not found');
    }
}
