<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        // Buscar producto por slug con sus relaciones
        $product = Product::where('slug', $slug)
            ->with(['category', 'brand', 'reviews.user'])
            ->firstOrFail();

        // Obtener productos relacionados de la misma categoría
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', 'active')
            ->with(['category', 'brand'])
            ->limit(8)
            ->get();

        // Obtener productos más vendidos (top 12)
        $topSellingProducts = Product::where('status', 'active')
            ->withCount('orderItems')
            ->orderBy('order_items_count', 'desc')
            ->with(['category', 'brand'])
            ->limit(12)
            ->get();

        // Verificar si el usuario autenticado ha comprado este producto
        $canReview = false;
        $hasReviewed = false;

        if (auth()->check()) {
            $userId = auth()->id();

            // Verificar si ha comprado el producto
            $canReview = \App\Models\Order::where('user_id', $userId)
                ->whereHas('items', function ($query) use ($product) {
                    $query->where('product_id', $product->id);
                })
                ->where('status', 'completed')
                ->exists();

            // Verificar si ya dejó una reseña
            $hasReviewed = $product->reviews()
                ->where('user_id', $userId)
                ->exists();
        }

        return view('products.details', compact('product', 'relatedProducts', 'topSellingProducts', 'canReview', 'hasReviewed'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
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
