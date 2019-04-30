<?php

namespace App\Http\Controllers;

use App\Category;
use App\Products;
use Illuminate\Http\Request;

class SinglePageController extends Controller
{
   public function index(){
       $category = Category::all();
       $products = Products::orderBy('id','desc');
       return view('FrontEnd/main_views/product_single',compact('category','products'));
   }
}
