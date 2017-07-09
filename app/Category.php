<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	
	protected $fillable = array(
        'category_id','brand_id'
    );
    
    public function getCategoryItem()
    {

    	 return $this->hasMany('App\Item','id');

    }
  
}
