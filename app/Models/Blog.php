<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{
    use Sluggable;
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


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'offer_product_name'
            ]
        ];
    }
    public function offered(){
        return $this->hasMany('App\Models\Products');
    }

    public function blog_category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }


}
