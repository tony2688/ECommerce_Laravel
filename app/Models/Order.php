<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'status',
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
    ];

    /* ===================== RELACIONES ===================== */

    // Una orden pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Una orden tiene muchos ítems
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Una orden tiene muchos pagos
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
