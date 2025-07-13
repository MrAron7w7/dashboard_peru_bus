<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('buses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'placa' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'capacidad' => 'required|numeric|min:0',
            'estado' => 'required|string|max:100',
        ]);

        Bus::create($validated);

        return redirect()
            ->route('buses.index')
            ->with('toast', [
                'type' => 'success',
                'message' => 'Bus creado correctamente',
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Bus $bus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bus $bus)
    {
        return view('buses.edit', compact('bus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bus $bus)
    {
        $validated = $request->validate([
            'placa' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'capacidad' => 'required|numeric|min:0',
            'estado' => 'required|string|max:100',
        ]);

        $bus->update($validated);

        return redirect()
            ->route('buses.index')
            ->with('toast', [
                'type' => 'success',
                'message' => 'Bus actualizado correctamente',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bus $bus)
    {
        //
    }
}
