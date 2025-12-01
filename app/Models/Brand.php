<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    /* ===================== RELACIONES ===================== */

    // Una marca tiene muchos productos
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
