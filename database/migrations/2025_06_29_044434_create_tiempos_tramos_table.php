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
        Schema::create('tiempos_tramo', function (Blueprint $table) {
            $table->id('id_tramo');
            $table->foreignId('id_ruta')->constrained('rutas', 'id_ruta')->onDelete('cascade');
            $table->foreignId('paradero_origen')->constrained('paraderos', 'id_paradero')->onDelete('cascade');
            $table->foreignId('paradero_destino')->constrained('paraderos', 'id_paradero')->onDelete('cascade');
            $table->integer('tiempo_estimado_min');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiempos_tramos');
    }
};
