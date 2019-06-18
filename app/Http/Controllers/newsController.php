<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Review;
use Illuminate\Http\Request;

class newsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('id', 'desc');
        return view('Backend/Products/News/index', compact('news'));
    }

    public function add_news()
    {
        return view('Backend/Products/News/create');

    }
    public function news_crud()
    {
        $news_category = News::all();
        return view('Backend/Products/News/create',compact('news_category'));

    }

    public function all_reviews(){
        $reviews = Review::orderBy('id','desc')->paginate(10);
        return view('Backend/review',compact('reviews'));
    }

    public function update(Request $request ,$slug = null){
        return view('Backend/review',compact('reviews'));
    }
}
