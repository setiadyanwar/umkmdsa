=<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Portal UMKM Binaan DSA - IPB</title>
</head>

<body class="font-lato text-white min-h-screen">
    <!-- Header & Navigation -->
    <section class="bg-cover bg-center" style="background-image: url('{{ asset('images/hero.png') }}' )">
        <header class="relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">

                <!-- Navigation -->
                <nav class="flex flex-row justify-between items-center py-6">

                    <!-- Logo -->
                   <img src="{{ asset('images/dpma-logo.png') }}" style="width: 253px;" "dpma-logo">
                    <ul class="hidden md:flex flex-row space-x-16">
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
                        <li class="group">
                            <a href="#"
                                class="text-white border-b-2 border-transparent group-hover:border-blue-500 transition duration-300">Tentang
                                Kami</a>
                        </li>
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

        <!-- Hero Section -->
        <section class="pt-10 pb-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="flex flex-col md:flex-row gap-8">
                    <!-- Left content -->
                    <div class="w-full md:w-1/2">
                        <div class="mb-4 text-sm font-medium">120+ UMKM binaan aktif</div>
                        <h1 class="text-4xl md:text-5xl font-medium mb-6">
                            Mendorong UMKM<br>
                            Tumbuh Bersama<br>
                            Teknologi & Inovasi
                        </h1>
                        <p class="text-gray-300 mb-8">
                            Portal resmi UMKM binaan DSA - IPB. Temukan produk unggulan, kisah
                            inspiratif, dan peluang kolaborasi untuk pertumbuhan usaha yang
                            berkelanjutan.
                        </p>
                        <div class="flex space-x-4">
                            <a href="#"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-2xl inline-flex items-center transition">
                                Telusuri UMKM
                                 <img src="{{ asset('images/arrow.png') }}" style="width: 24px; height: auto;" class="ml-2" alt="">
                            </a>
                            <a href="#"
                                class="bg-transparent border border-white text-white font-medium py-3 px-6 rounded-2xl inline-flex items-center hover:bg-white/10 transition flex-row">
                                Daftarkan usahamu
                               <img src="{{ asset('images/whatsapp.png') }}" style="width: 24px; height: auto;" class="ml-2" alt="">
                            </a>
                        </div>
                    </div>

                    <!-- Right content - Gallery -->
                    <div class="max-w-4xl mx-auto">
                        <div class="flex gap-4">

                            <!-- Gambar Besar (Kiri) -->
                            <div class="flex-[3] z-40">
                                <img src="{{ asset('images/artist-painting.png') }}" alt="Artist painting"
                                    class="w-full h-[420px] object-cover rounded-lg" />
                            </div>

                            <!-- Dua Gambar Kecil (Kanan) -->
                            <div class="flex-[2] flex flex-col gap-y-4 z-10 -ml-10">
                                <div class="h-[200px]">
                                    <img src="{{ asset('images/colorful-craft.png') }}" alt="Colorful craft"
                                        class="w-full h-full object-cover rounded-lg" />
                                </div>
                                <div class="h-[200px]">
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
        {{-- class="py-16 bg-linear-to-t from-[#04112F] via-[#04112F] to-transparent bg-gradient-to-b from-transparent to-white relative"> --}}
        <section
            class="relative py-16 bg-linear-to-t from-[#04112F] via-[#04112F] to-transparent bg-gradient-to-b from-transparent to-white">
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 z-20">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4 text-white">Program Pelatihan UMKM Terlaksana</h2>
                    <p class="text-gray-300 max-w-2xl mx-auto">
                        UMKM Binaan DSA dibekali ilmu yang membantu mereka berkembang
                        hingga mendapatkan keuntungan yang luar biasa.
                    </p>
                </div>

                <!-- Cards -->
                <div class="flex flex-col md:flex-row gap-6 justify-center relative z-30">
                    <!-- Card 1 -->
                    <div class="flex flex-row bg-white rounded-3xl shadow p-5 w-full md:w-1/3 min-h-[180px] relative">
                        <div class="flex flex-col justify-between h-full flex-1">
                            <div>
                                <span class="text-xs text-gray-400 absolute top-4 left-5">01</span>
                                <h3 class="text-lg font-semibold text-black mb-1 mt-6">Kegiatan Membantu Sesama</h3>
                                <p class="text-gray-400 text-sm">Uluran tangan untuk semua.</p>
                            </div>
                            <div class="absolute bottom-4 left-5">
                                <a href="#" class="text-blue-500 text-xs hover:underline flex items-center">
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

                    <!-- Card 2 -->
                    <div class="flex flex-row bg-white rounded-3xl shadow p-5 w-full md:w-1/3 min-h-[180px] relative">
                        <div class="flex flex-col justify-between h-full flex-1">
                            <div>
                                <span class="text-xs text-gray-400 absolute top-4 left-5">02</span>
                                <h3 class="text-lg font-semibold text-black mb-1 mt-6">Kegiatan Membantu Sesama</h3>
                                <p class="text-gray-400 text-sm">Uluran tangan untuk semua.</p>
                            </div>
                            <div class="absolute bottom-4 left-5">
                                <a href="#" class="text-blue-500 text-xs hover:underline flex items-center">
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

                    <!-- Card 3 -->
                    <div class="flex flex-row bg-white rounded-3xl shadow p-5 w-full md:w-1/3 min-h-[180px] relative">
                        <div class="flex flex-col justify-between h-full flex-1">
                            <div>
                                <span class="text-xs text-gray-400 absolute top-4 left-5">03</span>
                                <h3 class="text-lg font-semibold text-black mb-1 mt-6">Kegiatan Membantu Sesama</h3>
                                <p class="text-gray-400 text-sm">Uluran tangan untuk semua.</p>
                            </div>
                            <div class="absolute bottom-4 left-5">
                                <a href="#" class="text-blue-500 text-xs hover:underline flex items-center">
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

            <!-- Background Mask -->
            <div
                class="absolute left-0 bottom w-full h-32 sm:h-40 md:h-52 lg:h-64 pointer-events-none z-10 transform -translate-y-10 md:-translate-y-16 lg:-translate-y-20">
                <img src="{{ asset('images/mask.png') }}" alt="Background Mask" class="w-full h-full object-cover">
            </div>
        </section>


    </section>

    <section class="flex flex-row bg-white justify-content items-center max-w-7xl mx-auto sm:px-6 pt-20">
        <div class="lg:w-3/5 transform -translate-x-10 pl-10">
            <img class="w-[600px] h-full" src="{{ asset('images/image-mentor.png') }}" alt="">
        </div>
        <div class="max-w-md ">
            <div class="flex-none z-10 py-20 md:w-5/5">
                <div>

                    <div class="mb-4">
                        <div class="inline-flex items-center gap-2 border-2 border-blue-600 rounded-full px-4 py-2">
                            <div class="w-5 h-5  rounded-full flex items-center justify-center">
                                <img src="{{ asset('images/ipb-small.png') }}" alt="">

                            </div>
                            <span class="text-blue-600 font-medium text-sm">Sekilas DSA</span>
                        </div>
                    </div>

                    <h1 class="text-3xl font-bold text-gray-900 mb-6">
                        Apa itu DSA IPB?
                    </h1>

                    <p class="text-gray-600 text-base leading-relaxed mb-8">
                        DSA (Digital Signature Algorithm) IPB adalah program pendampingan dan pemberdayaan UMKM berbasis
                        teknologi digital, khususnya dalam penerapan tanda tangan digital dan sistem informasi untuk
                        meningkatkan daya saing usaha kecil menengah.
                    </p>

                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <!-- Feature 1 -->
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 w-6 h-6  rounded-full flex items-center justify-center mt-0.5">
                               <img src="{{ asset('images/verified.png') }}" alt="">
                            </div>
                            <p class="text-gray-800 text-sm font-medium">
                                Memberikan pelatihan intensif
                            </p>
                        </div>

                        <!-- Feature 2 -->
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

