<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\productUpdateRequest;
use App\Http\Requests\ProductValidate;
use App\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::orderBy('id','desc')->paginate(5);
        return view('Backend/Products/index',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_category = Category::all();
        return view('Backend/Products/create',compact('product_category'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductValidate $request)
    {
        $featured = $request->file('image');
        $featured_name = time() . $featured->getClientOriginalName();

        $featured->move('uploads/Products', $featured_name);

        $product = Products::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'image'=>$featured_name,
            'description'=>$request->description,
            'slug' =>str_slug($request->name),
            'category_id'=>$request->category_id,
        ]);
        if($product){
            return redirect()->route('products.index')->with('message',"Created Successfuy");
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
        $product = Products::findOrFail($id);
        $product_category = Category::all();
        return view('Backend/Products/edit',compact('product','product_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(productUpdateRequest $request, $id)
    {
        $update = Products::FindOrFail($id);
        if($request->hasFile('image')){
            if($update->image != NULL){
                unlink(public_path().'/uploads/Products' . $update->image);
            }
            $product = $request->file('image');
            $image_name = time() . $product->getClientOriginalName();
            $product->move('uploads/Products',$image_name);
            $update->image = $image_name;
        }
        $update->name = $request->name;
            $update->price = $request->price;
                $update->description = $request->description;
                $update->category_id = $request->category_id;

               $updated = $update->save();
               if($updated){
                   return redirect()->route('products.index')->with('message','Product updated Successfuly');
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
        $delete = Products::findOrFail($id);
        $deleted = $delete->delete();
        if($deleted){
            return redirect()->route('products.index')->with('message','Product Successfully Deleted. ');
        }
    }
}
