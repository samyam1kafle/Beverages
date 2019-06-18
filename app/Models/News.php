<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class News extends Model implements Searchable
{
    protected $fillable = [
        'about','title','image','description','news_category_id'
    ];

    public function getSearchResult(): SearchResult
    {
        $url = route('news.show', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }

}
