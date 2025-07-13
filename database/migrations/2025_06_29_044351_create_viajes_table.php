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
        Schema::create('viajes', function (Blueprint $table) {
            $table->id('id_viaje');
            $table->foreignId('id_ruta')->constrained('rutas', 'id_ruta')->onDelete('cascade');
            $table->foreignId('id_bus')->constrained('buses', 'id_bus')->onDelete('cascade');
            $table->foreignId('id_conductor')->constrained('conductores', 'id_conductor')->onDelete('cascade');
            $table->date('fecha');
            $table->time('hora_salida');
            $table->time('hora_llegada');
            $table->string('estado', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viajes');
    }
};
