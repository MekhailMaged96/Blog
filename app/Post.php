<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
   

    public function catagory() {
       return $this->belongsTo('App\Catagory');
    }
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
    public function comments() {
        return $this->hasMany('App\Comment');
    }
    
}
