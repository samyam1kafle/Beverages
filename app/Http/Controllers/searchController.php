<?php

namespace App\Http\Controllers;

use App\Models\AllUser;
use App\Models\Blog;

use App\Models\Cart;
use App\Models\Category;

use App\Models\Products;

use App\Models\Roles;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class searchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * search records in database and display  results
     * @param  Request $request [description]
     * @return view      [description]
     */
    public function search(Request $request)
    {
        $searchResults = (new Search())
            ->registerModel(AllUser::class, ['name', 'email', 'created_at'])
            ->registerModel(Category::class, ['title', 'slug', 'created_at'])
            ->registerModel(Products::class, ['name', 'slug', 'created_at'])
            ->registerModel(Roles::class, ['name', 'created_at'])

            ->perform($request->input('query'));


        return view('Backend/search', compact('searchResults'));
    }


    public function categoriesshow()
    {

    }
}
