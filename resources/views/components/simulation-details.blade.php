<div>
    @if ($simulation)
        <div class="p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Detalles de Simulación</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="bg-gray-50 p-4 rounded">
                    <p class="text-sm text-gray-500">Ruta</p>
                    <p class="font-medium">{{ $simulation->ruta->nombre }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded">
                    <p class="text-sm text-gray-500">Fecha</p>
                    <p class="font-medium">{{ $simulation->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div class="bg-gray-50 p-4 rounded">
                    <p class="text-sm text-gray-500">Estado</p>
                    <span
                        class="px-2 py-1 text-xs font-semibold rounded 
                        {{ $simulation->estado == 'completada' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ ucfirst($simulation->estado) }}
                    </span>
                </div>
            </div>

            <!-- Gráficos -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div>
                    <h4 class="text-md font-medium text-gray-700 mb-2">Pasajeros por Hora</h4>
                    <canvas id="pasajerosChart" height="250"></canvas>
                </div>
                <div>
                    <h4 class="text-md font-medium text-gray-700 mb-2">Acciones Tomadas</h4>
                    <canvas id="accionesChart" height="250"></canvas>
                </div>
            </div>

            <!-- Tabla de resultados -->
            <div class="overflow-x-auto">
                <h4 class="text-md font-medium text-gray-700 mb-2">Detalle por Hora</h4>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Hora</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pasajeros</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tráfico</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acción</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Recompensa</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($simulation->resultados as $resultado)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $resultado->hora }}:00</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $resultado->pasajeros }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $resultado->trafico ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                        {{ $resultado->trafico ? 'Congestionado' : 'Fluido' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $resultado->accion == 'Avanzar' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $resultado->accion }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ number_format($resultado->recompensa, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="p-6 text-center text-gray-500">
            No se encontraron datos de la simulación
        </div>
    @endif
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('simulationLoaded', (simulationData) => {
                // Gráfico de pasajeros
                new Chart(document.getElementById('pasajerosChart'), {
                    type: 'line',
                    data: {
                        labels: simulationData.horas,
                        datasets: [{
                            label: 'Pasajeros',
                            data: simulationData.pasajeros,
                            backgroundColor: 'rgba(59, 130, 246, 0.5)',
                            borderColor: 'rgba(59, 130, 246, 1)',
                            borderWidth: 2,
                            tension: 0.1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Gráfico de acciones
                new Chart(document.getElementById('accionesChart'), {
                    type: 'doughnut',
                    data: {
                        labels: Object.keys(simulationData.acciones),
                        datasets: [{
                            data: Object.values(simulationData.acciones),
                            backgroundColor: [
                                'rgba(16, 185, 129, 0.7)',
                                'rgba(239, 68, 68, 0.7)'
                            ]
                        }]
                    }
                });
            });
        });
    </script>
@endpush
