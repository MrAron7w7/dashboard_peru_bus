@php
    $colorClasses = [
        'red' => 'text-red-400 border border-red-700 hover:bg-red-700 hover:text-white focus:ring-red-300',
        'blue' => 'text-blue-400 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-blue-300',
        'green' => 'text-green-400 border border-green-700 hover:bg-green-700 hover:text-white focus:ring-green-300',
        'yellow' =>
            'text-yellow-400 border border-yellow-700 hover:bg-yellow-700 hover:text-white focus:ring-yellow-300',
        'gray' => 'text-gray-400 border border-gray-700 hover:bg-gray-700 hover:text-white focus:ring-gray-300',
    ];
@endphp

<a href="{{ $href }}"
    class="{{ $colorClasses[$color] ?? $colorClasses['red'] }} 
        focus:ring-4 focus:outline-none font-medium rounded-sm text-sm p-0.5 text-center inline-flex items-center">
    <x-dynamic-component :component="'antdesign-' . $icon" class="w-5 h-5" />
    <span class="sr-only">Icon description</span>
</a>
