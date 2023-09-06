<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// models
use App\models\Product;
use App\Models\Cart;
class DetailController extends Controller
{
    //
    public function index (Request $request,$slug) {
        $product = Product::with(['galleries','user'])->where('slug',$slug)->firstOrFail();
     
        return view('pages.detail',compact('product'));
    }

    public function add (Request $request,$id) 
    {
        $data = [
            'products_id' => $id,
            'users_id' => Auth::user()->id,
        ];

        Cart::create($data);

        return redirect()->route('cart');
    }
}
