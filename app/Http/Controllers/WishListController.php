<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $wishlist = wishlist::where('user_id', '=', Auth::user()->id)->paginate(5);
        return view('FrontEnd/wishlist', compact('category', 'wishlist'));
    }

    public function add_to_wishist(Request $request, $slug = null)
    {
        $product = Products::where('slug', '=', $slug)->first();
        $product_id = $product->id;

        $user_id = Auth::user()->id;
        $wishlist = wishlist::create([
            'user_id' => $user_id,
            'product_id' => $product_id
        ]);
        $saved = $wishlist->save();
        if ($saved) {
            return redirect()->back()->with('success', 'Product added to your wishlists successfully');
        }

    }

    public function delete($id)
    {
//        $product = Products::find($id);
        $user = wishlist::where('user_id', '=', Auth::user()->id)->where('product_id','=',$id)->get();
        foreach($user as $delete){

            $deleted = $delete->delete();
            if($deleted){
                return redirect()->back()->with('success','Product successfully removed from your wishlist');
            }
        }
    }
}
