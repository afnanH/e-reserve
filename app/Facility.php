<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    public $table="facilites";
    public function GetHalls()
    {
        return $this->belongsToMany('App\Hall','halles_facilites','Facility_id','Hall_id');
    }
}
