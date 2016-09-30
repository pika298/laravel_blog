<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function posts()
    {
    	// 1-to-many relationship: 1 categories has many posts
    	return $this->hasMany('App\Post');
    }
}
