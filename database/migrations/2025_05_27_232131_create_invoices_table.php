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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('merchant_branch_id')->nullable()->constrained()->onDelete('set null');

            $table->string('invoice_number_ocr')->unique()->nullable(); // ahora es único
            $table->decimal('total_amount_ocr', 15, 2)->nullable();
            $table->date('invoice_date_ocr')->nullable();
            $table->string('currency_ocr', 10)->nullable();

            $table->string('supplier_name_ocr')->nullable();
            $table->string('supplier_id_number_ocr')->nullable();

            $table->string('image_path');
            $table->longText('raw_ocr_response')->nullable();
            $table->enum('status', ['pending_review', 'approved', 'rejected', 'ocr_failed'])->default('pending_review');
            $table->text('review_notes')->nullable();
            $table->timestamps();

            // Índices adicionales útiles para búsquedas frecuentes
            $table->index('invoice_date_ocr');
            $table->index('supplier_id_number_ocr');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
