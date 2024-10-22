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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Nombre del proveedor
            $table->string('contact_name')->nullable(); // Nombre del contacto
            $table->string('phone')->nullable(); // Teléfono de contacto
            $table->string('email')->nullable(); // Correo electrónico de contacto
            $table->string('address')->nullable(); // Dirección del proveedor
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