{{--  <section class="flex flex-row bg-white justify-content items-center max-w-7xl mx-auto sm:px-6 pt-20"> --}}

    <section class="justify-content items-center  py-2 sm:py-6 max-w-7xl lg:py-8 mx-auto sm:px-6">
        <div class="">
            <div class="flex flex-col lg:flex-row gap-4 lg:gap-6">
            <!-- Main Video -->
            <div class="w-full lg:w-2/3">
                <div class="bg-blue-800 rounded-lg shadow-lg p-2 sm:p-3">
                    <div class="relative w-full" style="padding-bottom: 56.25%; /* 16:9 aspect ratio */">
                        <iframe class="absolute top-0 left-0 w-full h-full rounded-lg"
                            src="https://www.youtube.com/embed/iIO6Yy36iFU" title="Studium Generale Video"
                            frameborder="0" allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Secondary Video -->
            <div class="w-full lg:w-1/3">
                <div class="bg-blue-800 rounded-lg shadow-lg p-2 sm:p-3">
                    <div class="relative w-full" style="padding-bottom: 117.60%; /* 16:9 aspect ratio */">
                        <iframe
                            class="absolute top-0 left-0 w-full h-full rounded-lg"
                            src="https://www.youtube.com/embed/iIO6Yy36iFU"
                            title="Live Speaker View"
                            frameborder="0"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>
</body>

</html>
