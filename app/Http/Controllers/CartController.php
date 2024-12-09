<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Product $product, Cart $cart){
        $cart->add($product);
        // dd(session('cart'));
        return redirect()->route('cart.view');
    }

    public function view(Cart $cart){
        return view('client.cart',compact('cart'));
    }
}
