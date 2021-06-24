<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // ALL PRODUCTS
    public function index(Product $product)
    {
        return view('products.index', [
            'products' => Product::all(),
        ]);
    }

    // PRODUCT/{ID}
    public function show(Product $product)
    {
        return view('products.show', [
            'product'  => $product,
            'category' => $product->category()->get(),
        ]);
    }

    public function addToCart(Request $request, Product $product)
    {

        try {
            $validated = $request->validate([
                'product' => 'required'
            ]);
            //$request->session()->forget('cart');

            $request->session()->push('cart', [$product->id => 1]);

            return response()->json([
                'succes' => true
            ]);
        } catch (Exception $e) {

            return response()->json([
                'succes' => false,
                'request' => $request->item,
                'message' => $e->getMessage()
            ]);
        }
    }
}
