<?php


// app/Models/ResultadoSimulacion.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResultadoSimulacion extends Model
{
    protected $table = 'resultados_simulacion';

    public function simulacion()
    {
        return $this->belongsTo(Simulacion::class);
    }
}
