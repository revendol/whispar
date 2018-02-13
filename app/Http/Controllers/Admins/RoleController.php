<?php

namespace App\Http\Controllers\Admins;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        if(Auth::user()){
            return Auth::user()->can('browse-admin')? '': redirect()->back();
        };
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        if(Auth::user()->can('role-crud')){
            $roles = Role::all();
            return view('Admins.role.index',compact('roles'));
//        }
//        return view('Admins.permission');
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
        if(Auth::user()->can('role-crud')){
            $this->validate($request,[
                'name' => 'required|min:3',
                'display_name' => 'required|min:3'
            ]);
            $role = new Role();
            $role->name = $request->name;
            $role->display_name = $request->display_name;
            $role->description = $request->description;
            $role->save();
            return back()->with('success','Role was saved successfully');
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
        if(Auth::user()->can('role-crud')){
            $role = Role::where('id',$id)->first();
            return view('Admins.role.edit',compact('role'));
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
        if(Auth::user()->can('role-crud')){
            $this->validate($request,[
                'name' => 'required|min:3',
                'display_name' => 'required|min:3'
            ]);
            $role = Role::where('id',$id)->first();
            $role->name = $request->name;
            $role->display_name = $request->display_name;
            $role->description = $request->description;
            $role->save();
            return back()->with('success','Role was updated successfully');
        }
        return view('Admins.permission');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->can('role-crud')){
            $role = Role::where('id',$id)->delete();
            return back()->with('success','Role was deleted successfully');
        }
        return view('Admins.permission');
    }
}
