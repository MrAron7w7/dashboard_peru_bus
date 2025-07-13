<?php

namespace App\Livewire;

use App\Models\Viajes;
use Livewire\Component;
use Livewire\WithPagination;

class ViajesTable extends Component
{

    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function deleteViaje($id_viaje)
    {
        $ruta = Viajes::findOrFail($id_viaje);

        $ruta->delete();

        // Opcional: puedes agregar un mensaje de confirmación
        session()->flash('message', 'Viaje eliminada correctamente.');
    }

    public function render()
    {
        $viajes = Viajes::with(['ruta', 'bus', 'conductor']) // Carga las relaciones
            ->where(function ($query) {
                $query->where('estado', 'like', '%' . $this->search . '%')
                    ->orWhereHas('ruta', function ($q) {
                        $q->where('nombre', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('conductor', function ($q) {
                        $q->where('nombre', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('bus', function ($q) {
                        $q->where('placa', 'like', '%' . $this->search . '%');
                    });
            })
            ->paginate(5);
        return view('livewire.viajes-table', compact('viajes'));
    }
}
