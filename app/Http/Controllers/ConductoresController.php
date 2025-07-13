<?php

namespace App\Http\Controllers;

use App\Models\Conductores;
use Illuminate\Http\Request;

class ConductoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('conductores.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('conductores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'dni' => 'required|string|max:100',
            'licencia' => 'required|string|max:100',
            'estado' => 'required|string|max:100',
        ]);

        Conductores::create($validated);

        return redirect()
            ->route('conductores.index')
            ->with('toast', [
                'type' => 'success',
                'message' => 'Conductor creado correctamente',
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Conductores $conductores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conductores $conductore)
    {
        return view('conductores.edit', compact('conductore'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conductores $conductore)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'dni' => 'required|string|max:100',
            'licencia' => 'required|string|max:100',
            'estado' => 'required|string|max:100',
        ]);

        $conductore->update($validated);

        return redirect()
            ->route('conductores.index')
            ->with('toast', [
                'type' => 'success',
                'message' => 'Conductor actualizado correctamente',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conductores $conductores) {}
}
