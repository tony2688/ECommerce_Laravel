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
        Schema::create('order_items', function (Blueprint $table) {
            // id bigint (PK)
            $table->id();

            // order_id bigint (FK) Relación con orders
            $table->foreignId('order_id')
                  ->constrained('orders')
                  ->cascadeOnDelete();

            // product_id bigint (FK) Relación con products
            $table->foreignId('product_id')
                  ->constrained('products')
                  ->cascadeOnDelete();

            // quantity int Cantidad comprada
            $table->integer('quantity');

            // price decimal(10,2) Precio unitario
            $table->decimal('price', 10, 2);

            // subtotal decimal(10,2) Cantidad * Precio
            $table->decimal('subtotal', 10, 2);

            // created_at / updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
