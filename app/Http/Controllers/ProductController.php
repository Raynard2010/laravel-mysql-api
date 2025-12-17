<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // GET all products
    public function index()
    {
        return response()->json(Product::all());
    }

    // POST add product
    public function add(Request $request){
        $product = Product::create($request->all());

        return response()->json([
            'message' => 'Product added',
            'data'    => $product
        ], 201);
    }

    // PUT update product
    public function update(Request $request, $id){
        $product = Product::findOrFail($id);

        $product->update($request->all());

        return response()->json([
            'message' => 'Product updated',
        ]);
    }

    // DELETE product
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'message' => 'Product deleted'
        ]);
    }
}
