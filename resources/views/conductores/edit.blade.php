@extends('components.layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        <!-- Encabezado -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                Editar Conductor
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Modifica la información del conductor
            </p>
        </div>

        <!-- Formulario -->
        <form method="POST" action="{{ route('conductores.update', $conductore) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Campo: Nombre -->
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre del
                    conductor</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $conductore->nombre) }}"
                    class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm dark:text-white"
                    required>
                @error('nombre')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo: Origen -->
            <div>
                <label for="dni" class="block text-sm font-medium text-gray-700 dark:text-gray-300">DNI</label>
                <input type="number" name="dni" id="dni" value="{{ old('dni', $conductore->dni) }}"
                    class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm dark:text-white"
                    required>
                @error('dni')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo: Destino -->
            <div>
                <label for="licencia" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Licencia</label>
                <input type="text" name="licencia" id="licencia" value="{{ old('destino', $conductore->licencia) }}"
                    class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm dark:text-white"
                    required>
                @error('licencia')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo: Distancia -->
            <div>
                <label for="estado" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado
                    (KM)</label>
                <input type="text" name="estado" id="estado" value="{{ old('estado', $conductore->estado) }}"
                    class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm dark:text-white"
                    required>
                @error('estado')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botones -->
            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('conductores.index') }}" class="text-sm text-gray-600 dark:text-gray-300 hover:underline">
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
