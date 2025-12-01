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
        Schema::create('payments', function (Blueprint $table) {
            // id bigint (PK) Identificador único
            $table->id();

            // order_id bigint (FK) Pedido relacionado
            $table->foreignId('order_id')
                  ->constrained('orders')
                  ->cascadeOnDelete();

            // payment_method enum('paypal', 'stripe', 'bank_transfer')
            $table->enum('payment_method', ['paypal', 'stripe', 'bank_transfer']);

            // amount decimal(10,2) Monto pagado
            $table->decimal('amount', 10, 2);

            // transaction_id varchar(255) ID de la transacción del proveedor
            $table->string('transaction_id', 255)->nullable();

            // transaction_json varchar(255) Json de respuesta del proveedor de pago
            // (en el PDF está como Transaction_json, acá lo dejamos en snake_case)
            $table->string('transaction_json', 255)->nullable();

            // status enum('pending', 'completed', 'failed')
            $table->enum('status', ['pending', 'completed', 'failed'])
                  ->default('pending');

            // created_at / updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
