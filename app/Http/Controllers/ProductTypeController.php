<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index()
    {

        return view('producttype.index', [
            'product_type' => ProductType::all(),
            'category'  =>  Category::all()
        ]);
    }

    public function show(ProductType $producttype)
    {

        return view('producttype.show', [
            'product_type'  => ProductType::all(),
            'products'   => $producttype->products()->get(),
            'category' => Category::all(),
        ]);
    }
}
