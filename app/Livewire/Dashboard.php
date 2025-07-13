<?php

namespace App\Livewire;

use App\Models\Rutas;
use App\Models\Simulacion;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class Dashboard extends Component
{
    use WithPagination;

    public $stats = [];
    public $recentTrips = [];
    public $upcomingTrips = [];
    public $chartData = [];
    public $busStatusData = [];
    public $driverStatusData = [];
    public $routeDistances = [];

    public $simulationData = [];
    public $latestSimulation = null;
    public $selectedRoute = null;
    // public $availableRoutes = [];
    public $perPage = 5;
    public Collection $availableRoutes;
    protected $listeners = ['refreshDashboard' => '$refresh'];

    public function mount()
    {
        $this->loadStats();
        $this->loadRecentTrips();
        $this->loadUpcomingTrips();
        $this->loadChartData();
        $this->loadBusStatusData();
        $this->loadDriverStatusData();
        $this->loadRouteDistances();
        $this->loadAvailableRoutes();
        $this->loadSimulationData();
    }

    public function loadAvailableRoutes()
    {
        $this->availableRoutes = Rutas::all();
        $this->selectedRoute = $this->availableRoutes->isNotEmpty()
            ? $this->availableRoutes->first()->id_ruta
            : null;
    }

    public function loadStats()
    {
        $this->stats = [
            'total_routes' => DB::table('rutas')->count(),
            'total_buses' => DB::table('buses')->count(),
            'total_drivers' => DB::table('conductores')->count(),
            'total_trips_today' => DB::table('viajes')->whereDate('fecha', today())->count(),
            'active_buses' => DB::table('buses')->where('estado', 'Activo')->count(),
            'maintenance_buses' => DB::table('buses')->where('estado', 'Mantenimiento')->count(),
            'available_drivers' => DB::table('conductores')->where('estado', 'Disponible')->count(),
            'unavailable_drivers' => DB::table('conductores')->where('estado', 'De baja')->count(),
        ];
    }

    public function loadRecentTrips()
    {
        $this->recentTrips = DB::table('viajes')
            ->join('rutas', 'viajes.id_ruta', '=', 'rutas.id_ruta')
            ->join('buses', 'viajes.id_bus', '=', 'buses.id_bus')
            ->join('conductores', 'viajes.id_conductor', '=', 'conductores.id_conductor')
            ->select(
                'rutas.nombre as ruta_nombre',
                'rutas.origen',
                'rutas.destino',
                'buses.placa',
                'buses.modelo',
                'conductores.nombre as conductor_nombre',
                'viajes.fecha',
                'viajes.hora_salida',
                'viajes.hora_llegada',
                'viajes.estado'
            )
            ->orderBy('viajes.fecha', 'desc')
            ->orderBy('viajes.hora_salida', 'desc')
            ->limit(5)
            ->get()
            ->map(function ($trip) {
                $trip->fecha_formatted = Carbon::parse($trip->fecha)->format('d/m/Y');
                $trip->hora_salida_formatted = Carbon::parse($trip->hora_salida)->format('H:i');
                $trip->hora_llegada_formatted = $trip->hora_llegada ? Carbon::parse($trip->hora_llegada)->format('H:i') : '--:--';
                return $trip;
            });
    }

    public function loadUpcomingTrips()
    {
        $this->upcomingTrips = DB::table('viajes')
            ->join('rutas', 'viajes.id_ruta', '=', 'rutas.id_ruta')
            ->join('buses', 'viajes.id_bus', '=', 'buses.id_bus')
            ->join('conductores', 'viajes.id_conductor', '=', 'conductores.id_conductor')
            ->select(
                'rutas.nombre as ruta_nombre',
                'rutas.origen',
                'rutas.destino',
                'buses.placa',
                'conductores.nombre as conductor_nombre',
                'viajes.fecha',
                'viajes.hora_salida',
                'viajes.estado'
            )
            ->whereDate('viajes.fecha', '>=', today())
            ->orderBy('viajes.fecha')
            ->orderBy('viajes.hora_salida')
            ->limit(5)
            ->get()
            ->map(function ($trip) {
                $trip->fecha_formatted = Carbon::parse($trip->fecha)->format('d/m/Y');
                $trip->hora_salida_formatted = Carbon::parse($trip->hora_salida)->format('H:i');
                return $trip;
            });
    }

    public function loadChartData()
    {
        $this->chartData['trips_by_status'] = DB::table('viajes')
            ->select('estado', DB::raw('count(*) as total'))
            ->groupBy('estado')
            ->get();

        $this->chartData['popular_routes'] = DB::table('viajes')
            ->join('rutas', 'viajes.id_ruta', '=', 'rutas.id_ruta')
            ->select('rutas.nombre', DB::raw('count(*) as total'))
            ->groupBy('rutas.nombre')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->get();

        $this->chartData['monthly_trips'] = DB::table('viajes')
            ->select(
                DB::raw('MONTH(fecha) as mes'),
                DB::raw('count(*) as total'),
                DB::raw("DATE_FORMAT(fecha, '%M') as mes_nombre")
            )
            ->whereYear('fecha', date('Y'))
            ->groupBy(DB::raw('MONTH(fecha)'), DB::raw("DATE_FORMAT(fecha, '%M')"))
            ->orderBy('mes')
            ->get();
    }

    public function loadBusStatusData()
    {
        $this->busStatusData = DB::table('buses')
            ->select('estado', DB::raw('count(*) as total'))
            ->groupBy('estado')
            ->get();
    }

    public function loadDriverStatusData()
    {
        $this->driverStatusData = DB::table('conductores')
            ->select('estado', DB::raw('count(*) as total'))
            ->groupBy('estado')
            ->get();
    }

    public function loadRouteDistances()
    {
        $this->routeDistances = DB::table('rutas')
            ->select('nombre', 'distancia_km')
            ->orderBy('distancia_km', 'desc')
            ->limit(10)
            ->get();
    }

    public function loadSimulationData()
    {
        $this->latestSimulation = Simulacion::with(['ruta', 'resultados' => function ($query) {
            $query->orderBy('hora');
        }])->latest()->first();

        if ($this->latestSimulation) {
            $this->simulationData = [
                'horas' => $this->latestSimulation->resultados->pluck('hora'),
                'pasajeros' => $this->latestSimulation->resultados->pluck('pasajeros'),
                'recompensas' => $this->latestSimulation->resultados->pluck('recompensa'),
                'acciones' => $this->latestSimulation->resultados->groupBy('accion')->map->count(),
                'trafico' => [
                    'fluido' => $this->latestSimulation->resultados->where('trafico', 0)->count(),
                    'congestionado' => $this->latestSimulation->resultados->where('trafico', 1)->count()
                ]
            ];
        }
    }

    public function getSimulationsProperty()
    {
        return Simulacion::with('ruta')
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);
    }

    public function runSimulation()
    {
        $this->validate([
            'selectedRoute' => 'required|exists:rutas,id_ruta'
        ]);

        try {
            $ruta = Rutas::findOrFail($this->selectedRoute);
            $routeId = escapeshellarg($this->selectedRoute);
            $scriptPath = escapeshellarg(base_path('peru_bus_planner/main_train.py'));

            $command = "python3 {$scriptPath} {$routeId}";
            $output = shell_exec($command . " 2>&1");

            if (strpos($output, 'Error') !== false || empty($output)) {
                throw new \Exception("Error en la simulación: " . ($output ?: 'No se recibió respuesta'));
            }

            $this->loadSimulationData();
            $this->dispatch(
                'notify',
                type: 'success',
                message: 'Simulación completada para la ruta: ' . $ruta->nombre
            );
            $this->dispatch('refreshDashboard');
        } catch (\Exception $e) {
            $this->dispatch(
                'notify',
                type: 'error',
                message: $e->getMessage()
            );
        }
    }

    public function render()
    {
        return view('livewire.dashboard', [
            'availableRoutes' => $this->availableRoutes,
            'selectedRoute' => $this->selectedRoute,
            'simulations' => $this->simulations
        ]);
    }
}
