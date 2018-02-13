<?php

namespace App\Http\Controllers\Admins;

use App\Role;
use App\User;
use App\UserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_roles = UserRole::all();
        $users = User::all();
        $roles = Role::all();
        return view('Admins.user_role.index',compact('user_roles','users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'role' => 'required',
            'user' => 'required'
        ]);
        if(Auth::user()->can('user-role-crud')){
            $userRole = new UserRole();
            $userRole->user_id = $request->user;
            $userRole->role_id = $request->role;
            $userRole->save();
            return back();
        }
        return view('Admins.permission');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->can('user-role-crud')){
            $user = User::where('id',$id)->first();
            $roles = Role::all();
            return view('Admins.user_role.edit',compact('user','roles'));
        }
        return view('Admins.permission');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->can('user-role-crud')){
            //Update user-role for user
            $userRole = UserRole::where('user_id',$id)->firstOrFail();
            $userRole->role_id = $request->role;
            $userRole->save();
            return back();
        }
        return view('Admins.permission');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(Auth::user()->can('user-role-crud')){
            UserRole::where('user_id',$id)->where('role_id',$request->role_id)->delete();
            return back();
        }

        return view('Admins.permission');
    }
}
