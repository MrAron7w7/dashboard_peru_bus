<?php

namespace App\Livewire;

use App\Models\Horarios;
use Livewire\Component;
use Livewire\WithPagination;

class HorariosTable extends Component
{

    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function deleteHorario($id_horario)
    {
        $horario = Horarios::findOrFail($id_horario);

        $horario->delete();

        session()->flash('message', 'Horario eliminado correctamente.');
    }




    public function render()
    {
        $horarios = Horarios::with('ruta')
            ->where(function ($query) {
                $query->where('id_ruta', 'like', '%' . $this->search . '%')
                    ->orWhere('hora_salida', 'like', '%' . $this->search . '%')
                    ->orWhere('frecuencia_min', 'like', '%' . $this->search . '%');
            })
            ->paginate(5);

        return view('livewire.horarios-table', compact('horarios'));
    }
}
