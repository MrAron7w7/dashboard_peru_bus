<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tiempos_tramo extends Model
{
    use HasFactory;

    protected $table = 'tiempos_tramo';
    protected $primaryKey = 'id_tramo';
    protected $fillable = [
        'id_ruta',
        'paradero_origen',
        'paradero_destino',
        'tiempo_estimado_min'
    ];

    public function ruta()
    {
        return $this->belongsTo(Rutas::class, 'id_ruta');
    }

    public function origen()
    {
        return $this->belongsTo(Paraderos::class, 'paradero_origen');
    }

    public function destino()
    {
        return $this->belongsTo(Paraderos::class, 'paradero_destino');
    }
}
