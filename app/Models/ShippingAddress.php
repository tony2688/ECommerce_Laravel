<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
    ];

    /* ===================== RELACIONES ===================== */

    // Una dirección de envío pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
