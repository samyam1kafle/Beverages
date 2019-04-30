<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCat extends Model
{
    public function MainCategory(){
        return $this->belongsTo('App\Category');
    }
}
