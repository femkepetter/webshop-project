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

    public function show(Category $category, ProductType $productType)
    {
        return view('category.show', [
            'category'  => $category,
            'products'   => $category->products()->get(),
            'product_type'  => $productType,
            
        ]);
    }

}
