<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
protected $fillable = [
    'user_id','product_id'
];

public function products(){
    return $this->belongsTo('App\Models\Products','product_id');
}
}
