<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index()
    {
        return view('product_type.index', [
            'product_type' => ProductType::all()
        ]);
    }

    public function show(ProductType $productType)
    {
        return view('product_type.show', [
            'product_type'  => $productType,
            'products'   => $productType->products()->get(),
        ]);
    }
}
