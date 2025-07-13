<?php

namespace App\Livewire;

use App\Models\pasajeros_viaje;
use Livewire\Component;
use Livewire\WithPagination;

class PasajerosViajeTable extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deletePasajero($id_pasajero)
    {
        $pasajero = pasajeros_viaje::findOrFail($id_pasajero);

        $pasajero->delete();

        // Opcional: puedes agregar un mensaje de confirmación
        session()->flash('message', 'Pasajero viaje eliminada correctamente.');
    }

    public function render()
    {
        $pasajeros = pasajeros_viaje::where(function ($query) {
            $query->where('paradero_subida', 'like', '%' . $this->search . '%');
        })
            ->paginate(5);
        return view('livewire.pasajeros-viaje-table');
    }
}
