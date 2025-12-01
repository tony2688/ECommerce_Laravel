<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // La tabla no tiene created_at/updated_at
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'comment',
    ];

    /* ===================== RELACIONES ===================== */

    // Una reseña pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Una reseña pertenece a un producto
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
