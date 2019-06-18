<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Category extends Model implements Searchable
{
    use Sluggable;
    protected $fillable = ['title', 'description', 'parent_id','slug'];


    public function getSearchResult(): SearchResult
    {
        $url = route('events.show', $this->id);

        return new SearchResult(
            $this,
            $this->title,
            $url
        );
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function products()
    {
        return $this->hasMany('App\Models\Products');
    }

    public function subcategory(){
        return $this->hasMany('App\Models\SubCat');
    }


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */

}

