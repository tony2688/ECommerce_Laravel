<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wishlists', function (Blueprint $table) {
            // id bigint (PK)
            $table->id();

            // user_id bigint (FK) – usuario dueño de la wishlist
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            // product_id bigint (FK) – producto agregado a la wishlist
            $table->foreignId('product_id')
                  ->constrained('products')
                  ->cascadeOnDelete();

            // created_at / updated_at
            $table->timestamps();

            // (Opcional pero recomendable) evitar duplicados: un mismo producto 1 sola vez por user
            $table->unique(['user_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};
