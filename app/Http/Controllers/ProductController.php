<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\productUpdateRequest;
use App\Http\Requests\ProductValidate;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;

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

        $resized = Image::make($featured);
         $resized->resize('400','400')->save('uploads/Products/thumbnail/'.$featured_name);

//        $featured->move('uploads/Products', $featured_name);

        $product = Products::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'image'=>$featured_name,
            'description'=>$request->description,
            'slug' =>str_slug($request->name),
            'category_id'=>$request->category_id,
            'offer'=>$request->offer ? 1 : 0 ,
            'offer_price'=>$request->offer_price ? $request->offer_price : 0 ,
            'featured'=>$request->featured
        ]);
        if($product){
            Session::flash('success','Product Added Successfully');
            return redirect()->route('products.index');
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
        $update = Products::findOrFail($id);
        if($request->hasFile('image')){
            if($update->image != NULL){
                unlink(public_path().'/uploads/Products/thumbnail/' . $update->image);
            }
            $product = $request->file('image');
            $image_name = time() . $product->getClientOriginalName();
            $resize = Image::make($product);
            $resize->resize('400','400')->save('uploads/Products/thumbnail/'.$image_name);
//            $product->move('uploads/Products',$image_name);
            $update->image = $image_name;
        }
        $update->name = $request->name;
            $update->price = $request->price;
                $update->description = $request->description;
                $update->category_id = $request->category_id;
                $update->offer = $request->offer ? $request->offer : 0;
                $update->offer_price = $request->offer_price ? $request->offer_price : 0 ;
                $update->featured = $request->featured;
               $updated = $update->save();
               if($updated){
                   Session::flash('success','Product Updated Successfully');
                   return redirect()->route('products.index');
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
        if ($delete->image != null){
            unlink(public_path().'/uploads/Products/thumbnail/' . $delete->image);
        }
        $deleted = $delete->delete();
        if($deleted){
            Session::flash('delete','Product Deleted Successfully');
            return redirect()->route('products.index');
        }
    }
}
