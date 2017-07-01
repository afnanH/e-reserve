<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $table="types";
    public function GetHalls()
    {
        return $this->belongsToMany('App\Hall','halles_types','Type_id','Hall_id');
    }
}
