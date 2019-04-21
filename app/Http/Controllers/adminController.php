<?php

namespace App\Http\Controllers;

use App\Category;
use App\Products;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        $products = Products::all()->count();
        $categories = Category::all()->count();

        return view('Backend/index',compact('products','categories'));

    }
}
