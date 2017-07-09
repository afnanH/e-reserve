<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $table="roles";
    public function GetUsers()
    {
        return $this->belongsToMany('App\User','role_user','role_id','user_id');
    }
    public function GetPermissions()
    {
        return $this->belongsToMany('App\Permission','permission_role','role_id','permission_id');
    }
}
