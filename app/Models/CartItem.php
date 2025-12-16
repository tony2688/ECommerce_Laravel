<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    /* ===================== RELACIONES ===================== */

    // Un item del carrito pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un item del carrito pertenece a un producto
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
