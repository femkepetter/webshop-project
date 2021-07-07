<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Review;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // ALL PRODUCTS
    public function index(Product $product)
    {
        return view('products.index', [
            'products' => Product::all(),
            'product_type'  => ProductType::all(),
        ]);
    }

    // PRODUCT/{ID}
    public function show(Product $product, Review $review)
    {

        return view('products.show', [
            'product'  => $product,
            'category' => Category::all(),
            'product_type' => $product->productType()->get(),
            'product_type'  => ProductType::all(),
            'review'   => Review::all()
        ]);
    }
}
