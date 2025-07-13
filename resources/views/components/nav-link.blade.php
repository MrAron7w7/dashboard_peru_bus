@props([
    'href' => '#',
    'icon' => null,
    'active' => false,
    'text' => '',
])

<a href="{{ $href }}" wire:navigate
    class="group flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-all duration-200 {{ $active ? 'bg-gray-100 dark:bg-blue-900/50 text-[#790D0D] dark:text-[#790D0D]/30 border-r-2 border-[#790D0D]' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white' }}">
    @if ($icon)
        <x-dynamic-component :component="$icon"
            class="w-5 h-5 mr-3 {{ $active ? 'text-[#790D0D] dark:text-blue-400' : 'text-gray-400 group-hover:text-gray-500' }}" />
    @endif
    {{ $text }}
</a>
