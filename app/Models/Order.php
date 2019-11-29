<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'all_user_id', 'total', 'order_status'
    ];

    public function orderItems()
    {
        return $this->belongsToMany('App\Models\Products')->withPivot('qty', 'total_amount');
    }
}
