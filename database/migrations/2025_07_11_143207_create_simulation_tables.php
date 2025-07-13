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
        Schema::create('simulaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_ruta')->constrained('rutas', 'id_ruta'); // Especifica la columna correcta
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin')->nullable();
            $table->string('estado');
            $table->json('parametros');
            $table->timestamps();
        });

        Schema::create('resultados_simulacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('simulacion_id')->constrained('simulaciones');
            $table->integer('hora');
            $table->integer('pasajeros');
            $table->boolean('trafico');
            $table->string('accion');
            $table->decimal('recompensa', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simulation_tables');
    }
};
