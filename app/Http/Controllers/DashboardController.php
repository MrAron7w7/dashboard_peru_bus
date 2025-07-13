<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Bus;
use App\Models\Rutas;
use App\Models\Viajes;
use App\Models\Conductores;
use App\Models\Horarios;


class DashboardController extends Controller
{
    public function index()
    {
        // Estadísticas principales
        $totalRutas = Rutas::count();
        $totalBuses = Bus::count();
        $busesActivos = Bus::where('estado', 'Activo')->count();
        $totalConductores = Conductores::count();
        $conductoresDisponibles = Conductores::where('estado', 'Disponible')->count();
        $viajesHoy = Viajes::whereDate('fecha', Carbon::today())->count();

        // Datos para gráficos
        $estadoBuses = Bus::select('estado', \DB::raw('count(*) as count'))
            ->groupBy('estado')
            ->get();

        $estadoConductores = Conductores::select('estado', \DB::raw('count(*) as count'))
            ->groupBy('estado')
            ->get();

        $rutas = Rutas::select('nombre', 'distancia_km')
            ->orderBy('distancia_km', 'desc')
            ->limit(10)
            ->get();

        $horarios = Horarios::select(
            'hora_salida',
            'frecuencia_min',
            \DB::raw("DATE_FORMAT(hora_salida, '%H:%i') as hora_salida_formatted")
        )
            ->orderBy('hora_salida')
            ->limit(10)
            ->get();

        $estadoViajes = Viajes::select('estado', \DB::raw('count(*) as count'))
            ->groupBy('estado')
            ->get();

        // Próximos viajes (hoy y en el futuro)
        $proximosViajes = Viajes::with(['ruta', 'bus', 'conductor'])
            ->whereDate('fecha', '>=', Carbon::today())
            ->orderBy('fecha')
            ->orderBy('hora_salida')
            ->take(5)
            ->get();

        // Últimos viajes registrados
        $ultimosViajes = Viajes::with(['ruta', 'bus', 'conductor'])
            ->orderByDesc('fecha')
            ->orderByDesc('hora_salida')
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'totalRutas',
            'totalBuses',
            'busesActivos',
            'totalConductores',
            'conductoresDisponibles',
            'viajesHoy',
            'estadoBuses',
            'estadoConductores',
            'rutas',
            'horarios',
            'estadoViajes',
            'proximosViajes',
            'ultimosViajes'
        ));
    }
}
