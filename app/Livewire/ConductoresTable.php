<?php

namespace App\Livewire;

use App\Models\Conductores;
use Livewire\Component;
use Livewire\WithPagination;

class ConductoresTable extends Component
{

    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteConductor($id_conductor)
    {
        $conduncto = Conductores::findOrFail($id_conductor);

        $conduncto->delete();

        session()->flash('message', 'Conductor eliminado correctamente.');
    }


    public function render()
    {
        $conductores = Conductores::where(function ($query) {
            $query->where('nombre', 'like', '%' . $this->search . '%')
                ->orWhere('dni', 'like', '%' . $this->search . '%')
                ->orWhere('licencia', 'like', '%' . $this->search . '%')
                ->orWhere('estado', 'like', '%' . $this->search . '%');
        })->paginate(5);
        return view('livewire.conductores-table', compact('conductores'));
    }
}
