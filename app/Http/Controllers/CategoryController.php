<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProductType;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index', [
            'category' => Category::all(),
            'product_type'  => ProductType::all(),
        ]);
    }

    public function show(Category $category, ProductType $producttype)
    {
        return view('category.show', [
            'category' => Category::all(),
            'products'   => $category->products()->get(),
            'product_type'  => ProductType::all(),

        ]);
    }
}
