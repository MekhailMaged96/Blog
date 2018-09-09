<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    protected $table = 'catagories';

    public function posts() {
       return $this->hasMany('App\Post');
    }
    
    //
}
