<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
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
        // Validar datos
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10|max:1000',
        ]);

        // Verificar autenticación
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Debes iniciar sesión para dejar una reseña'
            ], 401);
        }

        $userId = auth()->id();
        $productId = $validated['product_id'];

        // Verificar si el usuario ha comprado el producto
        $hasPurchased = \App\Models\Order::where('user_id', $userId)
            ->whereHas('items', function ($query) use ($productId) {
                $query->where('product_id', $productId);
            })
            ->where('status', 'completed') // Solo órdenes completadas
            ->exists();

        if (!$hasPurchased) {
            return response()->json([
                'success' => false,
                'message' => 'Solo puedes reseñar productos que hayas comprado'
            ], 403);
        }

        // Verificar si ya dejó una reseña para este producto
        $existingReview = Review::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($existingReview) {
            return response()->json([
                'success' => false,
                'message' => 'Ya has dejado una reseña para este producto'
            ], 400);
        }

        // Crear la reseña
        $review = Review::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
        ]);

        // Cargar el usuario para devolver en la respuesta
        $review->load('user');

        return response()->json([
            'success' => true,
            'message' => '¡Gracias por tu reseña!',
            'review' => [
                'id' => $review->id,
                'rating' => $review->rating,
                'comment' => $review->comment,
                'user_name' => $review->user->name,
            ]
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
