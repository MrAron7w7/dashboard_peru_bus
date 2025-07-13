@extends('components.layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        <!-- Encabezado -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                Crear Nuevo Horario
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                formulario para registrar una nuevos horarios.
            </p>
        </div>

        <!-- Formulario -->
        <form method="POST" action="{{ route('horarios.store') }}" class="space-y-6">
            @csrf
            @method('POST')

            <!-- Campo: Nombre -->
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hora de
                    salida</label>

                <input type="text" name="hora_salida" id="hora_salida"
                    class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm dark:text-white"
                    required>
                @error('hora_salida')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo: Origen -->
            <div>
                <label for="frecuencia_min" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Frecuencia
                    Min</label>
                <input type="text" name="frecuencia_min" id="frecuencia_min"
                    class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm dark:text-white"
                    required>
                @error('frecuencia_min')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo: Ruta -->
            <div>
                <label for="id_ruta" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ruta</label>
                <select name="id_ruta" id="id_ruta"
                    class="mt-1 block w-full px-4 py-2 bg-white  border border-gray-300  rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm dark:text-white"
                    required>
                    <option value="">Seleccione una ruta</option>
                    @foreach ($rutas as $ruta)
                        <option value="{{ $ruta->id_ruta }}">{{ $ruta->nombre }}</option>
                    @endforeach
                </select>
                @error('id_ruta')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>



            <!-- Botones -->
            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('horarios.index') }}" class="text-sm text-gray-600 dark:text-gray-300 hover:underline">
                    ← Volver al listado
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Guardar
                </button>
            </div>
        </form>
    </div>
@endsection
