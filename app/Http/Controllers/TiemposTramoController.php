<?php

namespace App\Http\Controllers;

use App\Models\Rutas;
use App\Models\tiempos_tramo;
use Illuminate\Http\Request;

class TiemposTramoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tramos = tiempos_tramo::with(['ruta', 'origen', 'destino'])
            ->orderBy('id_ruta')
            ->get()
            ->groupBy('id_ruta');

        $rutas = Rutas::all();

        return view('tiempo-tramo.index', compact('tramos', 'rutas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(tiempos_tramo $tiempos_tramo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tiempos_tramo $tiempos_tramo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tiempos_tramo $tiempos_tramo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tiempos_tramo $tiempos_tramo)
    {
        //
    }
}
