<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paraderos extends Model
{
    protected $table = 'paraderos';
    protected $primaryKey = 'id_paradero';
    protected $fillable = ['id_ruta', 'nombre', 'orden', 'latitud', 'longitud'];

    public function ruta()
    {
        return $this->belongsTo(Rutas::class, 'id_ruta', 'id_ruta');
    }
}
