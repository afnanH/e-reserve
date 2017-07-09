<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $table="permissions";
    public function GetRoles()
    {
        return $this->belongsToMany('App\Role','permission_role','permission_id','role_id');
    }
}
