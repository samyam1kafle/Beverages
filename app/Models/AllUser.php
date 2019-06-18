<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Auth;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;


class AllUser extends Auth implements Searchable, MustVerifyEmail
{
    use Notifiable;
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $fillable = [
        'name', 'email', 'password', 'image', 'role', 'is_active'
    ];



    public function getSearchResult(): SearchResult
    {
        $url = route('Adminsearch', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }

    public function roles()
    {
        return $this->belongsTo('App\Models\Roles', 'role');
    }
}
