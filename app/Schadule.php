<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schadule extends Model
{
  public $table="schadules";
  public function GetHall()
    {
    	return $this->belongsTo('App\Hall','Hall_Id');
    }
    public function GetUser()
    {
    	return $this->belongsTo('App\User','User_Id');
    }
}
