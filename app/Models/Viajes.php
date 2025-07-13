<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viajes extends Model
{
    use HasFactory;

    protected $table = 'viajes';
    protected $primaryKey = 'id_viaje';
    protected $fillable = [
        'id_ruta',
        'id_bus',
        'id_conductor',
        'fecha',
        'hora_salida',
        'hora_llegada',
        'estado',
    ];

    public function ruta()
    {
        return $this->belongsTo(Rutas::class, 'id_ruta', 'id_ruta');
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'id_bus', 'id_bus');
    }

    public function conductor()
    {
        return $this->belongsTo(Conductores::class, 'id_conductor', 'id_conductor');
    }

    public function pasajeros()
    {
        return $this->hasMany(pasajeros_viaje::class, 'id_viaje', 'id_viaje');
    }
}
