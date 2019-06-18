<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class LiveSearch extends Controller
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
        $category = Category::all();
        $searchResults = (new Search())
            ->registerModel(Category::class, ['title', 'slug', 'created_at'])
            ->registerModel(Products::class, ['name', 'slug', 'created_at'])
            ->perform($request->input('query'));


        return view('live_search', compact('searchResults','category'));
    }
}