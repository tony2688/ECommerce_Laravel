<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
    ];

    /* ===================== RELACIONES ===================== */

    // Una entrada de wishlist pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Una entrada de wishlist pertenece a un producto
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
