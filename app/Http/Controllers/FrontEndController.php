<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\blogReview;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Products;
use App\Models\Review;
use Auth;
use Session;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $products = Products::inRandomOrder()->limit(3)->get();
        return view('FrontEnd/index', compact('category', 'products'));
    }

    public function shop($slug = null)
    {
        /*for specific category products */

        $category_detail = Category::where('slug', '=', $slug)->first();
//        dd($category_detail);
        $category_products = Products::where(['category_id' => $category_detail->id])->get();
//
//   /*For Navigation Category*/
        $category = Category::all();
//
        return view('FrontEnd/shop', compact('category_detail', 'category_products', 'category'));
    }

    public function detail(Request $request, $slug = null)
    {
        $category = Category::all();
        $product = Products::where('slug', '=', $slug)->first();
        $reviews = $product->review()->orderBy('id', 'desc')->paginate(3);

        return view('FrontEnd/product-details', compact('product', 'category', 'reviews'));
    }

    public function store(Request $request, $slug = null)
    {
        $request->validate([
            'review'=>'required'
        ]);

        $product = Products::where('slug', '=', $slug)->first();
        $reviews = Review::create([
            'product_id'=>$request->product_id,
            'author' => $request->author,
            'review' => $request->review,
            'author_email' => $request->author_email,
            'star'=>$request->star,
            'author_id'=>$request->author_id

        ]);
        $reviewed = $reviews->save();
        if ($reviewed) {
            return redirect()->route('product-detail', $product->slug)->with('success', 'Review Uploaded successfully');
        }
    }

    public function addtocart(Request $request)
    {
//        dd($request->product_id);
        $orderedQty = $request->quantity;
//        dd($request->stock);
        if ($orderedQty > $request->stock) {
            return redirect()->back()->with('Error', 'Please Check your Quantity .It is more then The products available in our stock.');
        } else {
            $product = Products::find($request->product_id);
            $product->stock = $product->stock - $request->quantity;
            $product->update();
            $session_id = session('session_id');

            if (empty($session_id)) {
                $session_id = str_random(40);
                Session::put('session_id', $session_id);
            }
            $data = Cart::create([
                'product_id' => $request->product_id,
                'product_name' => $request->product_name,
                'product_volume' => $request->product_volume,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'user_email' => Auth::user() ? Auth::user()->email : '',
                'session_id' => $session_id,
                'stock' => $request->stock ? $request->stock : 1
            ]);
            if ($data) {
                return redirect()->route('cart')->with('success', 'Product added to your Cart');
            }
        }


    }

    public function cart()
    {
        $category = Category::all();
        $session_id = session('session_id');
        $products = Cart::where('session_id', '=', $session_id)->get();

        foreach ($products as $key => $productImage) {
            $product = Products::where('id', '=', $productImage->product_id)->first();
            $products[$key]->image = $product->image;
            $products[$key]->slug = $product->slug;
        }

        return view('FrontEnd/cart', compact('category', 'products'));
    }

    public function deletecart($slug = null)
    {

        $prod_id = Products::where('slug', '=', $slug)->first();
        $product = Cart::where('product_id', '=', $prod_id->id)->first();

        $prod_id->stock = $product->quantity + $prod_id->stock;
        $prod_id->update();

        $deleted = $product->delete();
        if ($deleted) {
            return redirect()->back()->with('success', 'Product removed from your cart Successfully');
        }
    }

    public function viewall(Request $request)
    {
        $category = Category::all();
        $products = Products::inRandomOrder()->paginate(5);
        return view('FrontEnd\products\all_products', compact('category', 'products'));
    }

    public function viewalloffers(Request $request)
    {
        $category = Category::all();
        $products = Products::where('offer', '=', 1)->paginate(5);
        return view('FrontEnd\products\all_offer_products', compact('category', 'products'));
    }

    public function viewallfeatured(Request $request)
    {
        $category = Category::all();
        $products = Products::where('featured', '=', 1)->paginate(5);
        return view('FrontEnd\products\all_featured_products', compact('category', 'products'));
    }

    public function viewblogs(Request $request)
    {
        $category = Category::all();
        $blogs = Blog::orderBy('id', 'desc')->paginate(10);
        return view('FrontEnd\blogs\viewblogs', compact('category', 'blogs'));
    }

    public function viewsingleblog(Request $request , $slug = null)
    {
        if($request->isMethod('post')){
            $request->validate([
                'comment'=>'required'
            ]);
            $blog_review = blogReview::create([
                'user_id'=>$request->user_id,
                'email'=>$request->email,
                'blog_id'=>$request->blog_id,
                'comment'=>$request->comment,
                'star'=>$request->star
            ]);
            $comment = $blog_review->save();
            if($comment){
                return redirect()->back()->with('success','Thank you for your review on our blog.');
            }
        }

        if($request->isMethod('get')){
            $category = Category::all();
            $blogs = Blog::where('slug', '=', $slug)->first();
            $average = blogReview::where('blog_id','=',$blogs->id)->get();

            $comments = $blogs->review()->orderBy('status', 'desc')->paginate(3);

            return view('FrontEnd\blogs\blogdetail', compact('category', 'blogs','comments','average'));
        }


    }
}
