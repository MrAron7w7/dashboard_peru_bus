@extends('components.layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        <!-- Encabezado -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                Crear Bus
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                formulario para registrar una nuevo bus.
            </p>
        </div>

        <!-- Formulario -->
        <form method="POST" action="{{ route('buses.store') }}" class="space-y-6">
            @csrf
            @method('POST')

            <!-- Campo: Nombre -->
            <div>
                <label for="placa" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Placa</label>
                <input type="text" name="placa" id="placa"
                    class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm dark:text-white"
                    required>
                @error('placa')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo: Origen -->
            <div>
                <label for="modelo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Modelo</label>
                <input type="text" name="modelo" id="modelo"
                    class="mt-1 block w-full px-4 py-2 bg-white  border border-gray-300  rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm"
                    required>
                @error('modelo')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo: Destino -->
            <div>
                <label for="capacidad" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Capacidad</label>
                <input type="number" name="capacidad" id="capacidad"
                    class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm dark:text-white"
                    required>
                @error('capacidad')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo: Distancia -->
            <div>
                <label for="estado" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado</label>
                <input type="text" step="0.01" name="estado" id="estado"
                    class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm dark:text-white"
                    required>
                @error('estado')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botones -->
            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('buses.index') }}" class="flex text-sm text-gray-600  hover:underline">
                    <x-antdesign-arrow-left-o class="mr-2 w-5 h-5" /> Volver al listado
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 ">
                    Guardar
                </button>
            </div>
        </form>
    </div>
@endsection
