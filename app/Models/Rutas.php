<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rutas extends Model
{
    protected $primaryKey = 'id_ruta';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nombre',
        'origen',
        'destino',
        'distancia_km',
    ];

    public function paraderos()
    {
        return $this->hasMany(Paraderos::class, $this->primaryKey);
    }

    public function horarios()
    {
        return $this->hasMany(Horarios::class, $this->primaryKey);
    }

    public function viajes()
    {
        return $this->hasMany(Viajes::class, $this->primaryKey);
    }

    public function tiemposTramo()
    {
        return $this->hasMany(tiempos_tramo::class, $this->primaryKey);
    }
}
