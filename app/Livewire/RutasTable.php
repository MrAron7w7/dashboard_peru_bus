<?php

namespace App\Livewire;

use App\Models\Rutas;
use Livewire\Component;
use Livewire\WithPagination;

class RutasTable extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        $rutas = Rutas::where(function ($query) {
            $query->where('nombre', 'like', '%' . $this->search . '%')
                ->orWhere('origen', 'like', '%' . $this->search . '%')
                ->orWhere('destino', 'like', '%' . $this->search . '%');
        })
            ->paginate(5);

        // dd($rutas);

        return view('livewire.rutas-table', compact('rutas'));
    }

    public function deleteRuta($id_ruta)
    {
        $ruta = Rutas::findOrFail($id_ruta);

        $ruta->delete();

        // Opcional: puedes agregar un mensaje de confirmación
        session()->flash('message', 'Ruta eliminada correctamente.');
    }
}
