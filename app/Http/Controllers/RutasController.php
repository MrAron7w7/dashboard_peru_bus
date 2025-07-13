<?php

namespace App\Http\Controllers;

use App\Models\Rutas;
use Illuminate\Http\Request;

class RutasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rutas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rutas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'origen' => 'required|string|max:100',
            'destino' => 'required|string|max:100',
            'distancia_km' => 'required|numeric|min:0',
        ]);

        Rutas::create($validated);

        return redirect()
            ->route('rutas.index')
            ->with('toast', [
                'type' => 'success',
                'message' => 'Ruta creada correctamente',
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rutas $rutas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rutas $ruta)
    {
        return view('rutas.edit', compact('ruta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rutas $rutas)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'origen' => 'required|string|max:100',
            'destino' => 'required|string|max:100',
            'distancia_km' => 'required|numeric|min:0',
        ]);

        $rutas->update($validated);

        return redirect()
            ->route('rutas.index')
            ->with('toast', [
                'type' => 'success',
                'message' => 'Ruta actualizada correctamente',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rutas $rutas) {}
}
