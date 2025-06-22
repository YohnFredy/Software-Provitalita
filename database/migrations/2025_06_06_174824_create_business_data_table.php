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
        Schema::create('business_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('country')->nullable();
            $table->string('department')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();

            $table->timestamps();

            // Índices individuales
            $table->index('country');
            $table->index('department');
            $table->index('city');
            $table->index('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_data');
    }
};
