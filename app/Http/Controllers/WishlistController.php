<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display the user's wishlist
     */
    public function index()
    {
        if (Auth::check()) {
            $wishlistItems = Wishlist::with('product.brand', 'product.category')
                ->where('user_id', Auth::id())
                ->latest()
                ->get();

            return view('wishlist.index', compact('wishlistItems'));
        }

        // Invitados: redirigir al login
        return redirect()->route('login')->with('message', 'Inicia sesión para ver tu lista de deseos');
    }

    /**
     * Toggle product in wishlist (add/remove)
     */
    public function toggle(Request $request, Product $product)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Debes iniciar sesión',
                'guest' => true
            ], 401);
        }

        $wishlistItem = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($wishlistItem) {
            // Remover de wishlist
            $wishlistItem->delete();

            return response()->json([
                'success' => true,
                'action' => 'removed',
                'message' => 'Producto eliminado de tu lista de deseos'
            ]);
        } else {
            // Agregar a wishlist
            Wishlist::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id
            ]);

            return response()->json([
                'success' => true,
                'action' => 'added',
                'message' => 'Producto agregado a tu lista de deseos'
            ]);
        }
    }

    /**
     * Remove product from wishlist
     */
    public function destroy(Product $product)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'No autenticado'
            ], 401);
        }

        Wishlist::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->delete();

        return response()->json([
            'success' => true,
            'message' => 'Producto eliminado de tu lista de deseos'
        ]);
    }

    /**
     * Sync guest wishlist from localStorage to database on login
     */
    public function sync(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Usuario no autenticado'
            ], 401);
        }

        $request->validate([
            'wishlist' => 'required|array',
            'wishlist.*' => 'required|exists:products,id'
        ]);

        $syncedCount = 0;

        foreach ($request->wishlist as $productId) {
            $product = Product::find($productId);

            if (!$product || $product->status !== 'active') {
                continue;
            }

            // Verificar si ya existe
            $exists = Wishlist::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->exists();

            if (!$exists) {
                Wishlist::create([
                    'user_id' => Auth::id(),
                    'product_id' => $productId
                ]);
                $syncedCount++;
            }
        }

        return response()->json([
            'success' => true,
            'message' => $syncedCount . ' productos sincronizados en tu lista de deseos'
        ]);
    }

    /**
     * Get wishlist product IDs (for checking in frontend)
     */
    public function getWishlistIds()
    {
        if (Auth::check()) {
            $ids = Wishlist::where('user_id', Auth::id())
                ->pluck('product_id')
                ->toArray();

            return response()->json([
                'wishlist' => $ids
            ]);
        }

        return response()->json([
            'wishlist' => []
        ]);
    }
}
