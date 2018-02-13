<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'role_user';

    protected $primaryKey = 'user_id';

    public function user(){
        return User::where('id',$this->user_id)->first();
    }

    public function role(){
        return Role::where('id',$this->role_id)->first();
    }
}
