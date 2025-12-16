<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::find($request->product_id);

        if (!$product) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        // Calculate price (using price_2 logic if exists)
        $price = $product->price_2 ?? $product->price;

        return response()->json([
            'message' => 'Producto agregado con éxito',
            'product' => [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $price,
                'image' => $product->image,
                'slug' => $product->slug,
                'quantity' => (int) $request->quantity
            ],
            'cart_count' => 0 // For now, let JS handle count via storage
        ]);
    }

    public function update(Request $request, $id)
    {
        // Placeholder for update
        return response()->json(['message' => 'Cart updated']);
    }

    public function remove($id)
    {
        // Placeholder for remove
        return response()->json(['message' => 'Product removed']);
    }

    public function getCartCount()
    {
        return response()->json(['count' => 0]);
    }
}
