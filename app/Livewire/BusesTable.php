<?php

namespace App\Livewire;

use App\Models\Bus;
use Livewire\Component;
use Livewire\WithPagination;

class BusesTable extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteBus($id_ruta)
    {
        $bus = Bus::findOrFail($id_ruta);

        $bus->delete();

        // Opcional: puedes agregar un mensaje de confirmación
        session()->flash('message', 'Bus eliminada correctamente.');
    }

    public function render()
    {

        $buses = Bus::where(function ($query) {
            $query->where('placa', 'like', '%' . $this->search . '%');
        })
            ->paginate(5);

        return view('livewire.buses-table', compact('buses'));
    }
}
