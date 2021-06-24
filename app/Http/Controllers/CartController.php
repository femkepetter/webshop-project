<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function show(Request $request, Product $product)
    {
        $cart = session('cart');
        $cartArray = [];

        $product = Product::findOrFail($cart['product_id']);

        if ($cart != null) {
            session()->put('cart', $cartArray);
        } else {
            session()->push('cart', $cartArray);
        }

        dd($cart);

        // return view('cart.show', [
        //     'cart' => $cart,
        // ]);
    }

    public function store(Request $request, Product $product)
    {
        Session::put('cart', $request->all());
    }

    public function edit(Cart $cart)
    {
        //
    }

    public function update(Request $request, Cart $cart)
    {
        //
    }

    public function destroy(Cart $cart)
    {
        //
    }
}
