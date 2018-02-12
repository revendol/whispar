<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    protected $table = 'permission_role';

    public function permission(){
        return Permission::where('id',$this->permission_id)->first();
    }

    public function role(){
        return Role::where('id',$this->role_id)->first();
    }
}
