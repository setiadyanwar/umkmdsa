<header id="main-header"
    class="fixed top-0 left-0 w-full z-50 transition-colors duration-300 ease-in-out"
    data-page="{{ $currentRoute ?? Route::currentRouteName() }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <nav class="flex flex-row justify-between items-center py-6 transition-all duration-300 ease-in-out">
            <img id="nav-logo"
                src="{{ asset('images/dpma-logo.png') }}"
                data-default-logo="{{ asset('images/dpma-logo.png') }}"
                data-dark-logo="{{ asset('images/dpma-logo-dark.png') }}"
                class="w-[200px] md:w-[253px] transition-all duration-300 ease-in-out"
                alt="dpma-logo">

            <ul class="hidden md:flex flex-row space-x-8 lg:space-x-16">
                @foreach ([
                    'homepage' => 'Beranda',
                    'etalase' => 'Etalase',
                    'umkm-binaan' => 'UMKM Binaan',
                ] as $route => $label)
                    <li class="group relative">
                        <a href="{{ route($route) }}"
                            class="nav-link relative transition-all duration-300 pb-2 {{ $currentRoute === $route ? 'font-semibold' : 'hover:text-blue-700' }}"
                            data-route="{{ $route }}">
                            {{ $label }}
                            <span class="nav-indicator absolute bottom-0 left-0 h-0.5 transition-all duration-300 ease-out {{ $currentRoute === $route ? 'w-full' : 'w-0' }}"></span>
                        </a>
                    </li>
                @endforeach
            </ul>

            <button id="mobile-menu-button"
                class="md:hidden transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </nav>

        <div id="mobile-menu" class="md:hidden hidden pb-6">
            <ul class="flex flex-col space-y-4">
                @foreach ([
                    'homepage' => 'Beranda',
                    'etalase' => 'Etalase',
                    'umkm-binaan' => 'UMKM Binaan',
                ] as $route => $label)
                    <li class="group">
                        <a href="{{ route($route) }}"
                            class="mobile-nav-link block py-2 transition-all duration-300 {{ $currentRoute === $route ? 'font-semibold border-l-4 pl-2' : '' }}"
                            data-route="{{ $route }}">
                            {{ $label }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</header>

<script src="{{ asset('js/header.js') }}" defer></script>
