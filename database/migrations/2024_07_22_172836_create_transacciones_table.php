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
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id();
            $table->date('fecha')->nullable();
            $table->unsignedBigInteger('codigo_sede')->nullable();
            $table->integer('codigo_transaccion');
            $table->integer('ticket')->nullable();
            $table->decimal('venta', 10, 2)->nullable();
            $table->decimal('utilidad', 10, 2)->nullable();
            $table->timestamps(); // Esto crea created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacciones');
    }
};
