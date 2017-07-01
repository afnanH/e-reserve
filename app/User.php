<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
   use EntrustUserTrait;
    
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey='id';
    
protected $fillable = ['Name','Username', 'Email', 'password'];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','Email'
    ];
    public $table="users";
    public function GetSchadules()
    {
    	return $this->hasMany('App\Schadule','id');
    }
    public function GetDistrict()
    {
    	return $this->belongsTo('App\District','District_Id');
    }
    public function GetPlace()
    {
    	return $this->belongsTo('App\Place','Place_Id');
    }
    public function GetRoles()
    {
        return $this->belongsToMany('App\Role','role_user','user_id','role_id');
    }
}
