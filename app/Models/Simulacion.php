<?php

// app/Models/Simulacion.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Simulacion extends Model
{
    protected $table = 'simulaciones';
    protected $casts = ['parametros' => 'array'];

    public function ruta()
    {
        return $this->belongsTo(Rutas::class, 'id_ruta');
    }

    public function resultados()
    {
        return $this->hasMany(ResultadoSimulacion::class, 'simulacion_id');
    }
}
