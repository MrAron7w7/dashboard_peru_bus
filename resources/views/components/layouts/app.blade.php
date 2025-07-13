<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Dashboard Peru bus') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Cambio de icono --}}
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/x-icon">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    @livewireStyles
</head>

<body>
    <div>
        {{-- SIDEBAR APP --}}
        <x-nav-bar />

        <x-side-bar />

        <!-- Page Content -->
        <main class="p-4 sm:ml-64">
            <div class="p-4 mt-14">
                @yield('content')
            </div>
        </main>
    </div>


    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- aLPINE JS --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

</body>

</html>
