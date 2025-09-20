<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductIndexResource;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductIndexResource::collection(Product::with('images')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* this is just a way to attach images for testing before adding a form */

        /*  $product = Product::find(2);

        $product->images()->create([
            'path' => '/uploads/product22.jpg'
        ]); */
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return  new ProductResource($product->load('images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
