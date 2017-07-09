<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
   public $table="places";
   public function GetAdvertises()
    {
    	return $this->hasMany('App\Advertise','id');
    }
    public function GetHalls()
    {
    	return $this->hasMany('App\Hall','id');
    }
    public function GetDistrict()
    {
    	return $this->belongsTo('App\District','District_Id');
    }
    public function GetPackge()
    {
    	return $this->belongsTo('App\Packge','Packge_id');
    }
    public function GetUsers()
    {
    	return $this->hasMany('App\User','id');
    }
}
