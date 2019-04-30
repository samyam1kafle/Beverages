<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Middleware\Role;
use App\Products;
use App\Roles;
use App\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        $products = Products::all()->count();
        $categories = Category::all()->count();
        $users = User::all()->count();
        $roles =  Roles::all()->count();

        return view('Backend/index',compact('products','categories','users','roles'));

    }
}
