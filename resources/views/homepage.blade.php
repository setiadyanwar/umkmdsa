@extends('layouts.main-app')

@section('title', 'Portal UMKM Binaan DSA - IPB')

@section('content')
    <!-- Header & Navigation -->
    <section class="bg-cover bg-center -mt-4" style="background-image: url('{{ asset('images/hero.png') }}' )">
        <header class="relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">

                <!-- Navigation -->
                <nav class="flex flex-row justify-between items-center py-10">

                    <!-- Logo -->
                    <img src="{{ asset('images/dpma-logo.png') }}" class="w-[253px] md:w-[253px] ml-5" alt="dpma-logo">
                    <ul class="hidden md:flex flex-row space-x-8 lg:space-x-16">
                        <li class="group">
                            <a href="{{ route('homepage') }}"
                                class="text-white border-b-2 border-transparent group-hover:border-blue-500 transition duration-300">
                                Beranda
                            </a>
                        </li>
                        <li class="group">
                            <a href="{{ route('etalase') }}"
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

        {{-- Hero section --}}
        <section class="pt-6 md:pt-10 pb-16 md:pb-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="w-full md:w-1/2">
                        <div class="mb-4 text-sm md:text-base font-medium">120+ UMKM binaan aktif</div>
                        <h1 class="text-3xl md:text-4xl lg:text-5xl font-medium mb-4 md:mb-6">
                            Mendorong UMKM<br>
                            Tumbuh Bersama<br>
                            Teknologi & Inovasi
                        </h1>
                        <p class="text-gray-300 mb-6 md:mb-8 text-sm md:text-base">
                            Portal resmi UMKM binaan DSA - IPB. Temukan produk unggulan, kisah
                            inspiratif, dan peluang kolaborasi untuk pertumbuhan usaha yang
                            berkelanjutan.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 sm:gap-4 w-full sm:w-auto justify-content items-start">
                            <a href="#"
                                class="bg-[#113EA1] hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-2xl inline-flex items-center transition">
                                Telusuri UMKM
                                <img src="{{ asset('images/arrow.png') }}" style="width: 24px; height: auto;" class="ml-2"
                                    alt="">
                            </a>
                            <a href="#"
                                class="bg-transparent border border-white text-white font-medium py-3 px-6 rounded-2xl inline-flex items-center hover:bg-white/10 transition flex-row">
                                Daftarkan usahamu
                                <img src="{{ asset('images/whatsapp.png') }}" style="width: 24px; height: auto;"
                                    class="ml-2" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="max-w-4xl mx-auto mt-8 md:mt-0">
                        <div class="flex gap-4">

                            <div class="flex-[3] z-40">
                                <img src="{{ asset('images/artist-painting.png') }}" alt="Artist painting"
                                    class="w-full h-[300px] md:h-[420px] object-cover rounded-lg" />
                            </div>

                            <div class="flex-[2] flex flex-col gap-y-4 z-10 -ml-6 md:-ml-10">
                                <div class="h-[140px] md:h-[200px]">
                                    <img src="{{ asset('images/colorful-craft.png') }}" alt="Colorful craft"
                                        class="w-full h-full object-cover rounded-lg" />
                                </div>
                                <div class="h-[140px] md:h-[200px]">
                                    <img src="{{ asset('images/textile-craft.png') }}" alt="Textile craft"
                                        class="w-full h-full object-cover rounded-lg" />
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </section>


        <!-- Programs Section -->
        <section
            class="relative py-16 md:py-20 bg-linear-to-t from-[#04112F] via-[#04112F] to-transparent bg-gradient-to-b from-transparent to-white">
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 z-20">
                <div class="text-center mb-12">
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold mb-3 md:mb-4 text-white">Program Pelatihan
                        UMKM Terlaksana</h2>
                    <p class="text-gray-300 max-w-2xl mx-auto text-sm md:text-base">
                        UMKM Binaan DSA dibekali ilmu yang membantu mereka berkembang
                        hingga mendapatkan keuntungan yang luar biasa.
                    </p>
                </div>

                <div class="flex flex-col md:flex-row gap-6 justify-center relative z-30">

                    <div
                        class="flex flex-row bg-white rounded-3xl shadow p-4 md:p-5 w-full md:w-1/3 min-h-[160px] md:min-h-[180px] relative">
                        <div class="flex flex-col justify-between h-full flex-1">
                            <div>
                                <span class="text-xs text-gray-400 absolute top-4 left-5">01</span>
                                <h3 class="text-lg font-semibold text-black mb-1 mt-6">Kegiatan Membantu Sesama</h3>
                                <p class="text-gray-400 text-sm">Uluran tangan untuk semua.</p>
                            </div>
                            <div class="absolute bottom-4 left-5">
                                <a href="#" class="text-[#113EA1] text-xs hover:underline flex items-center">
                                    <svg class="w-6 h-6 stroke-[#113EA1]" viewBox="0 0 24 24" fill="none"
                                        stroke-width="1.5">
                                        <path d="M7 17L17 7M17 7H7M17 7V17" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="flex items-center ml-4">
                            <img src="{{ asset('images/textile-craft.png') }}" alt="Kegiatan Membantu Sesama"
                                class="w-24 h-24 sm:w-28 sm:h-28 md:w-32 md:h-32 lg:w-36 lg:h-36 object-cover rounded-xl" />
                        </div>
                    </div>

                    <div
                        class="flex flex-row bg-white rounded-3xl shadow p-4 md:p-5 w-full md:w-1/3 min-h-[160px] md:min-h-[180px] relative">
                        <div class="flex flex-col justify-between h-full flex-1">
                            <div>
                                <span class="text-xs text-gray-400 absolute top-4 left-5">02</span>
                                <h3 class="text-lg font-semibold text-black mb-1 mt-6">Kegiatan Membantu Sesama
                                </h3>
                                <p class="text-gray-400 text-sm">Uluran tangan untuk semua.</p>
                            </div>
                            <div class="absolute bottom-4 left-5">
                                <a href="#" class="text-[#113EA1] text-xs hover:underline flex items-center">
                                    <svg class="w-6 h-6 stroke-[#113EA1]" viewBox="0 0 24 24" fill="none"
                                        stroke-width="1.5">
                                        <path d="M7 17L17 7M17 7H7M17 7V17" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="flex items-center ml-4">
                            <img src="{{ asset('images/textile-craft.png') }}" alt="Kegiatan Membantu Sesama"
                                class="w-24 h-24 sm:w-28 sm:h-28 md:w-32 md:h-32 lg:w-36 lg:h-36 object-cover rounded-xl" />
                        </div>
                    </div>

                    <div
                        class="flex flex-row bg-white rounded-3xl shadow p-4 md:p-5 w-full md:w-1/3 min-h-[160px] md:min-h-[180px] relative">
                        <div class="flex flex-col justify-between h-full flex-1">
                            <div>
                                <span class="text-xs text-gray-400 absolute top-4 left-5">03</span>
                                <h3 class="text-lg font-semibold text-black mb-1 mt-6">Kegiatan Membantu Sesama
                                </h3>
                                <p class="text-gray-400 text-sm">Uluran tangan untuk semua.</p>
                            </div>
                            <div class="absolute bottom-4 left-5">
                                <a href="#" class="text-[#113EA1] text-xs hover:underline flex items-center">
                                    <svg class="w-6 h-6 stroke-[#113EA1]" viewBox="0 0 24 24" fill="none"
                                        stroke-width="1.5">
                                        <path d="M7 17L17 7M17 7H7M17 7V17" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="flex items-center ml-4">
                            <img src="{{ asset('images/textile-craft.png') }}" alt="Kegiatan Membantu Sesama"
                                class="w-24 h-24 sm:w-28 sm:h-28 md:w-32 md:h-32 lg:w-36 lg:h-36 object-cover rounded-xl" />
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="absolute left-0 bottom w-full h-32 sm:h-40 md:h-52 lg:h-64 pointer-events-none z-10 transform -translate-y-10 md:-translate-y-16 lg:-translate-y-20">
                <img src="{{ asset('images/mask.png') }}" alt="Background Mask" class="w-full h-full object-cover">
            </div>
        </section>

    </section>

    {{-- descriptions section --}}
    <section
        class="flex flex-col md:flex-row bg-white justify-content items-center max-w-7xl mx-auto px-4 sm:px-6 pt-16 md:pt-24">
        <div class="w-full md:w-3/5 pl-0 md:pl-8 mb-8 md:mb-0">
            <img class="w-full max-w-[600px] h-auto" src="{{ asset('images/image-mentor.png') }}" alt="">
        </div>
        <div class="max-w-md ">
            <div class="flex-none z-10 py-20 md:w-5/5">
                <div>

                    <div class="mb-4">
                        <div class="inline-flex items-center gap-2 border-2 border-[#113EA1] rounded-full px-4 py-2">
                            <div class="w-5 h-5  rounded-full flex items-center justify-center">
                                <img src="{{ asset('images/ipb-small.png') }}" alt="">

                            </div>
                            <span class="text-[#113EA1] font-medium text-sm">Tentang DSA</span>
                        </div>
                    </div>

                    <h1 class="text-3xl font-bold text-gray-900 mb-6">
                        Apa itu DSA IPB?
                    </h1>

                    <p class="text-gray-600 text-base leading-relaxed mb-8">
                        DSA (Digital Signature Algorithm) IPB adalah program pendampingan dan pemberdayaan UMKM
                        berbasis
                        teknologi digital, khususnya dalam penerapan tanda tangan digital dan sistem informasi untuk
                        meningkatkan daya saing usaha kecil menengah.
                    </p>

                    <div class="grid grid-cols-2 gap-4 mb-8">

                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 w-6 h-6  rounded-full flex items-center justify-center mt-0.5">
                                <img src="{{ asset('images/verified.png') }}" alt="">
                            </div>
                            <p class="text-gray-800 text-sm font-medium">
                                Memberikan pelatihan intensif
                            </p>
                        </div>


                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 w-6 h-6  rounded-full flex items-center justify-center mt-0.5">
                                <img src="{{ asset('images/verified.png') }}" alt="">
                            </div>
                            <p class="text-gray-800 text-sm font-medium">
                                Mementori bisnis hingga sukses
                            </p>
                        </div>

                        <!-- Feature 3 -->
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 w-6 h-6  rounded-full flex items-center justify-center mt-0.5">
                                <img src="{{ asset('images/verified.png') }}" alt="">
                            </div>
                            <p class="text-gray-800 text-sm font-medium">
                                Membantu upgrade usaha
                            </p>
                        </div>

                        <!-- Feature 4 -->
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 w-6 h-6  rounded-full flex items-center justify-center mt-0.5">
                                <img src="{{ asset('images/verified.png') }}" alt="">
                            </div>
                            <p class="text-gray-800 text-sm font-medium">
                                Membantu pengajuan legalitas usaha
                            </p>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <button
                        class="w-full bg-[#113EA1] hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-3xl transition-colors duration-200">
                        Selengkapnya
                    </button>
                </div>
            </div>
        </div>
        </div>

        </div>
    </section>

    {{-- Video section --}}
    <section class="justify-content items-center py-8 sm:py-12 max-w-7xl lg:py-14 mx-auto sm:px-6 mb-12">
        <div class="">
            <div class="flex flex-col lg:flex-row gap-4 lg:gap-6">
                {{-- video 1 --}}
                <div class="w-full lg:w-2/3">
                    <div class="rounded-lg  p-2 sm:p-3">
                        <div class="relative w-full" style="padding-bottom: 56.25%; /* 16:9 aspect ratio */">
                            <iframe class="absolute top-0 left-0 w-full h-full rounded-lg"
                                src="https://www.youtube.com/embed/iIO6Yy36iFU" title="Studium Generale Video"
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>

                {{-- video 2 --}}
                <div class="w-full lg:w-1/3">
                    <div class=" rounded-lg  p-2 sm:p-3">
                        <div class="relative w-full" style="padding-bottom: 117.60%; /* 16:9 aspect ratio */">
                            <iframe class="absolute top-0 left-0 w-full h-full rounded-lg"
                                src="https://www.youtube.com/embed/iIO6Yy36iFU" title="Live Speaker View" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    {{-- product highlight section --}}
    <section class="py-8 sm:py-12 max-w-7xl lg:py-14 mx-auto sm:px-6 mb-16">
        <div class="container mx-auto max-w-7xl">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4 px-4">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Produk Unggulan UMKM</h1>
                    <p class="text-gray-600 text-lg">Jelajahi berbagai produk UMKM terdaftar</p>
                    <div class="w-16 h-1 bg-gradient-to-r from-blue-600 to-[#113EA1] mt-3 rounded-full"></div>
                </div>
                <button
                    class="border-2 border-[#113EA1] text-[#113EA1] px-6 py-3 rounded-3xl hover:bg-[#113EA1] hover:text-white transition-all duration-300 font-semibold">
                    Lihat Semua
                </button>
            </div>


            <div class="bg-white rounded-xl sm:rounded-2xl overflow-hidden">
                <div class="flex flex-col lg:flex-row min-h-[400px] lg:h-[470px] ">

                    <div class="w-full lg:w-80 h-64 sm:h-1/2 lg:h-full relative bg-[#113EA1] flex-shrink-0 ">
                        <div class="absolute inset-0 bg-white bg-opacity-30">
                            <img src="{{ asset('images/bg-display-product.png') }}" alt="UMKM Background"
                                class="w-full h-full object-cover sm:object-contain md:object-none lg:object-cover">
                        </div>
                        <div class="relative z-10 h-full flex flex-col justify-center px-6 lg:px-5">
                            <div class="text-center lg:text-left lg:mb-12">
                                <h2 class="text-white text-3xl sm:text-4xl font-bold leading-tight mb-2">500+
                                    Produk
                                    Terdaftar</h2>
                                <p class="text-white text-lg mb-6">Daftarkan usahamu sekarang juga!</p>
                                <button
                                    class="px-5 py-2.5 rounded-xl border-2 border-white text-white hover:bg-white hover:text-[#113EA1] transition-all duration-300 font-semibold shadow-md">
                                    Daftar Disini
                                </button>
                            </div>
                        </div>
                    </div>


                    <div class="flex-1 h-auto lg:h-[500px] overflow-hidden hide-scrollbar px-4">
                        <div class="w-full h-full overflow-y-auto lg:overflow-x-auto p-4 hide-scrollbar">
                            <div class="flex flex-nowrap lg:flex-row gap-4 lg:gap-6 h-full lg:items-center ">

                                 {{-- product card --}}
                                <div
                                    class="bg-white rounded-2xl border border-gray-100 hover:border-[#113EA1] hover:shadow-[0_8px_30px_rgb(0,0,0,0.12)] transition-all duration-300 flex-shrink-0 w-full lg:w-80 h-auto lg:h-[420px] hover:-translate-y-1 cursor-pointer">
                                    <div class="p-5 h-full flex flex-col">
                                        <div class="mb-6 flex justify-center">
                                            <div class="w-75 h-70 bg-gray-50 rounded-xl overflow-hidden">
                                                <img src="{{ asset('images/bag.png') }}" alt="Celyne Rattan Bag"
                                                    class="w-full h-full object-cover" />
                                            </div>
                                        </div>
                                        <div class="mt-auto">
                                            <h3 class="font-semibold text-gray-900 mb-2 text-sm leading-tight">Celyne
                                                Rattan Bag</h3>
                                            <p class="text-[#113EA1] font-bold text-lg mb-3">Rp.180.000</p>
                                            <div class="flex items-center text-gray-400 text-xs">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span>Kabupaten Gowa</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div
                                    class="bg-white rounded-2xl border border-gray-100 hover:border-[#113EA1] hover:shadow-[0_8px_30px_rgb(0,0,0,0.12)] transition-all duration-300 flex-shrink-0 w-full lg:w-80 h-auto lg:h-[420px] hover:-translate-y-1 cursor-pointer">
                                    <div class="p-5 h-full flex flex-col">
                                        <div class="mb-6 flex justify-center">
                                            <div class="w-75 h-70 bg-gray-50 rounded-xl overflow-hidden">
                                                <img src="{{ asset('images/bag.png') }}" alt="Celyne Rattan Bag"
                                                    class="w-full h-full object-cover" />
                                            </div>
                                        </div>
                                        <div class="mt-auto">
                                            <h3 class="font-semibold text-gray-900 mb-2 text-sm leading-tight">Celyne
                                                Rattan Bag</h3>
                                            <p class="text-[#113EA1] font-bold text-lg mb-3">Rp.180.000</p>
                                            <div class="flex items-center text-gray-400 text-xs">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span>Kabupaten Gowa</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div
                                    class="bg-white rounded-2xl border border-gray-100 hover:border-[#113EA1] hover:shadow-[0_8px_30px_rgb(0,0,0,0.12)] transition-all duration-300 flex-shrink-0 w-full lg:w-80 h-auto lg:h-[420px] hover:-translate-y-1 cursor-pointer">
                                    <div class="p-5 h-full flex flex-col">
                                        <div class="mb-6 flex justify-center">
                                            <div class="w-75 h-70 bg-gray-50 rounded-xl overflow-hidden">
                                                <img src="{{ asset('images/bag.png') }}" alt="Celyne Rattan Bag"
                                                    class="w-full h-full object-cover" />
                                            </div>
                                        </div>
                                        <div class="mt-auto">
                                            <h3 class="font-semibold text-gray-900 mb-2 text-sm leading-tight">Celyne
                                                Rattan Bag</h3>
                                            <p class="text-[#113EA1] font-bold text-lg mb-3">Rp.180.000</p>
                                            <div class="flex items-center text-gray-400 text-xs">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span>Kabupaten Gowa</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div
                                    class="bg-white rounded-2xl border border-gray-100 hover:border-[#113EA1] hover:shadow-[0_8px_30px_rgb(0,0,0,0.12)] transition-all duration-300 flex-shrink-0 w-full lg:w-80 h-auto lg:h-[420px] hover:-translate-y-1 cursor-pointer">
                                    <div class="p-5 h-full flex flex-col">
                                        <div class="mb-6 flex justify-center">
                                            <div class="w-75 h-70 bg-gray-50 rounded-xl overflow-hidden">
                                                <img src="{{ asset('images/bag.png') }}" alt="Celyne Rattan Bag"
                                                    class="w-full h-full object-cover" />
                                            </div>
                                        </div>
                                        <div class="mt-auto">
                                            <h3 class="font-semibold text-gray-900 mb-2 text-sm leading-tight">Celyne
                                                Rattan Bag</h3>
                                            <p class="text-[#113EA1] font-bold text-lg mb-3">Rp.180.000</p>
                                            <div class="flex items-center text-gray-400 text-xs">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span>Kabupaten Gowa</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div
                                    class="bg-white rounded-2xl border border-gray-100 hover:border-[#113EA1] hover:shadow-[0_8px_30px_rgb(0,0,0,0.12)] transition-all duration-300 flex-shrink-0 w-full lg:w-80 h-auto lg:h-[420px] hover:-translate-y-1 cursor-pointer">
                                    <div class="p-5 h-full flex flex-col">
                                        <div class="mb-6 flex justify-center">
                                            <div class="w-75 h-70 bg-gray-50 rounded-xl overflow-hidden">
                                                <img src="{{ asset('images/bag.png') }}" alt="Celyne Rattan Bag"
                                                    class="w-full h-full object-cover" />
                                            </div>
                                        </div>
                                        <div class="mt-auto">
                                            <h3 class="font-semibold text-gray-900 mb-2 text-sm leading-tight">Celyne
                                                Rattan Bag</h3>
                                            <p class="text-[#113EA1] font-bold text-lg mb-3">Rp.180.000</p>
                                            <div class="flex items-center text-gray-400 text-xs">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <span>Kabupaten Gowa</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- Benefit section --}}
    <section class="relative w-full bg-[#e6efff] overflow-hidden px-4 py-12 lg:py-16">
        <!-- Background Map -->
        <div class="absolute inset-0 w-full h-full opacity-30 pointer-events-none flex items-center justify-center">
            <img src="{{ asset('images/map-indonesia.png') }}" alt="Peta Indonesia"
                class="w-full h-full object-contain max-w-5xl mx-auto" />
        </div>

        <!-- Content Container -->
        <div class="relative z-10 max-w-7xl mx-auto">

            <!-- Header Section -->
            <div class="text-center pb-4 md:pb-6">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                    Mengapa Harus Kami?
                </h2>
                <div class="w-20 sm:w-24 h-1 bg-[#113EA1] mx-auto rounded-full"></div>
            </div>

            <!-- Main Image Container -->
            <div class="flex justify-center items-start">
                <div class="relative w-full max-w-6xl">
                    <div class="aspect-[4/3] md:aspect-[16/9] lg:aspect-[3/2] w-full flex justify-center items-center">
                        <img id="fadeImage" src="{{ asset('images/benefit.png') }}" alt="Benefit illustration"
                            class="max-w-full max-h-full object-contain transition-all duration-1000 ease-out opacity-0 transform scale-95"
                            onload="setTimeout(() => {
                             this.classList.remove('opacity-0', 'scale-95');
                             this.classList.add('opacity-100', 'scale-100');
                         }, 100)" />
                    </div>
                </div>
            </div>

        </div>
    </section>


    {{-- testimoni section --}}
    <section class="relative w-full bg-white overflow-hidden max-w-7xl mx-auto sm:px-6 py-12 sm:py-16 lg:py-20">
        <div class="max-w-6xl mx-auto">
            <div class="px-4">
                <!-- Title -->
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-semibold text-gray-800 text-center mb-8 md:mb-12">
                    Apa yang mereka katakan?
                    <div class="w-24 h-1 bg-[#113EA1] mx-auto mt-2 rounded-2xl"></div>
                </h2>
            </div>

            <!-- Scrolling Container -->
            <div class="relative overflow-hidden">
                <div id="scrolling-track" class="flex whitespace-nowrap py-4">
                    <div class="inline-flex animate-scroll">
                        <div
                            class="relative bg-white rounded-lg shadow-md p-4 pt-8 mx-2 w-64 inline-block whitespace-normal">
                            <div class="absolute -top-4 left-3">
                                <div class="w-7 h-7 bg-[#113EA1] rounded-full flex items-center justify-center shadow">
                                    <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex space-x-0.5 mb-2">
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                            </div>

                            <p class="text-gray-700 mb-3 leading-snug text-sm">
                                Setelah mendapatkan pendampingan, kini saya bisa menggunakan tanda tangan digital
                                untuk
                                transaksi dan menjalankan bisnis dengan lebih efisien!
                            </p>
                            <div class="flex items-center border-t pt-3 mt-2">
                                <img class="w-7 h-7 rounded-full mr-3" src="https://i.pravatar.cc/100?img=3"
                                    alt="Justus Menke">
                                <div>
                                    <p class="font-medium text-gray-900 text-sm">Justus Menke</p>
                                    <p class="text-xs text-gray-500">Pemilik Toko Craft</p>
                                </div>
                            </div>
                        </div>


                        <div
                            class="relative bg-white rounded-lg shadow-md p-4 pt-8 mx-2 w-64 inline-block whitespace-normal">
                            <div class="absolute -top-4 left-3">
                                <div class="w-7 h-7 bg-[#113EA1] rounded-full flex items-center justify-center shadow">
                                    <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex space-x-0.5 mb-2">
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                            </div>
                            <p class="text-gray-700 mb-3 leading-snug text-sm">
                                Setelah mendapatkan pendampingan, kini saya bisa menggunakan tanda tangan digital
                                untuk
                                transaksi dan menjalankan bisnis dengan lebih efisien!
                            </p>
                            <div class="flex items-center border-t pt-3 mt-2">
                                <img class="w-7 h-7 rounded-full mr-3" src="https://i.pravatar.cc/100?img=3"
                                    alt="Justus Menke">
                                <div>
                                    <p class="font-medium text-gray-900 text-sm">Justus Menke</p>
                                    <p class="text-xs text-gray-500">Pemilik Toko Craft</p>
                                </div>
                            </div>
                        </div>


                        <div
                            class="relative bg-white rounded-lg shadow-md p-4 pt-8 mx-2 w-64 inline-block whitespace-normal">
                            <div class="absolute -top-4 left-3">
                                <div class="w-7 h-7 bg-[#113EA1] rounded-full flex items-center justify-center shadow">
                                    <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex space-x-0.5 mb-2">
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                            </div>
                            <p class="text-gray-700 mb-3 leading-snug text-sm">
                                Setelah mendapatkan pendampingan, kini saya bisa menggunakan tanda tangan digital
                                untuk
                                transaksi dan menjalankan bisnis dengan lebih efisien!
                            </p>
                            <div class="flex items-center border-t pt-3 mt-2">
                                <img class="w-7 h-7 rounded-full mr-3" src="https://i.pravatar.cc/100?img=3"
                                    alt="Justus Menke">
                                <div>
                                    <p class="font-medium text-gray-900 text-sm">Justus Menke</p>
                                    <p class="text-xs text-gray-500">Pemilik Toko Craft</p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="relative bg-white rounded-lg shadow-md p-4 pt-8 mx-2 w-64 inline-block whitespace-normal">

                            <div class="absolute -top-4 left-3">
                                <div class="w-7 h-7 bg-[#113EA1] rounded-full flex items-center justify-center shadow">
                                    <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex space-x-0.5 mb-2">
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                            </div>
                            <p class="text-gray-700 mb-3 leading-snug text-sm">
                                Setelah mendapatkan pendampingan, kini saya bisa menggunakan tanda tangan digital
                                untuk
                                transaksi dan menjalankan bisnis dengan lebih efisien!
                            </p>
                            <div class="flex items-center border-t pt-3 mt-2">
                                <img class="w-7 h-7 rounded-full mr-3" src="https://i.pravatar.cc/100?img=3"
                                    alt="Justus Menke">
                                <div>
                                    <p class="font-medium text-gray-900 text-sm">Justus Menke</p>
                                    <p class="text-xs text-gray-500">Pemilik Toko Craft</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Duplicated  looping -->
                    <div class="inline-flex animate-scroll" aria-hidden="true">

                        <div
                            class="relative bg-white rounded-lg shadow-md p-4 pt-8 mx-2 w-64 inline-block whitespace-normal">

                            <div class="absolute -top-4 left-3">
                                <div class="w-7 h-7 bg-[#113EA1] rounded-full flex items-center justify-center shadow">
                                    <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex space-x-0.5 mb-2">
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                            </div>

                            <p class="text-gray-700 mb-3 leading-snug text-sm">
                                Setelah mendapatkan pendampingan, kini saya bisa menggunakan tanda tangan digital
                                untuk
                                transaksi dan menjalankan bisnis dengan lebih efisien!
                            </p>

                            <div class="flex items-center border-t pt-3 mt-2">
                                <img class="w-7 h-7 rounded-full mr-3" src="https://i.pravatar.cc/100?img=3"
                                    alt="Justus Menke">
                                <div>
                                    <p class="font-medium text-gray-900 text-sm">Justus Menke</p>
                                    <p class="text-xs text-gray-500">Pemilik Toko Craft</p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="relative bg-white rounded-lg shadow-md p-4 pt-8 mx-2 w-64 inline-block whitespace-normal">

                            <div class="absolute -top-4 left-3">
                                <div class="w-7 h-7 bg-[#113EA1] rounded-full flex items-center justify-center shadow">
                                    <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                                    </svg>
                                </div>
                            </div>

                            <div class="flex space-x-0.5 mb-2">
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                            </div>

                            <p class="text-gray-700 mb-3 leading-snug text-sm">
                                Setelah mendapatkan pendampingan, kini saya bisa menggunakan tanda tangan digital
                                untuk
                                transaksi dan menjalankan bisnis dengan lebih efisien!
                            </p>

                            <div class="flex items-center border-t pt-3 mt-2">
                                <img class="w-7 h-7 rounded-full mr-3" src="https://i.pravatar.cc/100?img=3"
                                    alt="Justus Menke">
                                <div>
                                    <p class="font-medium text-gray-900 text-sm">Justus Menke</p>
                                    <p class="text-xs text-gray-500">Pemilik Toko Craft</p>
                                </div>
                            </div>
                        </div>


                        <div
                            class="relative bg-white rounded-lg shadow-md p-4 pt-8 mx-2 w-64 inline-block whitespace-normal">

                            <div class="absolute -top-4 left-3">
                                <div class="w-7 h-7 bg-[#113EA1] rounded-full flex items-center justify-center shadow">
                                    <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                                    </svg>
                                </div>
                            </div>

                            <div class="flex space-x-0.5 mb-2">
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                            </div>
                            <!-- Testimonial Text -->
                            <p class="text-gray-700 mb-3 leading-snug text-sm">
                                Setelah mendapatkan pendampingan, kini saya bisa menggunakan tanda tangan digital
                                untuk
                                transaksi dan menjalankan bisnis dengan lebih efisien!
                            </p>
                            <!-- User Info -->
                            <div class="flex items-center border-t pt-3 mt-2">
                                <img class="w-7 h-7 rounded-full mr-3" src="https://i.pravatar.cc/100?img=3"
                                    alt="Justus Menke">
                                <div>
                                    <p class="font-medium text-gray-900 text-sm">Justus Menke</p>
                                    <p class="text-xs text-gray-500">Pemilik Toko Craft</p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="relative bg-white rounded-lg shadow-md p-4 pt-8 mx-2 w-64 inline-block whitespace-normal">

                            <div class="absolute -top-4 left-3">
                                <div class="w-7 h-7 bg-[#113EA1] rounded-full flex items-center justify-center shadow">
                                    <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                                    </svg>
                                </div>
                            </div>

                            <div class="flex space-x-0.5 mb-2">
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.184 3.64a1 1 0 00.95.69h3.826c.969 0 1.371 1.24.588 1.81l-3.096 2.25a1 1 0 00-.364 1.118l1.184 3.64c.3.921-.755 1.688-1.54 1.118l-3.096-2.25a1 1 0 00-1.176 0l-3.096 2.25c-.785.57-1.84-.197-1.54-1.118l1.184-3.64a1 1 0 00-.364-1.118L2.431 9.067c-.783-.57-.38-1.81.588-1.81h3.826a1 1 0 00.95-.69l1.184-3.64z" />
                                </svg>
                            </div>

                            <p class="text-gray-700 mb-3 leading-snug text-sm">
                                Setelah mendapatkan pendampingan, kini saya bisa menggunakan tanda tangan digital
                                untuk
                                transaksi dan menjalankan bisnis dengan lebih efisien!
                            </p>

                            <div class="flex items-center border-t pt-3 mt-2">
                                <img class="w-7 h-7 rounded-full mr-3" src="https://i.pravatar.cc/100?img=3"
                                    alt="Justus Menke">
                                <div>
                                    <p class="font-medium text-gray-900 text-sm">Justus Menke</p>
                                    <p class="text-xs text-gray-500">Pemilik Toko Craft</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- FAQ section --}}
    <section
        class="py-12 md:py-20 antialiased bg-gradient-to-br from-blue-50 to-purple-50 dark:from-gray-900 dark:to-gray-800 mb-16">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">


            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Seringkali ditanyakan</h2>
                <div class="w-24 h-1 bg-[#113EA1] mx-auto mt-2 rounded-2xl"></div>
            </div>

            <div x-data="{ selected: 1 }" class="space-y-3 max-w-2xl mx-auto">
                <!-- FAQ Item 1 (Expanded by default) -->
                <div class="rounded-lg shadow-sm overflow-hidden transition-all duration-200"
                    :class="selected === 1 ?
                        'border-2 border-[#113EA1] bg-white dark:bg-gray-800' :
                        'border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800'">
                    <button @click="selected === 1 ? selected = null : selected = 1"
                        class="flex items-center justify-between w-full px-5 py-4 text-left focus:outline-none hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        <span class="text-gray-800 dark:text-gray-200 font-medium text-sm flex-1">Apa itu UMKM
                            DSA?</span>
                        <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 ml-3 border-2"
                            :class="{
                                'bg-[#113EA1] border-[#113EA1]': selected === 1,
                                'bg-white shadow-xl': selected !== 1
                            }">
                            <svg class="w-4 h-4 transition-transform duration-200"
                                :class="{
                                    'rotate-0 text-white': selected === 1,
                                    '-rotate-90 text-[#113EA1]': selected !== 1
                                }"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </button>
                    <div x-show="selected === 1" x-collapse
                        class="px-5 pb-4 text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        <p>UMKM DSA adalah program pendampingan dan pemberdayaan UMKM berbasis teknologi digital
                            yang
                            dikembangkan oleh IPB. Program ini membantu usaha kecil menengah dalam menerapkan tanda
                            tangan digital serta sistem informasi untuk meningkatkan daya saing dan efisiensi bisnis
                            mereka.</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="rounded-lg shadow-sm overflow-hidden transition-all duration-200"
                    :class="selected === 2 ?
                        'border-2 border-[#113EA1] bg-white dark:bg-gray-800' :
                        'border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800'">
                    <button @click="selected === 2 ? selected = null : selected = 2"
                        class="flex items-center justify-between w-full px-5 py-4 text-left focus:outline-none hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        <span class="text-gray-800 dark:text-gray-200 font-medium text-sm flex-1">Bagaimana cara
                            mendaftar
                            UMKM DSA?</span>
                        <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 ml-3 border-2"
                            :class="{
                                'bg-[#113EA1] border-[#113EA1]': selected === 2,
                                'bg-white shadow-xl': selected !== 2
                            }">
                            <svg class="w-4 h-4 transition-transform duration-200"
                                :class="{
                                    'rotate-0 text-white': selected === 2,
                                    '-rotate-90 text-[#113EA1]': selected !== 2
                                }"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </button>
                    <div x-show="selected === 2" x-collapse
                        class="px-5 pb-4 text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        <p>Untuk mendaftar UMKM DSA, Anda dapat mengunjungi situs web resmi kami dan mengisi formulir
                            pendaftaran. Setelah itu, tim kami akan menghubungi Anda untuk proses selanjutnya.</p>
                    </div>
                </div>


                <!-- FAQ Item 3 -->
                <div class="rounded-lg shadow-sm overflow-hidden transition-all duration-200"
                    :class="selected === 3 ?
                        'border-2 border-[#113EA1] bg-white dark:bg-gray-800' :
                        'border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800'">
                    <button @click="selected === 3 ? selected = null : selected = 3"
                        class="flex items-center justify-between w-full px-5 py-4 text-left focus:outline-none hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        <span class="text-gray-800 dark:text-gray-200 font-medium text-sm flex-1">Apa manfaat
                            menggunakan
                            tanda tangan digital?</span>
                        <div class="w-8 h-8 rounded-full flex items-center justify-center flex-shrink-0 ml-3 border-2"
                            :class="{
                                'bg-[#113EA1] border-[#113EA1]': selected === 3,
                                'bg-white shadow-xl': selected !== 3
                            }">
                            <svg class="w-4 h-4 transition-transform duration-200"
                                :class="{
                                    'rotate-0 text-white': selected === 3,
                                    '-rotate-90 text-[#113EA1]': selected !== 3
                                }"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </button>
                    <div x-show="selected === 3" x-collapse
                        class="px-5 pb-4 text-gray-600 dark:text-gray-300 text-sm leading-relaxed">
                        <p>Tanda tangan digital memberikan keamanan dan keaslian pada dokumen elektronik, mengurangi
                            risiko penipuan, serta mempercepat proses bisnis dengan menghilangkan kebutuhan untuk
                            mencetak dan menandatangani dokumen secara fisik.</p>
                    </div>

                </div>


            </div>
    </section>


    {{-- join section --}}
    <section
        class="bg-white rounded-2xl border border-[#113EA1]shadow-md lg:mx-6 mx-4 my-16 relative overflow-visible shadow-xl">
        <div class="flex flex-col md:flex-row items-center relative z-10">
            <!-- Kiri: Teks -->
            <div class="md:w-1/2 p-6 text-left">
                <h2 class="text-2xl font-semibold text-gray-800 text-left">Mari Bergabung<br>Bersama Kami</h2>
                <p class="text-sm text-gray-600 mt-2 text-left">Berkembang bersama raih impian.</p>
                <button
                    class="mt-4 bg-[#113EA1] text-white font-semibold px-4 py-2 rounded-xl flex items-center gap-2 hover:bg-blue-700 transition">
                    Live Chat
                    <img src="{{ asset('images/chat.png') }}" class="w-6 h-6" alt="chat">
                </button>
            </div>

            <!-- Kanan: Background gradasi -->
            <div class="md:w-1/2 h-[300px] bg-gradient-to-r from-transparent to-[#113EA1] rounded-xl"></div>
        </div>

        <!-- Gambar tim di luar container gradient -->
        <img src="{{ asset('images/team.png') }}" alt="Team"
            class="absolute bottom-[-20px] right-0 max-h-[380px] scale-110 object-contain z-20 pointer-events-none">
    </section>


@endsection
