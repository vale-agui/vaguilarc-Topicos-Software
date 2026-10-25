<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductApiController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::all();

        return response()->json($products, 200);
    }

    public function show(string $id): JsonResponse
    {
        $product = Product::findOrFail($id);

        return response()->json($product, 200);
    }

    public function store(
        \Illuminate\Http\Request $request
    ): JsonResponse {
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);
    
        $product = new Product();
        $product->name = $validated['name'];
        $product->price = $validated['price'];
        $product->save();
    
        return response()->json([
            'message' => 'Producto creado correctamente',
            'product' => $product
        ], 201);
    }
}