<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    public function category(){
        
        return $this->belongsTo('App\Models\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
    
    public function auther(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function getImageAttribute()
    {
        return $this->post_image;
    }
}
