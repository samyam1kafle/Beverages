<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{
    protected $fillable = [
        'product_id','product_name','product_volume','price','quantity','user_email','session_id',
    ];


    public function productcart(){
        return $this->hasMany('App\Models\Products');
    }
}
