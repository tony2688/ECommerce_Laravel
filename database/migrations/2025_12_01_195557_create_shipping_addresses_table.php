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
        Schema::create('shipping_addresses', function (Blueprint $table) {
            // id bigint (PK)
            $table->id();

            // user_id bigint (FK) Cliente dueño de la dirección
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            // address varchar(255) Dirección completa
            $table->string('address', 255);

            // city varchar(100)
            $table->string('city', 100);

            // state varchar(100)
            $table->string('state', 100);

            // postal_code varchar(20)
            $table->string('postal_code', 20);

            // country varchar(100)
            $table->string('country', 100);

            // created_at / updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_addresses');
    }
};
