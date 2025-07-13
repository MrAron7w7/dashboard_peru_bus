@extends('components.layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-10 px-4">
        <h1 class="text-4xl font-bold text-[#790D0D] mb-10">
            🕒 Tiempos de Tramo por Ruta
        </h1>

        @forelse ($tramos as $idRuta => $tramosRuta)
            <div class="mb-12">
                <h2 class="text-2xl font-semibold text-[#790D0D] mb-6 border-b pb-2">
                    🚍 Ruta: {{ $tramosRuta->first()->ruta->nombre ?? 'Ruta desconocida' }}
                </h2>

                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($tramosRuta as $tramo)
                        <div
                            class="bg-white rounded-2xl shadow-lg p-6 border-t-4 border-[#790D0D] hover:scale-[1.02] transition-transform duration-200">
                            <div class="flex flex-col gap-4">
                                <div>
                                    <p class="text-sm text-gray-500">🚏 Origen:</p>
                                    <p class="text-lg font-semibold text-gray-800">
                                        {{ $tramo->origen->nombre }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">📍 Destino:</p>
                                    <p class="text-lg font-semibold text-gray-800">
                                        {{ $tramo->destino->nombre }}
                                    </p>
                                </div>

                                <div class="flex items-center justify-between pt-2 mt-auto border-t">
                                    <span class="text-sm text-gray-500">Tiempo estimado</span>
                                    <span class="text-xl font-bold text-[#790D0D] flex items-center gap-1">
                                        ⏱ {{ $tramo->tiempo_estimado_min }} min
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            <div class="text-center text-gray-500 text-lg">
                No hay tiempos de tramo registrados.
            </div>
        @endforelse
    </div>
@endsection
