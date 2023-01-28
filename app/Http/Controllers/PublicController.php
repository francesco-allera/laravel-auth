<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }
}
