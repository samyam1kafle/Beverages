<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class searchController extends Controller
{
    public function index(){

        return view('Backend/search');
    }
}
