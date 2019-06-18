<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blogReview extends Model
{
    protected $fillable = [
        'user_id','email','blog_id','comment','star','status'
    ];
//    public function blogreview(){
//        return $this->belongsTo('App\Models\Blog','blog_id');
//    }

    public function usercommented(){
        return $this->belongsTo('App\Models\AllUser','user_id');
    }

public function Blogreview(){
        return $this->belongsTo('App\Models\Blog','blog_id');
}
}
