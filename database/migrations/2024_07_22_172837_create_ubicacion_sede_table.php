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
        Schema::create('ubicacion_sede', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_sede', 100);
            $table->string('nombre_sede', 100);
            $table->string('latitud', 100);
            $table->string('longitud', 100);
            $table->string('administrador', 100);
            $table->string('estado', 100);
            $table->string('reporte', 100);
            $table->timestamps(); // Esto crea created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ubicacion_sede');
    }
};
