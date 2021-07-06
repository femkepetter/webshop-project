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
            'product_type' => $product->productType()->get()
        ]);
    }
}
