@extends('components.layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        <!-- Encabezado -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                Editar Ruta
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Modifica la información de la ruta
            </p>
        </div>

        <!-- Formulario -->
        <form method="POST" action="{{ route('rutas.update', $ruta) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Campo: Nombre -->
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre de la
                    Ruta</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $ruta->nombre) }}"
                    class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm dark:text-white"
                    required>
                @error('nombre')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo: Origen -->
            <div>
                <label for="origen" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Origen</label>
                <input type="text" name="origen" id="origen" value="{{ old('origen', $ruta->origen) }}"
                    class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm dark:text-white"
                    required>
                @error('origen')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo: Destino -->
            <div>
                <label for="destino" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Destino</label>
                <input type="text" name="destino" id="destino" value="{{ old('destino', $ruta->destino) }}"
                    class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm dark:text-white"
                    required>
                @error('destino')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo: Distancia -->
            <div>
                <label for="distancia_km" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Distancia
                    (KM)</label>
                <input type="number" step="0.01" name="distancia_km" id="distancia_km"
                    value="{{ old('distancia_km', $ruta->distancia_km) }}"
                    class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm dark:text-white"
                    required>
                @error('distancia_km')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botones -->
            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('rutas.index') }}" class="text-sm text-gray-600 dark:text-gray-300 hover:underline">
                    ← Volver al listado
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
@endsection
