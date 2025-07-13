<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    use HasFactory;

    protected $table = 'horarios';
    protected $primaryKey = 'id_horario';
    protected $fillable = ['id_ruta', 'hora_salida', 'frecuencia_min'];

    public function ruta()
    {
        return $this->belongsTo(Rutas::class, 'id_ruta', 'id_ruta');
    }
}
