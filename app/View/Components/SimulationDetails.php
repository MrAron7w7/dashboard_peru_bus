<?php

namespace App\Livewire;

use App\Models\Simulacion;
use Livewire\Component;

class SimulationDetails extends Component
{
    public $simulationId;
    public $simulation;
    public $simulationData = [];

    public function mount($simulationId)
    {
        $this->simulationId = $simulationId;
        $this->loadSimulationData();
    }

    public function loadSimulationData()
    {
        $this->simulation = Simulacion::with(['ruta', 'resultados' => function ($query) {
            $query->orderBy('hora');
        }])->find($this->simulationId);

        if ($this->simulation) {
            $this->simulationData = [
                'horas' => $this->simulation->resultados->pluck('hora'),
                'pasajeros' => $this->simulation->resultados->pluck('pasajeros'),
                'recompensas' => $this->simulation->resultados->pluck('recompensa'),
                'acciones' => $this->simulation->resultados->groupBy('accion')->map->count(),
                'trafico' => [
                    'fluido' => $this->simulation->resultados->where('trafico', 0)->count(),
                    'congestionado' => $this->simulation->resultados->where('trafico', 1)->count()
                ]
            ];
        }
    }

    public function render()
    {
        return view('livewire.simulation-details');
    }
}
