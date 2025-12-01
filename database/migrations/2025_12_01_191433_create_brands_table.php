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
        Schema::create('brands', function (Blueprint $table) {
            $table->id(); // bigint (PK) Identificador único

            $table->string('name', 255);              // Nombre de la marca
            $table->string('slug', 255)->unique();    // URL amigable (único)
            $table->text('description')->nullable();  // Descripción de la marca (opcional)

            $table->timestamps(); // created_at / updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
