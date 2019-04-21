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
        'category_id'
    ];


    public function category(){
        return $this->belongsTo('App\Category');
    }
}
