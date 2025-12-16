<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /* ===================== RELACIONES ===================== */

    // Un usuario tiene muchos pedidos
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Un usuario tiene muchos ítems en la wishlist
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    // Un usuario tiene muchas reseñas
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Un usuario tiene muchas direcciones de envío
    public function shippingAddresses()
    {
        return $this->hasMany(ShippingAddress::class);
    }

    /* ===================== MÉTODOS AUXILIARES ===================== */

    /**
     * Verificar si el usuario ha comprado un producto específico
     * 
     * @param int $productId
     * @return bool
     */
    public function hasPurchasedProduct($productId)
    {
        return $this->orders()
            ->where('status', 'completed')
            ->whereHas('items', function ($query) use ($productId) {
                $query->where('product_id', $productId);
            })
            ->exists();
    }

    /**
     * Send the password reset notification.
     */
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new \App\Notifications\ResetPasswordNotification($token));
    }
}
