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
        Schema::create('plataforma', function (Blueprint $table) {
            $table->id();
            $table->string('plataforma', 255)->nullable();
            $table->string('codigo_sede', 255)->nullable();
            $table->string('codigo_plataforma', 255)->nullable();
            $table->timestamps(); // Esto crea created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plataforma');
    }
};
