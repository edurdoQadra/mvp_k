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
        Schema::create('plataformas_sede', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_sede', 50)->nullable();
            $table->string('codigo_plataforma', 50)->nullable();
            $table->string('codigo_cliente', 50)->nullable();
            $table->timestamps(); // Esto crea created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plataformas_sede');
    }
};
