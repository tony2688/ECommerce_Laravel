<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Display the home page with products
     */
    public function index()
    {
        // Obtener productos activos con sus relaciones
        $products = \App\Models\Product::with(['category', 'brand'])
            ->where('status', 'active')
            ->latest()
            ->paginate(12);

        return view('welcome', compact('products'));
    }
}
