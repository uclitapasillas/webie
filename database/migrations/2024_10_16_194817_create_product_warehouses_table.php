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
        Schema::create('product_warehouse', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Relación con products
            $table->foreignId('warehouse_id')->constrained()->onDelete('cascade'); // Relación con warehouses
            $table->integer('quantity')->default(0); // Cantidad disponible en el almacén
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('product_warehouse', function (Blueprint $table) {
            $table->dropForeign(['product_id']);   // Eliminar la foreign key de product_id
            $table->dropForeign(['warehouse_id']);  // Eliminar la foreign key de supplier_id
        });

        Schema::dropIfExists('product_warehouse');
    }
};
