<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packge extends Model
{
    public $table="packges";
    public function GetAttributes()
    {
        return $this->belongsToMany('App\Attribute','packges_attributes','Packge_id','attrbuti_id');
    }
    public function GetPlaces()
    {
    	return $this->hasMany('App\Place','id');
    }
}
