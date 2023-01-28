<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('public.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->formValidation($request);

        $data = $request->all();
        $newProduct = new Product();
        $newProduct->fill($data);
        $newProduct->save();

        $productStored = Product::orderBy('id', 'desc')->first();

        return redirect()->route('public.product.show', $productStored);
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return redirect()->route('public.product.show', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->formValidation($request);

        $data = $request->all();
        $product->update($data);

        return redirect()->route('public.product.show', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('public.product.index');
    }

    // FORM VALIDATION
    private function formValidation(Request $request) {
        $request->validate([
            'name' => 'required|max:127',
            'description' => 'required|max:1024',
            'price' => 'required|numeric|between:0,9999.99',
            'img_url' => 'required|max:2048'
        ]);
    }
}
