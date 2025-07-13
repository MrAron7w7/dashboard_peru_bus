<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">

            {{-- Dashboard --}}
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 rounded-lg group
                    {{ request()->routeIs('dashboard') ? 'bg-[#790D0D] text-white' : 'text-gray-900 hover:bg-[#FBECEC]' }}">
                    <x-antdesign-dashboard-o
                        class="w-6 h-6 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-[#790D0D]' }}" />
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            {{-- Rutas --}}
            <li>
                <a href="{{ route('rutas.index') }}"
                    class="flex items-center p-2 rounded-lg group
                    {{ request()->routeIs('rutas.*') ? 'bg-[#790D0D] text-white' : 'text-gray-900 hover:bg-[#FBECEC]' }}">
                    <x-antdesign-vertical-align-top-o
                        class="w-6 h-6 {{ request()->routeIs('rutas.*') ? 'text-white' : 'text-[#790D0D]' }}" />
                    <span class="ms-3">Rutas</span>
                </a>
            </li>

            {{-- Buses --}}
            <li>
                <a href="{{ route('buses.index') }}"
                    class="flex items-center p-2 rounded-lg group
                    {{ request()->routeIs('buses.*') ? 'bg-[#790D0D] text-white' : 'text-gray-900 hover:bg-[#FBECEC]' }}">
                    <x-antdesign-car-o
                        class="w-6 h-6 {{ request()->routeIs('buses.*') ? 'text-white' : 'text-[#790D0D]' }}" />
                    <span class="ms-3">Buses</span>
                </a>
            </li>

            {{-- Conductores --}}
            <li>
                <a href="{{ route('conductores.index') }}"
                    class="flex items-center p-2 rounded-lg group
                    {{ request()->routeIs('conductores.*') ? 'bg-[#790D0D] text-white' : 'text-gray-900 hover:bg-[#FBECEC]' }}">
                    <x-antdesign-user-o
                        class="w-6 h-6 {{ request()->routeIs('conductores.*') ? 'text-white' : 'text-[#790D0D]' }}" />
                    <span class="ms-3">Conductores</span>
                </a>
            </li>

            {{-- Horarios --}}
            <li>
                <a href="{{ route('horarios.index') }}"
                    class="flex items-center p-2 rounded-lg group
                    {{ request()->routeIs('horarios.*') ? 'bg-[#790D0D] text-white' : 'text-gray-900 hover:bg-[#FBECEC]' }}">
                    <x-antdesign-clock-circle-o
                        class="w-6 h-6 {{ request()->routeIs('horarios.*') ? 'text-white' : 'text-[#790D0D]' }}" />
                    <span class="ms-3">Horarios</span>
                </a>
            </li>

            {{-- Viajes --}}
            <li>
                <a href="{{ route('viajes.index') }}"
                    class="flex items-center p-2 rounded-lg group
                    {{ request()->routeIs('viajes.*') ? 'bg-[#790D0D] text-white' : 'text-gray-900 hover:bg-[#FBECEC]' }}">
                    <x-antdesign-swap-o
                        class="w-6 h-6 {{ request()->routeIs('viajes.*') ? 'text-white' : 'text-[#790D0D]' }}" />
                    <span class="ms-3">Viajes</span>
                </a>
            </li>

            {{-- Tiempos Tramos --}}
            <li>
                <a href="{{ route('tiempos-tramos.index') }}"
                    class="flex items-center p-2 rounded-lg group
                    {{ request()->routeIs('tiempos-tramos.*') ? 'bg-[#790D0D] text-white' : 'text-gray-900 hover:bg-[#FBECEC]' }}">
                    <x-antdesign-field-time-o
                        class="w-6 h-6 {{ request()->routeIs('tiempos-tramos.*') ? 'text-white' : 'text-[#790D0D]' }}" />
                    <span class="ms-3">Tiempos Tramos</span>
                </a>
            </li>

            {{-- Pasajeros
            <li>
                <a href="{{ route('pasajeros.index') }}"
                    class="flex items-center p-2 rounded-lg group
                    {{ request()->routeIs('pasajeros.*') ? 'bg-[#790D0D] text-white' : 'text-gray-900 hover:bg-[#FBECEC]' }}">
                    <x-antdesign-team-o
                        class="w-6 h-6 {{ request()->routeIs('pasajeros.*') ? 'text-white' : 'text-[#790D0D]' }}" />
                    <span class="ms-3">Pasajeros</span>
                </a>
            </li> --}}

        </ul>
    </div>
</aside>
