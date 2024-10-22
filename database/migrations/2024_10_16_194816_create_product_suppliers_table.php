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
        Schema::create('product_supplier', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Relación con products
            $table->foreignId('supplier_id')->constrained()->onDelete('cascade'); // Relación con suppliers
            $table->decimal('cost', 10, 2); // Precio de costo del proveedor
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Primero eliminamos las foreign keys
        Schema::table('product_supplier', function (Blueprint $table) {
            $table->dropForeign(['product_id']);   // Eliminar la foreign key de product_id
            $table->dropForeign(['supplier_id']);  // Eliminar la foreign key de supplier_id
        });

        // Luego eliminamos la tabla
        Schema::dropIfExists('product_supplier');
    }
};
