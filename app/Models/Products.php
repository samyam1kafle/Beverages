<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Products extends Model implements Searchable
{
    use Sluggable;

    protected $fillable = [
        'id',
        'name',
        'image',
        'price',
        'description',
        'slug',
        'category_id',
        'offer','offer_price',
        'featured',
        'stock'
    ];


    public function getSearchResult(): SearchResult
    {
        $url = route('products.show', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function review(){
        return $this->hasMany('App\Models\Review','product_id');
    }

    public function cartproducts(){
        return $this->belongsTo('App\Models\Cart');
    }
}
