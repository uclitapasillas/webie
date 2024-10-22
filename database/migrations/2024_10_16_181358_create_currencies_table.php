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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id(); // ID autoincremental, clave primaria
            $table->string('name', 100); // Nombre de la moneda (Ej: Dollar, Euro)
            $table->string('code', 3); // Código de la moneda (Ej: USD, EUR)
            $table->decimal('exchange_rate', 15, 6)->default(1.000000); // Tasa de cambio con respecto a una moneda base (ej: USD)
            $table->boolean('is_active')->default(true); // Para habilitar/deshabilitar la moneda
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
