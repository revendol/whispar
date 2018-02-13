<?php

namespace App\Http\Controllers\Admins;

use App\Permission;
use App\PermissionRole;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PermissionRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission_roles = PermissionRole::all();
        $permissions = Permission::all();
        $roles = Role::all();
        return view('Admins.permission_role.index',compact('permission_roles','permissions','roles'));
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
        if(Auth::user()->can('permission-role-crud')){
            $permissions = $request->permission;
            $role = $request->role;
            foreach ($permissions as $permission){
                if (!PermissionRole::where('role_id',$role)->where('permission_id',$permission)->first()){
                    $newPR = new PermissionRole();
                    $newPR->permission_id = $permission;
                    $newPR->role_id = $role;
                    $newPR->save();
//                PermissionRole::create(['permission_id'=>$permission,'role_id'=>$role]);
                }
            }
            return back()->with('success','Permission Role was saved successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(Auth::user()->can('permission-role-crud')){
            PermissionRole::where('permission_id',$id)->where('role_id',$request->role_id)->delete();
            return back()->with('success','Permission role was deleted successfully');
        }

        return view('Admins.permission');
    }
}
