@props([
    'type' => session('toast.type', 'info'), // success | error | warning | info
    'message' => session('toast.message'),
])

@php
    $colors = [
        'success' => 'bg-green-100 text-green-800',
        'error' => 'bg-red-100 text-red-800',
        'warning' => 'bg-yellow-100 text-yellow-800',
        'info' => 'bg-blue-100 text-blue-800',
    ];

    $icons = [
        'success' => 'check-circle-o',
        'error' => 'close-circle-o',
        'warning' => 'warning--o',
        'info' => 'info-circle-o',
    ];
@endphp

@if ($message)
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
        class="fixed top-5 right-5 z-50 w-auto max-w-sm flex items-center gap-3 p-4 rounded shadow {{ $colors[$type] }}">
        <x-dynamic-component :component="'antdesign-' . $icons[$type]" class="w-6 h-6" />

        <span class="text-sm font-medium">{{ $message }}</span>

        <button @click="show = false" class="ml-auto text-lg font-bold focus:outline-none">&times;</button>
    </div>
@endif
