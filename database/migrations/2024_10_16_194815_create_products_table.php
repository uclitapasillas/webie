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
            $table->id(); // Primary key
            $table->string('sku')->unique(); 
            $table->string('name'); 
            $table->text('description')->nullable(); 
            $table->decimal('price', 10, 2);
            $table->integer('quantity')->default(0); 
            $table->foreignId('product_line_id')->constrained('product_line')->onDelete('cascade'); 
            $table->foreignId('brand_id')->constrained()->onDelete('restrict'); 
            $table->string('image')->nullable(); 
            $table->text('technical_sheet')->nullable(); 
            $table->string('item_type')->nullable(); 
            $table->integer('lead_time')->default(0); 
            $table->string('packaging_unit')->nullable();
            $table->string('measurement_unit')->nullable(); 
            $table->string('barcode')->nullable(); 
            $table->decimal('cost', 10, 2); 
            $table->foreignId('tax_id')->constrained('config_tax')->onDelete('restrict');
            $table->string('sat_product_service_key')->nullable(); 
            $table->string('sat_unit_key')->nullable(); 
            $table->boolean('manages_import_permit')->default(false); 
            $table->enum('status', ['active', 'inactive', 'discontinued'])->default('active'); 
            $table->timestamps(); // created_at y updated_at
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Primero eliminamos las foreign keys
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['product_line_id']); // Eliminar la foreign key de category_id
            $table->dropForeign(['brand_id']);    // Eliminar la foreign key de brand_id
            $table->dropForeign(['tax_id']);    // Eliminar la foreign key de brand_id

        });

        // Luego eliminamos la tabla
        Schema::dropIfExists('products');
    }
};
