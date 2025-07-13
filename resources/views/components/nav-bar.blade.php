<nav
    class="fixed top-0 z-50 w-full bg-white/95 backdrop-blur-sm border-b border-gray-200/50 shadow-sm dark:bg-gray-900/95 dark:border-gray-700/50">
    <div class="px-4 py-3 lg:px-6">
        <div class="flex items-center justify-between">
            {{-- Izquierda: Botón del menú y logo --}}
            <div class="flex items-center justify-start rtl:justify-end">
                {{-- Botón para abrir el sidebar en móviles --}}
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2.5 text-gray-500 rounded-xl sm:hidden hover:bg-gradient-to-r hover:from-red-50 hover:to-red-100 hover:text-[#790D0D] focus:outline-none focus:ring-2 focus:ring-[#790D0D]/20 transition-all duration-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                {{-- Logo mejorado --}}
                <a href="{{ route('dashboard') }}" class="flex ms-3 md:me-24 items-center gap-3 group">
                    <div class="relative">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-[#790D0D] to-red-600 rounded-xl blur-sm opacity-20 group-hover:opacity-30 transition-opacity duration-300">
                        </div>
                        <div class="relative bg-gradient-to-r from-[#790D0D] to-red-600 p-2.5 rounded-xl shadow-sm">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.22.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <span
                            class="text-xl font-bold bg-gradient-to-r from-[#790D0D] to-red-600 bg-clip-text text-transparent dark:text-white">
                            Peru Bus
                        </span>
                        <span class="text-xs text-gray-500 font-medium tracking-wide dark:text-gray-400">
                            Dashboard
                        </span>
                    </div>
                </a>
            </div>

            {{-- Centro: Breadcrumb/Status (opcional) --}}
            <div class="hidden md:flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                </svg>
                <span class="font-medium">Sistema Online</span>
            </div>

            {{-- Derecha: Notificaciones y Usuario --}}
            <div class="flex items-center space-x-3">
                {{-- Botón de notificaciones --}}
                <button type="button"
                    class="relative p-2.5 text-gray-500 rounded-xl hover:bg-gradient-to-r hover:from-gray-50 hover:to-gray-100 hover:text-[#790D0D] focus:outline-none focus:ring-2 focus:ring-[#790D0D]/20 transition-all duration-200 dark:text-gray-400 dark:hover:bg-gray-700">
                    <span class="sr-only">View notifications</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-5 5v-5zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{-- Indicador de notificación --}}
                    <div class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full animate-pulse"></div>
                </button>

                {{-- Separador --}}
                <div class="hidden sm:block w-px h-6 bg-gray-200 dark:bg-gray-600"></div>

                {{-- Menú de usuario --}}
                <div class="flex items-center relative">
                    <button type="button"
                        class="flex items-center space-x-3 p-1.5 bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl hover:from-red-50 hover:to-red-100 focus:ring-2 focus:ring-[#790D0D]/20 transition-all duration-200 dark:from-gray-800 dark:to-gray-700 dark:hover:bg-gray-600"
                        aria-expanded="false" data-dropdown-toggle="dropdown-user">
                        <img class="w-8 h-8 rounded-lg border-2 border-white shadow-sm object-cover"
                            src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                        <div class="hidden sm:flex flex-col items-start">
                            <span class="text-sm font-semibold text-gray-900 dark:text-white">Arón Magallanes</span>
                            <span class="text-xs text-gray-500 dark:text-gray-400">Administrador</span>
                        </div>
                        <svg class="hidden sm:block w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    {{-- Menú desplegable mejorado --}}
                    <div class="z-50 hidden my-4 text-base list-none bg-white/95 backdrop-blur-sm divide-y divide-gray-100 rounded-xl shadow-lg border border-gray-200/50 dark:bg-gray-800/95 dark:divide-gray-600 dark:border-gray-700/50"
                        id="dropdown-user">
                        <div class="px-4 py-3 bg-gradient-to-r from-gray-50/50 to-transparent rounded-t-xl">
                            <div class="flex items-center space-x-3">
                                <img class="w-10 h-10 rounded-lg border-2 border-white shadow-sm object-cover"
                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                    alt="user photo">
                                <div>
                                    <p class="text-sm font-semibold text-gray-900 dark:text-white">Neil Sims</p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-300">
                                        neil.sims@flowbite.com
                                    </p>
                                    <span
                                        class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 mt-1">
                                        Administrador
                                    </span>
                                </div>
                            </div>
                        </div>
                        <ul class="py-2">
                            <li>
                                <a href="#"
                                    class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-red-50 hover:to-red-100 hover:text-[#790D0D] transition-all duration-200 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 5a2 2 0 012-2h4a2 2 0 012 2v1H8V5z" />
                                    </svg>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-red-50 hover:to-red-100 hover:text-[#790D0D] transition-all duration-200 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Mi Perfil
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-red-50 hover:to-red-100 hover:text-[#790D0D] transition-all duration-200 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Configuración
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-red-50 hover:to-red-100 hover:text-[#790D0D] transition-all duration-200 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                                    </svg>
                                    Finanzas
                                </a>
                            </li>
                            <li class="border-t border-gray-100 dark:border-gray-600 mt-2 pt-2">
                                <a href="#"
                                    class="flex items-center px-4 py-2.5 text-sm text-red-600 hover:bg-gradient-to-r hover:from-red-50 hover:to-red-100 hover:text-red-700 transition-all duration-200 dark:text-red-400 dark:hover:bg-red-900/20">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Cerrar Sesión
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
