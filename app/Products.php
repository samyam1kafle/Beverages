<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'id',
        'name',
        'image',
        'price',
        'description',
        'slug',
        'category_id',
        'offer','offer_price',
        'featured'
    ];



    public function category(){
        return $this->belongsTo('App\Category');
    }
}
