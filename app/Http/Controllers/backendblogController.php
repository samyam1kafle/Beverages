<?php

namespace App\Http\Controllers;

use App\Models\blogReview;
use Illuminate\Http\Request;

class backendblogController extends Controller
{
    public function index(){
        $reviews = blogReview::all();
        return view('Backend/blogs/review',compact('reviews'));
    }
    public function delete($id){
       $delete = blogReview::findOrFail($id);
       $deleted = $delete->delete();
       if($deleted){
           return redirect()->back()->with('success','Review Deleted Successfully');
       }

    }

}
