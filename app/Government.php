<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Government extends Model
{
    public $table="governments";
    public function GetDistricts()
    {
    	return $this->hasMany('App\District','id');
    }
}
