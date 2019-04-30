<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'offer_id',
        'title',
        'offered_price',
        'slug',
        'image',
        'offer_product_name',
        'description',
        'category_id',
        'real_price'
    ];
    public function offered(){
        return $this->hasMany('App\Products');
    }

    public function blog_category(){
        return $this->belongsTo('App\Category','category_id');
    }
}
