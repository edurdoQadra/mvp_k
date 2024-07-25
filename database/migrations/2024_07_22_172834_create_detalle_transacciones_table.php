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
        Schema::create('detalle_transacciones', function (Blueprint $table) {
            $table->id();
            $table->decimal('porcentaje_c_v', 5, 2)->nullable();
            $table->unsignedBigInteger('plataforma_id')->nullable();
            $table->unsignedBigInteger('codigo_sede')->nullable();
            $table->integer('codigo_transaccion');
            $table->timestamps(); // Esto crea created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_transacciones');
    }
};
