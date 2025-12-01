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
        Schema::create('reviews', function (Blueprint $table) {
            // id bigint (PK) Identificador único
            $table->id();

            // user_id bigint (FK) Cliente que dejó la reseña
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            // product_id bigint (FK) Producto reseñado
            $table->foreignId('product_id')
                  ->constrained('products')
                  ->cascadeOnDelete();

            // rating int (1-5) Puntuación
            $table->integer('rating');

            // comment text Comentario
            $table->text('comment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
