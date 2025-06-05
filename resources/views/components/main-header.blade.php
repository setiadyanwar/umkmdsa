<header class="relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <!-- Navigation -->
        <nav class="flex flex-row justify-between items-center py-10">

            <!-- Logo -->
            <img src="{{ asset('images/dpma-logo.png') }}" class="w-[253px] md:w-[253px]" alt="dpma-logo">
            <ul class="hidden md:flex flex-row space-x-8 lg:space-x-16">
                <li class="group">
                    <a href="#"
                        class="text-white border-b-2 border-transparent group-hover:border-blue-500 transition duration-300">
                        Beranda
                    </a>
                </li>
                <li class="group">
                    <a href="#"
                        class="text-white border-b-2 border-transparent group-hover:border-blue-500 transition duration-300">Etalase</a>
                </li>
                <li class="group">
                    <a href="#"
                        class="text-white border-b-2 border-transparent group-hover:border-blue-500 transition duration-300">UMKM
                        Binaan</a>
                </li>
                {{-- <li class="group">
                    <a href="#"
                        class="text-white border-b-2 border-transparent group-hover:border-blue-500 transition duration-300">Tentang
                        Kami</a>
                </li> --}}
            </ul>


            <button class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </nav>
    </div>
</header>
