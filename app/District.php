<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $table="districts";
    public function GetGovernment()
    {
    	return $this->belongsTo('App\Government','Government_Id');
    }
    public function GetPlaces()
    {
    	return $this->hasMany('App\Place','id');
    }
    public function GetUsers()
    {
    	return $this->hasMany('App\User','id');
    }
}
