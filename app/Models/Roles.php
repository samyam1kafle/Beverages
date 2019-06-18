<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Roles extends Model implements Searchable
{
    protected $fillable = ['name'];

    public function getSearchResult(): SearchResult
    {
        $url = route('roles.show', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }

    public function users(){
        return $this->hasMany('App\Models\User');
    }

}
