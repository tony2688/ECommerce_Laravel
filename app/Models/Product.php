<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'image',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    /* ===================== RELACIONES ===================== */

    // Un producto pertenece a una categoría
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Un producto pertenece a una marca
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Un producto aparece en muchos ítems de pedido
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Un producto tiene muchas reseñas
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Un producto está en muchas wishlists
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}
