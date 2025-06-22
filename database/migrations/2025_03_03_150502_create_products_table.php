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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            
            $table->string('name'); // Nombre del producto
            $table->string('slug')->unique(); // Slug para URL amigable
            $table->text('description')->nullable(); // Descripción corta para mostrar en tienda

            $table->decimal('price', 10, 2)->default(0); // Precio base SIN IVA
            $table->decimal('tax_percent', 5, 2)->default(19.00); // IVA en porcentaje (ej: 19%)
            $table->decimal('final_price', 10, 2)->virtualAs('price + (price * tax_percent / 100)'); // Precio con IVA calculado

            $table->tinyInteger('commission_income')->default(0); // Comisión directa en porcentaje
            $table->decimal('pts_base', 8, 2)->default(0); // Puntos básicos otorgados
            $table->decimal('pts_bonus', 8, 2)->default(0); // Puntos adicionales como bono
            $table->decimal('pts_dist', 8, 2)->default(0); // Puntos para distribuidores

            $table->tinyInteger('maximum_discount')->default(0); // Porcentaje máximo de descuento permitido (0-100)

            $table->text('specifications')->nullable(); // Especificaciones técnicas o detalladas
            $table->text('information')->nullable(); // Información adicional de uso o beneficios

            $table->boolean('is_physical')->default(true); // Define si es producto físico o digital
            $table->integer('stock')->nullable(); // Solo aplica si es físico
            $table->boolean('allow_backorder')->default(false); // Permite pedido aunque no haya stock

            $table->foreignId('category_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('brand_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('set null');

            $table->boolean('is_active')->default(true); // Define si el producto está habilitado para la tienda
            $table->timestamps();
            $table->index('category_id');
            $table->index('brand_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
