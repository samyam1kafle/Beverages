<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BannerStatus extends Model
{
    protected $fillable = ['title'];

    public function banners(){
        return $this->hasMany('App\Models\Banner');
    }
}
