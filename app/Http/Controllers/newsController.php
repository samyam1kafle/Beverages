<?php

namespace App\Http\Controllers;

use App\News;
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
}
