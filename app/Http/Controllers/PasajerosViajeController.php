<?php

namespace App\Http\Controllers;

use App\Models\pasajeros_viaje;
use Illuminate\Http\Request;

class PasajerosViajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pasajeros-viaje.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasajeros-viaje.create');
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
    public function show(pasajeros_viaje $pasajeros_viaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pasajeros_viaje $pasajeros_viaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pasajeros_viaje $pasajeros_viaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pasajeros_viaje $pasajeros_viaje)
    {
        //
    }
}
