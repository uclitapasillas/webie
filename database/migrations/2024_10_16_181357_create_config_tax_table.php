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
        Schema::create('config_tax', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Nombre del impuesto
            $table->decimal('rate', 5, 2); // Tasa del impuesto
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('config_tax');
    }
};
