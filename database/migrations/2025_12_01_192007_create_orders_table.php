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
        Schema::create('orders', function (Blueprint $table) {
            // id bigint (PK)
            $table->id();

            // user_id bigint (FK) Cliente que realizó la compra
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            // total_price decimal(10,2) Monto total del pedido
            $table->decimal('total_price', 10, 2);

            // status enum('pending', 'paid', 'shipped', 'cancelled')
            $table->enum('status', ['pending', 'paid', 'shipped', 'cancelled'])
                  ->default('pending');

            // created_at / updated_at timestamp
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
