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
        Schema::create('payment_webhooks', function (Blueprint $table) {
            $table->id();
            $table->string('payment_gateway'); // Stripe, PayPal, etc.
            $table->string('reference')->unique(); // Relacionado con 'public_order_number'
            $table->json('payload'); // Guarda el JSON completo de la pasarela
            $table->timestamps();
            $table->index('reference'); // Agregar índice
            $table->foreign('reference')->references('public_order_number')->on('orders')->cascadeOnUpdate()->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_webhooks');
    }
};
