<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    public $table="halles";
    public function GetFacilities()
    {
        return $this->belongsToMany('App\Facility','halles_facilites','Hall_id','Facility_id');
    }
    public function GetTypes()
    {
        return $this->belongsToMany('App\Type','halles_types','Hall_id','Type_id');
    }
    public function GetPlace()
    {
    	return $this->belongsTo('App\Place','Place_Id');
    }
    public function GetSchadules()
    {
    	return $this->hasMany('App\Schadule','id');
    }
}
