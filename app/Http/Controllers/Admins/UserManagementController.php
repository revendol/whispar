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
        $user->deleted_at = date('Y-m-d H:i:j');
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
    //Add new user
    public function addUser(Request $request){
        $this->validate($request,[
            'name'     => 'required|min:3',
            'email'    => 'required|email',
            'password' => 'required|confirmed|min:6'
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'username' => str_split($request->email,strpos($request->email,'@'))[0]."_".rand(1,9999),
            'password' => bcrypt($request->password),
            'status' => true,
            'verify_token' => '',
            'suspension_status' => false
        ];
        $user = User::create($data);
        if($user){
            //User creation email to user should send from here.

            return back()->with('success','User was added successfully.');
        }
        return back()->with('warning','There was some problem with adding new user.');
    }

    //Get user trash and return to it's view
    public function userTrash(){
        $users = User::where('deleted_at','!=',null)->get();
        return view('Admins.user-management.trash',compact('users'));
    }
    //Restore user from trash
    public function restoreUser($id){
        $user = User::where('id',$id)->firstOrFail();
        $user->deleted_at = null;
        $user->save();
        return back()->with('success','User was restored successfully.');
    }
    //Delete permanently
    public function permanentDelete($id){
        $user = User::where('id',$id)->firstOrFail();
        $user->delete();
        return back()->with('success','User was deleted successfully.');
    }
    //Empty trash
    public function deleteAll(){
        $user = User::where('deleted_at','!=',null)->delete();
        return 'success';
    }

}
