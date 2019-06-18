<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class BackEndCartController extends Controller
{
    public function index(Request $request){
        $products = Cart::orderBy('id','desc')->paginate(10);
        return view('Backend/Cart',compact('products'));
    }

    public function destroy($id){
       $delete = Cart::find($id);
       $deleted = $delete->delete();

       if($deleted){
           return redirect()->route('BackendCart')->with('delete','Item Removed From the Cart Successfully');
       }
//
    }
}
