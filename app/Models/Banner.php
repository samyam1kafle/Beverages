<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
      'image','status_id'
    ];

    public function banerss(){
        return $this->belongsTo('App\Models\BannerStatus','status_id');
    }
}
