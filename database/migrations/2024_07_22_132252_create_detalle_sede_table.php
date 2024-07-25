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
        Schema::create('detalle_sede', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('codigo_sede')->nullable();
            $table->string('codigo_cliente', 100);
            $table->string('nombre_sede', 100);
            $table->string('grupo', 255)->nullable();
            $table->string('administrador', 255)->nullable();
            $table->string('dni', 255)->nullable();
            $table->string('ruc', 255)->nullable();
            $table->string('asociado', 255)->nullable();
            $table->string('modelo', 255)->nullable();
            $table->string('fachada', 255)->nullable();
            $table->string('interior_del_local', 255)->nullable();
            $table->string('garantia', 255)->nullable();
            $table->string('numero_operacion', 255)->nullable();
            $table->decimal('monto_garantia', 10, 2)->nullable();
            $table->string('tipo_negocio', 255)->nullable();
            $table->string('estado', 255)->nullable();
            $table->string('detalle_nombre', 255)->nullable();
            $table->string('agente_encargado_de_venta', 255)->nullable();
            $table->timestamps(); // Esto crea created_at y updated_at
        
            // Añadir índice en codigo_sede
            $table->index('codigo_sede');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_sede');
    }
};
