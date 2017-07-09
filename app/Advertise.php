<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
   public $table="advertises";
   public function GetPlace()
    {
    	return $this->belongsTo('App\Place','Place_id');
    }
}
