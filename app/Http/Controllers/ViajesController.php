<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Conductores;
use App\Models\Rutas;
use App\Models\Viajes;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ViajesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('viajes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rutas = Rutas::all();
        $buses = Bus::all();
        $conductores = Conductores::all();

        return view('viajes.create', compact('rutas', 'buses', 'conductores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_ruta' => 'required|exists:rutas,id_ruta',
            'id_bus' => [
                'required',
                'exists:buses,id_bus',
                Rule::unique('viajes')->where(function ($query) use ($request) {
                    return $query->where('fecha', $request->fecha)
                        ->where('id_bus', $request->id_bus);
                })
            ],
            'id_conductor' => [
                'required',
                'exists:conductores,id_conductor',
                Rule::unique('viajes')->where(function ($query) use ($request) {
                    return $query->where('fecha', $request->fecha)
                        ->where('id_conductor', $request->id_conductor);
                })
            ],
            'fecha' => 'required|date|after_or_equal:today',
            'hora_salida' => 'required|date_format:H:i',
            'hora_llegada' => 'required|date_format:H:i|after:hora_salida',
            'estado' => 'required|in:Programado,En curso,Completado,Cancelado',
        ], [
            'id_bus.unique' => 'Este bus ya tiene un viaje asignado para esta fecha',
            'id_conductor.unique' => 'Este conductor ya tiene un viaje asignado para esta fecha',
            'fecha.after_or_equal' => 'La fecha no puede ser anterior a hoy',
            'estado.in' => 'El estado seleccionado no es válido'
        ]);

        // Establecer estado "Programado" por defecto si no se especifica
        $validated['estado'] = $validated['estado'] ?? 'Programado';

        Viajes::create($validated);

        return redirect()
            ->route('viajes.index')
            ->with('toast', [
                'type' => 'success',
                'message' => 'Viaje creado correctamente',
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Viajes $viajes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Viajes $viaje)
    {
        $rutas = Rutas::all();
        $buses = Bus::all();
        $conductores = Conductores::all();

        return view('viajes.edit', compact('viaje', 'rutas', 'buses', 'conductores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Viajes $viaje)
    {
        $validated = $request->validate([
            'id_ruta' => 'sometimes|exists:rutas,id_ruta',
            'id_bus' => [
                'sometimes',
                'exists:buses,id_bus',
                Rule::unique('viajes')->where(function ($query) use ($request, $viaje) {
                    return $query->where('fecha', $request->fecha ?? $viaje->fecha)
                        ->where('id_bus', $request->id_bus)
                        ->where('id_viaje', '!=', $viaje->id_viaje);
                })
            ],
            'id_conductor' => [
                'sometimes',
                'exists:conductores,id_conductor',
                Rule::unique('viajes')->where(function ($query) use ($request, $viaje) {
                    return $query->where('fecha', $request->fecha ?? $viaje->fecha)
                        ->where('id_conductor', $request->id_conductor)
                        ->where('id_viaje', '!=', $viaje->id_viaje);
                })
            ],
            'fecha' => 'sometimes|date',
            'hora_salida' => 'sometimes|date_format:H:i',
            'hora_llegada' => 'sometimes|date_format:H:i|after:hora_salida',
            'estado' => 'sometimes|in:Programado,En curso,Completado,Cancelado',
        ], [
            'id_bus.unique' => 'Este bus ya tiene un viaje asignado para esta fecha',
            'id_conductor.unique' => 'Este conductor ya tiene un viaje asignado para esta fecha',
            'estado.in' => 'El estado seleccionado no es válido',
            'hora_llegada.after' => 'La hora de llegada debe ser posterior a la hora de salida'
        ]);

        // Solo actualizar los campos que fueron enviados en el request
        $viaje->update(array_filter($validated));

        return redirect()
            ->route('viajes.index')
            ->with('toast', [
                'type' => 'success',
                'message' => 'Viaje actualizado correctamente',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Viajes $viajes)
    {
        //
    }
}
