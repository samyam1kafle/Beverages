<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
    protected $fillable = [
        'user_id', 'user_name', 'user_email', 'mobile'
        , 'landline', 'Country', 'state', 'City', 'address1', 'address2'
    ];

    public function useraddress(){
        return $this->belongsTo('App\Models\AllUser','user_id');
    }
}
