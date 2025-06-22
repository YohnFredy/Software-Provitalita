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
        Schema::create('merchant_branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchant_id')->constrained()->onDelete('cascade');
            $table->string('city');
            $table->string('address');
            $table->timestamps();

            // Evita duplicados para la misma dirección por comercio
            $table->unique(['merchant_id', 'address', 'city']);

            // Índices individuales
            $table->index('city');
            $table->index('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchant_branches');
    }
};
