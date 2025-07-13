<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $table = 'buses';
    protected $primaryKey = 'id_bus';
    protected $fillable = ['placa', 'modelo', 'capacidad', 'estado'];

    public function viajes()
    {
        return $this->hasMany(Viajes::class, 'id_bus', 'id_bus');
    }
}
