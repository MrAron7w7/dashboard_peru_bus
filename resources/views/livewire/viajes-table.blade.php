<div class="mt-4">
    <!-- Toast Notification -->
    @if (session()->has('message'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
            {{ session('message') }}
        </div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        {{-- Filtro y búsqueda --}}
        <div>
            {{-- Loader --}}
            <div wire:loading wire:target="search" class="flex items-center gap-2 text-sm text-gray-500 mt-2">
                <x-antdesign-loading-3-quarters-o class="animate-spin h-5 w-5 text-red-600" />
                <p>Buscando viajes...</p>
            </div>

            {{-- Input de búsqueda --}}
            <div class="relative w-full sm:w-auto mb-4">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <x-antdesign-search-o class="w-5 h-5 text-gray-500" />
                </div>
                <input type="text" wire:model="search"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full sm:w-80 bg-gray-50 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                    placeholder="Buscar viajes...">
            </div>

            {{-- Tabla --}}
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">ID Viaje</th>
                        <th class="px-6 py-3">Ruta</th>
                        <th class="px-6 py-3">Bus</th>
                        <th class="px-6 py-3">Conductor</th>
                        <th class="px-6 py-3">Fecha</th>
                        <th class="px-6 py-3">Hora Salida</th>
                        <th class="px-6 py-3">Hora Llegada</th>
                        <th class="px-6 py-3">Estado</th>
                        <th class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($viajes as $viaje)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 text-gray-900 dark:text-white">{{ $viaje->id_viaje }}</td>
                            <td class="px-6 py-4">{{ $viaje->ruta->nombre }}</td>
                            <td class="px-6 py-4">{{ $viaje->bus->placa }}</td>
                            <td class="px-6 py-4">{{ $viaje->conductor->nombre }}</td>
                            <td class="px-6 py-4">{{ $viaje->fecha }}</td>
                            <td class="px-6 py-4">{{ $viaje->hora_salida }}</td>
                            <td class="px-6 py-4">{{ $viaje->hora_llegada }}</td>
                            <td class="px-6 py-4">{{ $viaje->estado }}</td>
                            <td class="px-6 py-4 gap-2 flex">
                                <x-icon-button href="{{ route('viajes.edit', $viaje) }}" icon="edit-o"
                                    color="blue" />

                                <!-- Botón de eliminar con Livewire -->
                                <button wire:click="deleteViaje({{ $viaje->id_viaje }})"
                                    wire:confirm="¿Estás seguro de que deseas eliminar esta ruta?" type="button">
                                    <x-icon-button icon="delete" color="red" />
                                </button>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center px-6 py-4">No se encontraron resultados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Paginación --}}
            <div class="p-4">
                {{ $viajes->links() }}
            </div>
        </div>
    </div>
</div>
