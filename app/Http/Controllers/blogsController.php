<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Session;
use App\Products;
use Illuminate\Http\Request;

class blogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function offers()
    {
        $blogs = Products::all()->where('offer','=','1');
        return view('Backend/blogs',compact('blogs'));
    }

    public function index()
    {
        $blogs = Blog::orderBy('id','desc')->paginate(8);
        return view('Backend/Products/Offers/index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_category = Category::all();
        return view('Backend/Products/Offers/create',compact('product_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $featured = $request->file('image');
        $name = time() .$featured->getClientOriginalName();
        $featured->move('uploads/Products/Special_Offers',$name);

        $create = Blog::create([
            'title'=>$request->title,
            'offer_product_name'=>$request->offer_product_name,
            'real_price'=>$request->real_price,
            'offered_price'=>$request->offered_price,
            'slug'=>str_slug($request->offer_product_name),
            'image'=>$name,
            'description'=>$request->description,
            'category_id'=>$request->category_id
        ]);
        if ($create){
            return redirect()->route('blogs.index')->with('success','Offer '. $request->title .' created Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = Blog::findOrFail($id);
        $product_category = Category::all();

        return view('Backend/Products/Offers/edit',compact('offer','product_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $update = Blog::findOrFail($id);
       if ($request->hasFile('image')){
           if ($update->image != Null){
               unlink(public_path().'/uploads/Products/Special_Offers/' . $update->image);
           }
           $featured = $request->file('image');
           $name = time() . $featured->getClientOriginalName();
           $featured->move('uploads/Products/Special_Offers' , $name);
           $update->image = $name;
       }
       $update->title = $request->title;
       $update->offer_product_name = $request->offer_product_name;
       $update->real_price = $request->real_price;
       $update->offered_price = $request->offered_price;
       $update->slug = str_slug($request->offer_product_name);
       $update->description = $request->description;
       $update->category_id = $request->category_id;
       $updated = $update->save();

       if ($updated){
           return redirect()->route('blogs.index')->with('success','Offer Updated Successfully');
       }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete =Blog::findOrFail($id);
        if ($delete->image != Null){
            unlink(public_path().'/uploads/Products/Special_Offers/' . $delete->image);
        }
        $deleted = $delete->delete();
        if ($deleted){
            return redirect()->route('blogs.index')->with('delete','Offer Deleted Successfully');

        }
    }
}
