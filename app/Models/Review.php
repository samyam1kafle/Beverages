<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'product_id','review','author','star','author_id','author_email'
    ];

    public function product_review(){
        return $this->belongsTo('App\Models\Products','product_id');
    }

    public function usercommented(){
        return $this->belongsTo('App\Models\AllUser','author_id');
    }


    public function blogreview(){
        return $this->hasMany('App\Models\blogReview','author_id');
    }
}
