<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard de Transporte Perú Bus</h1>

    <!-- Estadísticas principales mejoradas -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Tarjeta de Rutas mejorada -->
        <div class="bg-white rounded-lg shadow overflow-hidden transition-transform duration-300 hover:scale-105">
            <div class="p-6 flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-gray-500 text-sm font-medium">Total de Rutas</h3>
                    <p class="text-2xl font-bold text-gray-800">{{ $stats['total_routes'] }}</p>
                    <p class="text-xs text-gray-500 mt-1">Última ruta añadida: {{ $lastRouteAdded ?? 'N/A' }}</p>
                </div>
            </div>
            <div class="bg-blue-50 px-4 py-2 text-sm text-blue-700">
                <a href="" class="flex items-center hover:text-blue-900">
                    Ver todas las rutas
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Otras tarjetas estadísticas con mejoras similares -->
        <!-- ... -->
    </div>

    <!-- Sección de Simulaciones mejorada -->
    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Simulación de Rutas</h3>
                <p class="text-sm text-gray-500">Analiza el comportamiento de pasajeros y tráfico en tus rutas</p>
            </div>

            <div class="flex flex-col md:flex-row gap-4 w-full md:w-auto">
                <div class="relative w-full md:w-64">
                    <select wire:model="selectedRoute"
                        class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Seleccione una ruta</option>
                        @foreach ($availableRoutes as $route)
                            <option value="{{ $route->id_ruta }}">
                                {{ $route->nombre }} ({{ $route->origen }} → {{ $route->destino }})
                            </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>

                <button wire:click="runSimulation" wire:loading.attr="disabled"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 disabled:opacity-50 flex items-center justify-center gap-2 transition-colors duration-200">
                    <span wire:loading.remove>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Ejecutar Simulación
                    </span>
                    <span wire:loading>
                        <svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Procesando...
                    </span>
                </button>
            </div>
        </div>

        <!-- Última simulación con más detalles -->
        @if ($latestSimulation)
            <div class="mb-8 bg-gray-50 rounded-lg p-6 border border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="text-md font-medium text-gray-700">Resultados de la Última Simulación</h4>
                    <span
                        class="px-3 py-1 text-xs font-semibold rounded-full {{ $latestSimulation->estado == 'completada' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ ucfirst($latestSimulation->estado) }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                        <p class="text-sm text-gray-500 font-medium">Ruta simulada</p>
                        <p class="font-semibold text-gray-800">{{ $latestSimulation->ruta->nombre }}</p>
                        <p class="text-sm text-gray-600">{{ $latestSimulation->ruta->origen }} →
                            {{ $latestSimulation->ruta->destino }}</p>
                    </div>

                    <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                        <p class="text-sm text-gray-500 font-medium">Periodo de simulación</p>
                        <p class="font-semibold text-gray-800">
                            {{ \Carbon\Carbon::parse($latestSimulation->fecha_inicio)->format('d M Y H:i') }}
                            @if ($latestSimulation->fecha_fin)
                                - {{ \Carbon\Carbon::parse($latestSimulation->fecha_fin)->format('d M Y H:i') }}
                            @endif
                        </p>
                    </div>

                    <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                        <p class="text-sm text-gray-500 font-medium">Duración</p>
                        <p class="font-semibold text-gray-800">
                            @if ($latestSimulation->fecha_fin)
                                {{ \Carbon\Carbon::parse($latestSimulation->fecha_inicio)->diffForHumans($latestSimulation->fecha_fin, true) }}
                            @else
                                En progreso
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Gráficos de simulación mejorados -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <!-- Gráfico de pasajeros por hora -->
                    <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                        <h5 class="text-sm font-medium text-gray-700 mb-3">Pasajeros por Hora</h5>
                        <div x-data="{
                            init() {
                                const chart = new Chart(this.$refs.canvas, {
                                    type: 'line',
                                    data: {
                                        labels: {{ json_encode($simulationData['horas'] ?? []) }},
                                        datasets: [{
                                            label: 'Número de pasajeros',
                                            data: {{ json_encode($simulationData['pasajeros'] ?? []) }},
                                            backgroundColor: 'rgba(79, 70, 229, 0.1)',
                                            borderColor: 'rgba(79, 70, 229, 0.8)',
                                            borderWidth: 2,
                                            tension: 0.3,
                                            fill: true
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        plugins: {
                                            tooltip: {
                                                callbacks: {
                                                    label: function(context) {
                                                        return `Pasajeros: ${context.raw}`;
                                                    }
                                                }
                                            }
                                        },
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                title: {
                                                    display: true,
                                                    text: 'Número de pasajeros'
                                                }
                                            },
                                            x: {
                                                title: {
                                                    display: true,
                                                    text: 'Hora del día'
                                                }
                                            }
                                        }
                                    }
                                });
                            }
                        }">
                            <canvas x-ref="canvas" height="250"></canvas>
                        </div>
                    </div>

                    <!-- Gráfico de recompensas -->
                    <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                        <h5 class="text-sm font-medium text-gray-700 mb-3">Recompensas por Hora</h5>
                        <div x-data="{
                            init() {
                                const chart = new Chart(this.$refs.canvas, {
                                    type: 'bar',
                                    data: {
                                        labels: {{ json_encode($simulationData['horas'] ?? []) }},
                                        datasets: [{
                                            label: 'Recompensa acumulada',
                                            data: {{ json_encode($simulationData['recompensas'] ?? []) }},
                                            backgroundColor: 'rgba(16, 185, 129, 0.7)',
                                            borderColor: 'rgba(16, 185, 129, 1)',
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        plugins: {
                                            tooltip: {
                                                callbacks: {
                                                    label: function(context) {
                                                        return `Recompensa: S/. ${context.raw.toFixed(2)}`;
                                                    }
                                                }
                                            }
                                        },
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                title: {
                                                    display: true,
                                                    text: 'Recompensa (S/.)'
                                                }
                                            },
                                            x: {
                                                title: {
                                                    display: true,
                                                    text: 'Hora del día'
                                                }
                                            }
                                        }
                                    }
                                });
                            }
                        }">
                            <canvas x-ref="canvas" height="250"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Estadísticas resumidas -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">




                    <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                        <p class="text-sm text-gray-500 font-medium">Horas con tráfico</p>
                        <p class="text-2xl font-bold text-gray-800">
                            {{ $simulationData['trafico']['congestionado'] ?? 0 }} /
                            {{ count($simulationData['horas'] ?? []) }}
                        </p>
                    </div>
                </div>
            </div>
        @else
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-8 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-blue-400 mb-4" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                </svg>
                <h4 class="text-lg font-medium text-blue-800 mb-2">No hay simulaciones recientes</h4>
                <p class="text-blue-600 mb-4">Ejecuta una simulación para analizar el comportamiento de tus rutas</p>
            </div>
        @endif

        <!-- Historial de simulaciones mejorado -->
        <div class="mt-8">
            <div class="flex justify-between items-center mb-4">
                <h4 class="text-md font-medium text-gray-700">Historial de Simulaciones</h4>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-gray-500">Mostrar:</span>
                    <select wire:model="perPage" class="text-sm border-gray-300 rounded">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                    </select>
                </div>
            </div>

            <div class="overflow-x-auto rounded-lg border border-gray-200">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Ruta
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estado
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Resultados
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($simulations as $simulation)
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $simulation->ruta->nombre }}</div>
                                            <div class="text-sm text-gray-500">{{ $simulation->ruta->origen }} →
                                                {{ $simulation->ruta->destino }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ \Carbon\Carbon::parse($simulation->created_at)->format('d M Y') }}</div>
                                    <div class="text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($simulation->created_at)->format('H:i') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $simulation->estado == 'completada' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ ucfirst($simulation->estado) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        @if ($simulation->resultados->count() > 0)
                                            {{ $simulation->resultados->sum('pasajeros') }} pasajeros
                                        @else
                                            Sin datos
                                        @endif
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        @if ($simulation->resultados->count() > 0)
                                            S/. {{ number_format($simulation->resultados->sum('recompensa'), 2) }}
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button
                                        wire:click="$dispatch('openModal', { component: 'simulation-details', arguments: { simulationId: {{ $simulation->id }} }})"
                                        class="text-blue-600 hover:text-blue-900 mr-3 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Detalles
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                    No se encontraron simulaciones
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginación mejorada -->
            <div class="mt-4 px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Mostrando
                            <span class="font-medium">{{ $simulations->firstItem() }}</span>
                            a
                            <span class="font-medium">{{ $simulations->lastItem() }}</span>
                            de
                            <span class="font-medium">{{ $simulations->total() }}</span>
                            resultados
                        </p>
                    </div>
                    <div>
                        {{ $simulations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <script>
        Livewire.on('notify', (data) => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            Toast.fire({
                icon: data.type,
                title: data.message
            });
        });
    </script>
@endpush
