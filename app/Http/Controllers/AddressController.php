<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Products;
use App\Models\shipping;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{

    public function useraccount(Request $request)
    {
        $category = Category::all();
        $wishlists = wishlist::where('user_id', '=', Auth::user()->id)->paginate(2);
        $requested = $request->ajax();

        if ($request->ajax()) {
            return view('FrontEnd\User\accountpage', compact('category', 'wishlists', 'requested'));
        }
        return view('FrontEnd\User\ajaxpagination', compact('category', 'wishlists', 'requested'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'address1' => 'required',
            'state' => 'required',
            'mobile' => 'required | max:10'
        ]);
        $address = shipping::create([
            'user_id' => $request->user_id,
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'mobile' => $request->mobile,
            'landline' => $request->landline,
            'Country' => $request->Country,
            'state' => $request->state,
            'City' => $request->City,
            'address1' => $request->address1,
            'address2' => $request->address2,
        ]);
        $saved = $address->save();
        if ($saved) {
            return redirect()->back()->with('success', 'Your Shipping Address is successfuly Stored');
        }
    }

    public function checkout(Request $request)
    {
        $category = Category::all();
        $user = shipping::where('user_id', '=', Auth::user()->id)->first();
        $session_id = session('session_id');
        $products = Cart::where('session_id', '=', $session_id)->get();

        foreach ($products as $key => $productImage) {
            $product = Products::where('id', '=', $productImage->product_id)->first();
            $products[$key]->image = $product->image;
            $products[$key]->slug = $product->slug;
        }

        $subtotal = 0;
        $product_price = 0;
        $tax = 0;
        $shipping_cost = 0;
        $total = 0;


        if ($request->isMethod('get')) {
            if ($user != null) {
                return view('FrontEnd\checkout', compact('category', 'wishlists', 'requested', 'user','products'));
            }
            if ($user == null) {
                return redirect('account')->with('success', 'Please fill up the shipping form to place your order.');
            }

        }
        if ($request->isMethod('post')) {
            $request->validate([
                'address1' => 'required',
                'state' => 'required',
                'mobile' => 'required | max:10'
            ]);
            $user->user_name = $request->user_name;
            $user->user_email = $request->user_email;
            $user->mobile = $request->mobile;
            $user->landline = $request->landline;
            $user->Country = $request->Country;
            $user->state = $request->state;
            $user->City = $request->City;
            $user->address1 = $request->address1;
            $user->address2 = $request->address2;

            $saved = $user->update();
            if ($saved) {
                foreach ($products as $product) {
                    $subtotal += $product->price * $product->quantity;

                    $tax = 0.07 * $subtotal;
                    if ($subtotal < 2000) {
                        $shipping_cost = 100;
                    } elseif ($subtotal > 2000 && $subtotal < 6000) {
                        $shipping_cost = 70;
                    } elseif ($subtotal > 6000 && $subtotal < 15000) {
                        $shipping_cost = 50;
                    } elseif ($subtotal > 15000) {
                        $shipping_cost = null;
                    }
                    $total += $subtotal + $tax + $shipping_cost;
                }
                $orders = Order::create([
                    'product_id' => $product->id,
                    'user_id' => $user->user_id,
                    'qty' => $product->quantity,
                    'price' => $product->price,
                    'order_status' => 1,
                    'total_price' => $total
                ]);
                $saveed = $orders->save();
                if ($saveed) {
                    return redirect()->back()->with('success', 'Order Placed Successfully');
                }

            }
        }

    }
}
