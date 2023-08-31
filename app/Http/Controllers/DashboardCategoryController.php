<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// model 
use App\Models\Category;
use App\Models\Product;

class DashboardCategoryController extends Controller
{
    //
     public function index () {

        $category = Category::all();
        $product = Product::with('galleries')->paginate(32);
       
        return view('pages.categories',compact('category', 'product'));
    }

    public function detail(Request $request,$slug) {
        $category = Category::all();
        $categories = Category::where('slug',$slug)->firstOrfail();

        $product = Product::with('galleries')->where('categories_id',$categories->id)->paginate(32);
        
        return view('pages.categories',compact('category', 'product'));
    }
}
