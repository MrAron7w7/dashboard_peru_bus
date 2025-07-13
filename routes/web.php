<?php

use App\Http\Controllers\BusController;
use App\Http\Controllers\ConductoresController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\ParaderosController;
use App\Http\Controllers\PasajerosViajeController;
use App\Http\Controllers\RutasController;
use App\Http\Controllers\TiemposTramoController;
use App\Http\Controllers\ViajesController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard'); // Redirige "/" a "/dashboard"

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Módulos principales
Route::resource('/rutas', RutasController::class);

Route::resource('/paraderos', ParaderosController::class);

Route::resource('/buses', BusController::class);

Route::resource('/conductores', ConductoresController::class);

Route::resource('/horarios', HorariosController::class);

Route::resource('/viajes', ViajesController::class);

Route::resource('/tiempos-tramos', TiemposTramoController::class);

Route::resource('/pasajeros', PasajerosViajeController::class);


Route::fallback(function () {
    return redirect()->route('dashboard'); // O simplemente: return redirect('/dashboard');
});
