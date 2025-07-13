<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conductores extends Model
{
    protected $table = 'conductores';
    protected $primaryKey = 'id_conductor';
    protected $fillable = ['nombre', 'dni', 'licencia', 'estado'];

    public function viajes()
    {
        return $this->hasMany(Viajes::class, 'id_conductor', 'id_conductor');
    }
}
