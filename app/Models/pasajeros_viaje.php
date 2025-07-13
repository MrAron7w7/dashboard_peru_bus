<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasajeros_viaje extends Model
{
    use HasFactory;

    protected $table = 'pasajeros_viaje';
    protected $primaryKey = 'id';
    protected $fillable = ['id_viaje', 'cantidad_pasajeros', 'paradero_subida', 'paradero_bajada'];

    public function viaje()
    {
        return $this->belongsTo(Viajes::class, 'id_viaje', 'id_viaje');
    }

    public function subida()
    {
        return $this->belongsTo(Paraderos::class, 'paradero_subida', 'id_paradero');
    }

    public function bajada()
    {
        return $this->belongsTo(Paraderos::class, 'paradero_bajada', 'id_paradero');
    }
}
