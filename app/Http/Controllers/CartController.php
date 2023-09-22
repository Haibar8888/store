<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// model
use App\Models\Cart;

class CartController extends Controller
{
    //
    public function index () {
        $carts = Cart::with(['product.galleries','user'])
                     ->where('users_id',Auth::user()->id)
                     ->get();
        
        return view('pages.cart',compact('carts'));
    }

    public function delete ($id)
    {
        $cart = Cart::findOrFail($id);

        $cart->delete();

        return redirect()->route('cart');
    }

    public function success () {
        return view('pages.success');
    }
}
