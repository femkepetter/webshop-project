<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function show(Request $request)
    {
        $cart = session('cart');
        dd($cart);

        return view('cart.show', [
            'cart' => $cart
        ]);
    }

    public function store(Request $request)
    {
        Session::put('cart', $request->all());
        //$product = Product::findOrFail($request->product_id);
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
