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
        Schema::create('datos_personales', function (Blueprint $table) {
            $table->id();
            $table->string('dni', 255)->nullable();
            $table->string('departamento', 255)->nullable();
            $table->string('codigo_cliente', 100);
            $table->string('codigo_sede', 100);
            $table->string('provincia', 255)->nullable();
            $table->string('distrito', 255)->nullable();
            $table->string('direccion', 255)->nullable();
            $table->string('celular', 255)->nullable();
            $table->string('ruc', 255)->nullable();
            $table->string('razon_social', 255)->nullable();
            $table->string('correo', 255)->nullable();
            $table->timestamps(); // Esto crea created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_personales');
    }
};
