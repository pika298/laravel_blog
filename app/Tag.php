<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts() 
    {
    	// many-to-many db relationship posts-tags
    	return $this->belongsToMany('App\Post');
    }
}
