<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'subtotal',
    ];

    protected $casts = [
        'price'    => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    /* ===================== RELACIONES ===================== */

    // Un ítem pertenece a una orden
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Un ítem pertenece a un producto
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
