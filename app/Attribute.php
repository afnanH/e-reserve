<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public $table="attributes";
    public function GetPackges()
    {
        return $this->belongsToMany('App\Packge','packges_attributes','attrbuti_id','Packge_id');
    }
}
