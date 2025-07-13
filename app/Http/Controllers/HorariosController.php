<?php

namespace App\Http\Controllers;

use App\Models\Horarios;
use App\Models\Rutas;
use Illuminate\Http\Request;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('horarios.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rutas = Rutas::all(); // Asegúrate de importar el modelo Rutas al inicio: use App\Models\Rutas;
        return view('horarios.create', compact('rutas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_ruta' => 'required|exists:rutas,id_ruta',
            'hora_salida' => 'required|string|max:100',
            'frecuencia_min' => 'required|numeric|min:0',
        ]);

        Horarios::create($validated);

        return redirect()
            ->route('horarios.index')
            ->with('toast', [
                'type' => 'success',
                'message' => 'Horario creado correctamente',
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Horarios $horarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horarios $horario)
    {
        $rutas = Rutas::all();
        return view('horarios.edit', compact('horario', 'rutas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horarios $horario)
    {
        $validated = $request->validate([
            'id_ruta' => 'required|exists:rutas,id_ruta',
            'hora_salida' => 'required|string|max:100',
            'frecuencia_min' => 'required|numeric|min:0',
        ]);

        $horario->update($validated);

        return redirect()
            ->route('horarios.index')
            ->with('toast', [
                'type' => 'success',
                'message' => 'Horario actualizado correctamente',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horarios $horarios)
    {
        //
    }
}
