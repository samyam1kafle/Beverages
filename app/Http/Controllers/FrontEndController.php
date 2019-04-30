<?php

namespace App\Http\Controllers;

use App\Category;
use App\Products;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        $category = Category::all();
//
        $products = Products::inRandomOrder()->limit(5)->get();
       return view('FrontEnd/index',compact('category','products'));
    }

    public function shop($slug = null){
/*for specific category products */

   $category_detail = Category::where('slug','=',$slug)->first();
//        dd($category_detail);
   $category_products = Products::where(['category_id'=>$category_detail->id])->get();
//
//   /*For Navigation Category*/
        $category = Category::all();
//
   return view('FrontEnd/shop',compact('category_detail','category_products','category'));
    }

    public function detail($slug = null){
        $category = Category::all();
        $product = Products::where('slug', '=', $slug)->first();
        return view('FrontEnd/product-details',compact('product','category'));
    }
}
