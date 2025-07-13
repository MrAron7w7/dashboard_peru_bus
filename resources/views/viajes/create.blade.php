@extends('components.layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
        <!-- Encabezado -->
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                Crear Nuevo Viaje
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Complete el formulario para registrar un nuevo viaje.
            </p>
        </div>

        <!-- Formulario -->
        <form method="POST" action="{{ route('viajes.store') }}" class="space-y-6">
            @csrf

            <!-- Campo: Ruta -->
            <div>
                <label for="id_ruta" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ruta</label>
                <select name="id_ruta" id="id_ruta"
                    class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm dark:text-white"
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

            <!-- Campo: Bus -->
            <div>
                <label for="id_bus" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bus</label>
                <select name="id_bus" id="id_bus"
                    class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm dark:text-white"
                    required>
                    <option value="">Seleccione un bus</option>
                    @foreach ($buses as $bus)
                        <option value="{{ $bus->id_bus }}">{{ $bus->placa }} - {{ $bus->modelo }}</option>
                    @endforeach
                </select>
                @error('id_bus')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo: Conductor -->
            <div>
                <label for="id_conductor"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Conductor</label>
                <select name="id_conductor" id="id_conductor"
                    class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm dark:text-white"
                    required>
                    <option value="">Seleccione un conductor</option>
                    @foreach ($conductores as $conductor)
                        <option value="{{ $conductor->id_conductor }}">{{ $conductor->nombre }} {{ $conductor->apellido }}
                        </option>
                    @endforeach
                </select>
                @error('id_conductor')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo: Fecha -->
            <div>
                <label for="fecha" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha</label>
                <input type="date" name="fecha" id="fecha"
                    class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm dark:text-white"
                    required>
                @error('fecha')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo: Hora Salida -->
            <div>
                <label for="hora_salida" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hora de
                    Salida</label>
                <input type="time" name="hora_salida" id="hora_salida"
                    class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm dark:text-white"
                    required>
                @error('hora_salida')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo: Hora Llegada -->
            <div>
                <label for="hora_llegada" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hora de
                    Llegada</label>
                <input type="time" name="hora_llegada" id="hora_llegada"
                    class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm dark:text-white"
                    required>
                @error('hora_llegada')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Campo: Estado -->
            <div>
                <label for="estado" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estado</label>
                <select name="estado" id="estado"
                    class="mt-1 block w-full px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm dark:text-white"
                    required>
                    <option value="Programado" selected>Programado</option>
                    <option value="En curso">En curso</option>
                    <option value="Completado">Completado</option>
                    <option value="Cancelado">Cancelado</option>
                </select>
                @error('estado')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botones -->
            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('viajes.index') }}" class="text-sm text-gray-600 dark:text-gray-300 hover:underline">
                    ← Volver al listado
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                    Guardar Viaje
                </button>
            </div>
        </form>
    </div>
@endsection
