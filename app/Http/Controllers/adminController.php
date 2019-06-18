<?php

namespace App\Http\Controllers;

use App\Http\Requests\userUpdateValidation;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Products;
use App\Models\Review;
use App\Models\Roles;
use App\Models\AllUser;
use App\Models\subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;


class adminController extends Controller
{
    public function index()
    {
        $products = Products::all()->count();
        $categories = Category::all()->count();
        $users = AllUser::all()->count();
        $roles = Roles::all()->count();
        $orders = Cart::all()->count();
        $subscribers = subscribers::all()->count();
        return view('Backend/index', compact('products', 'categories', 'users', 'roles', 'orders'
            , 'subscribers'
        ));

    }

    public function profile(Request $request)
    {

        $user = Auth::user();
        $reviews = Review::orderBy('id', 'desc')->paginate(10);

        return view('Backend/Users/profile', compact('user', 'reviews'));


    }

    public function updateprofile(Request $request, $id)
    {
        $user = AllUser::findOrFail($id);
        if ($request->te_rm == 1) {
            $request->validate([
                'name' => 'required | min:6 ',
                'password' => 'confirmed',
                'email' => 'required',
            ]);
            if ($request->hasFile('image')) {
                if ($user->image != null) {
                    unlink(public_path() . '/uploads/Users/' . $user->image);
                }
                $featured = $request->file('image');
                $name = time() . $featured->getClientOriginalName();
                $resize = Image::make($featured);
                $resize->resize('600', '600')->save('uploads/Users/' . $name);
                $user->image = $name;
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

            $updated = $user->save();
            if ($updated) {
                return redirect()->route('adminProfile')->with('success', 'Profile Updated Successfully');
            }


        } else {
            return redirect()->route('adminProfile')->with('Error', 'Please Read and accept our terms and conditions to Continue');
        }

    }


    public function showsubscribers(Request $request)
    {
        $subscribers = subscribers::orderBy('id', 'desc')->paginate(10);

        return view('Backend/subscribers', compact('subscribers'));
    }
}
