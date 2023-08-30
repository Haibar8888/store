<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// model 
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    //

    public function index(){

        $category = Category::take(6)->get();

        $product = Product::with('galleries')->take(8)->get();
        
        return view('pages.home',compact('category', 'product'));
    }
}
