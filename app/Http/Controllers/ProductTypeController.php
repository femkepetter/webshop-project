<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index()
    {
        return view('producttype.index', [
            'product_type' => ProductType::all()
        ]);
    }

    public function show(ProductType $productType)
    {
        return view('producttype.show', [
            'product_type'  => $productType,
            'products'   => $productType->productsForType()->get(),
        ]);
    }
}
