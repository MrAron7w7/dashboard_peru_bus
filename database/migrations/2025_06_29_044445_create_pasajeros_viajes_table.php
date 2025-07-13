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
        Schema::create('pasajeros_viajes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_viaje')->constrained('viajes', 'id_viaje')->onDelete('cascade');
            $table->integer('cantidad_pasajeros');
            $table->foreignId('paradero_subida')->constrained('paraderos', 'id_paradero')->onDelete('cascade');
            $table->foreignId('paradero_bajada')->constrained('paraderos', 'id_paradero')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasajeros_viajes');
    }
};
