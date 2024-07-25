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
        Schema::create('interesados', function (Blueprint $table) {
            $table->id();
            $table->date('fecha')->nullable();
            $table->string('dni', 255)->nullable();
            $table->string('medio_de_contacto', 255)->nullable();
            $table->string('medio_de_respuesta', 255)->nullable();
            $table->string('como_llego_a_la_marca', 255)->nullable();
            $table->string('tipo_negocio', 100);
            $table->string('producto_o_servicio', 255)->nullable();
            $table->string('estado', 255)->nullable();
            $table->string('respuesta_asesor', 255)->nullable();
            $table->string('primer_contacto', 255)->nullable();
            $table->string('segundo_contacto', 255)->nullable();
            $table->string('tercer_contacto', 255)->nullable();
            $table->string('contacto', 255)->nullable();
            $table->string('realizo_la_venta', 255)->nullable();
            $table->string('futuro_socio', 255)->nullable();
            $table->timestamps(); // Esto crea created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interesados');
    }
};
