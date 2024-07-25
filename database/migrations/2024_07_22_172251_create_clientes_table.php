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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('codigo_sede')->nullable();
            $table->foreign('codigo_sede')->references('codigo_sede')->on('detalle_sede');
            $table->string('dni', 255)->nullable();
            $table->date('fecha_implementacion')->nullable();
            $table->string('estado', 255)->nullable();
            $table->string('instalacion', 255)->nullable();
            $table->string('motivo_bloqueo', 255)->nullable();
            $table->string('estado_instalacion', 255)->nullable();
            $table->string('solicitud_bloqueo', 255)->nullable();
            $table->string('codigo_cliente', 100);
            $table->timestamps(); // Esto crea created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
