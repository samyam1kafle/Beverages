<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['id', 'title', 'description', 'parent_id','slug'];

    public function products()
    {
        return $this->hasMany('App\Products');
    }

    public function subcategory(){
        return $this->hasMany('App\SubCat');
    }

    public function blogs(){
        return $this->hasMany('App\Blog');
    }

}

