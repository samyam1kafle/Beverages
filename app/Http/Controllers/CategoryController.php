<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\Category_validate;
use App\Models\Products;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->paginate(10);
        return view('Backend/ProductCategories/index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('Backend/ProductCategories/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Category_validate $request)
    {

        $created_successfuy = new Category([
            'title' => $request->title,
            'description' => $request->description,
            'parent_id' => $request->parent_id,

        ]);

        $created_successfully = $created_successfuy->save();
        if ($created_successfully) {
            return redirect()->route('categories.index')->with('success', 'Category Created Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();
        return view('Backend/ProductCategories/edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $requests
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Category_validate $request, $id)
    {
        $update = Category::findOrFail($id);
        $updated = $update->update([
            'title' => $request->title,
            'description' => $request->description ? $request->description : '',
            'parent_id' => $request->parent_id,

        ]);
        if ($updated) {
            return redirect()->route('categories.index')->with('success', 'Category Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $delete = Category::findOrFail($id);
//
//        $sub = Category::where('parent_id', '=', $delete->id)->first();
//
//        $sub_sub = Category::where('parent_id', '=', $sub->id)->first();
//
//        if (Products::where('category_id', '=', $delete->id)->first()) {
//            return redirect()->back()->with('Error', 'Cannot delete the specific Category since it have got products under it .');
//        }elseif (Products::where('category_id', '=', $sub->id)->first()) {
//            return redirect()->back()->with('Error', 'Cannot delete the specific Category since it have got products under it .');
//        }elseif (Products::where('category_id', '=', $sub->id)->first()) {
//            return redirect()->back()->with('Error', 'Cannot delete the specific Category since it have got products under it .');
//        }
//        else {
//            $deleated = $delete->delete();
//            if ($deleated) {
//                return redirect()->route('categories.index')->with('delete', 'Category Deleated Successfully');
//            }
//        }

//        $parent = Category::findOrfail($id);
//
//        $child = Category::where('parent_id', '=', $parent->id)->first();
//
//        $sub_child = Category::where('parent_id', '=', $child->id)->first();
//
//        $parent_products = Products::where('category_id','=',$parent->id);
//
//        $child_product = Products::where('category_id','=',$child->id);
//
//        $sub_product = Products::where('category_id','=',$sub_child->id);
//
//        dd($parent_products);
        $parent = Category::findOrfail($id);
        $products = Products::all();

        foreach ($products as $product) {
            if ($product->category_id) {
                if($product->category_id == $parent->parent_id){
                    $child = Category::where('parent_id', '=', $parent->id)->first();
                    $sub_child = Category::where('parent_id', '=', $child->id)->first();
                    if ($product->category_id == $child->id) {
                        if ($sub_child->id) {
                            return redirect()->back()->with('Error', 'Cannot delete the specific Category since it have got products under it .');
                        } else {
                            return redirect()->back()->with('Error', 'Cannot delete the specific Category since it have got products under it .');
                        }
                    } else {
                        return redirect()->back()->with('Error', 'Cannot delete the specific Category since it have got products under it .');
                    }
                }else{
                    return redirect()->back()->with('Error', 'Cannot delete the specific Category since it have got products under it .');

                }

            } else {
                $deleated = $parent->delete();
                if ($deleated) {
                    return redirect()->route('categories.index')->with('delete', 'Category Deleated Successfully');
                }
            }


        }
        dd($parent);


    }
}
