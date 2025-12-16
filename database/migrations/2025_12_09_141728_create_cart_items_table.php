<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            // id bigint (PK)
            $table->id();

            // user_id bigint (FK) – usuario dueño del carrito
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // product_id bigint (FK) – producto en el carrito
            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnDelete();

            // quantity int – cantidad del producto
            $table->integer('quantity')->default(1);

            // created_at / updated_at
            $table->timestamps();

            // Evitar duplicados: un mismo producto 1 sola vez por usuario
            $table->unique(['user_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
