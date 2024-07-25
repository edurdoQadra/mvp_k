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
        Schema::create('utilidad', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('codigo_sede')->nullable();
            $table->unsignedBigInteger('plataforma_id')->nullable();
            $table->string('juego', 255)->nullable();
            $table->string('periodo', 255)->nullable();
            $table->string('administrador', 255)->nullable();
            $table->string('sede_id', 255)->nullable();
            $table->string('razon_social', 255)->nullable();
            $table->string('ruc', 255)->nullable();
            $table->decimal('utilidad_bruta_100', 10, 2)->nullable();
            $table->decimal('impuesto_12', 10, 2)->nullable();
            $table->decimal('utilidad_impuesto', 10, 2)->nullable();
            $table->decimal('porcentaje_base', 5, 2)->nullable();
            $table->decimal('utilidad_neta', 10, 2)->nullable();
            $table->decimal('total_a_depositar', 10, 2)->nullable();
            $table->decimal('pago', 10, 2)->nullable();
            $table->decimal('porcentaje_com_adm', 5, 2)->nullable();
            $table->decimal('com_adm_s', 10, 2)->nullable();
            $table->decimal('porcentaje_participacion', 5, 2)->nullable();
            $table->string('documento_atribucion', 255)->nullable();
            $table->timestamps(); // Esto crea created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilidad');
    }
};
