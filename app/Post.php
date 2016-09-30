<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    // add many-to-many relationship posts-tags
    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }

    // post has many comments
    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }
}