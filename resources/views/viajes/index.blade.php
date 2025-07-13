@extends('components.layouts.app')

@section('content')
    <x-toast />

    <!-- Encabezado mejorado -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <!-- Título personalizado -->
        <div class="flex items-center space-x-3">
            <div class="p-2 rounded-lg bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Administración de Viajes</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Gestiona todas los viajes del sistema de transporte
                </p>
            </div>
        </div>

        <!-- Botón personalizado -->
        <a href="{{ route('viajes.create') }}"
            class="flex items-center justify-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
            <x-antdesign-plus-o class="w-6 h-6" />

            <span class="ms-2"></span>
            <span>Agregar viajes</span>
        </a>
    </div>

    @livewire('viajes-table')
@endsection
