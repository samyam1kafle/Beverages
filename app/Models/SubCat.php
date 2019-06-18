<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCat extends Model
{
    public function MainCategory(){
        return $this->belongsTo('App\Models\Category');
    }
}
