@extends('layouts.app')


@php
    $currentRoute = 'etalase';
@endphp

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Breadcrumb -->
        <div class="pt-20 bg-white mb-14">
            <div class="px-4 py-4">
                <nav class="text-sm text-[#C3C3C3] flex items-center space-x-2">
                    <a href="#" class="hover:text-[#113EA1] transition-colors">Beranda</a>
                    <svg class="w-4 h-4 text-[#C3C3C3] " fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <a href="#" class="hover:text-[#113EA1] transition-colors">Tas & Aksesoris</a>
                    <svg class="w-4 h-4 text-[#C3C3C3] " fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-gray-800 font-medium">Celyne Rattan Bag</span>
                </nav>
            </div>
        </div>

        <!-- Product Detail Section -->
        <div class="grid lg:grid-cols-2 gap-12 mb-16">
            <!-- Product Images -->
            <div class="space-y-4">
                <!-- Main Image -->
                <div class="bg-white rounded-2xl p-6 relative overflow-hidden">
                    <div class="relative">
                        <span
                            class="absolute top-4 left-4 bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg z-10">
                            PROMO 18%
                        </span>

                        <img id="main-image" src="{{ asset('images/bag.png') }}" alt="Celyne Rattan Bag"
                            class="w-full h-115 object-cover rounded-xl cursor-zoom-in transition-transform hover:scale-105">
                    </div>
                </div>

                <!-- Thumbnail Images -->
                <div class="flex space-x-3 overflow-x-auto pb-2">
                    <div
                        class="flex-shrink-0 w-16 h-16 md:w-20 md:h-20 bg-white rounded-lg shadow-md border-2 border-[#113EA1] cursor-pointer thumbnail-active">
                        <img src="{{ asset('images/bag.png') }}" alt="Thumbnail 1"
                            class="w-full h-full object-cover rounded-lg thumbnail-image">
                    </div>
                    <div
                        class="flex-shrink-0 w-16 h-16 md:w-20 md:h-20 bg-white rounded-lg shadow-md border-2 border-transparent hover:border-[#113EA1] cursor-pointer transition-all">
                        <img src="{{ asset('images/bag.png') }}" alt="Thumbnail 2"
                            class="w-full h-full object-cover rounded-lg thumbnail-image">
                    </div>
                    <div
                        class="flex-shrink-0 w-16 h-16 md:w-20 md:h-20 bg-white rounded-lg shadow-md border-2 border-transparent hover:border-[#113EA1] cursor-pointer transition-all">
                        <img src="{{ asset('images/bag.png') }}" alt="Thumbnail 3"
                            class="w-full h-full object-cover rounded-lg thumbnail-image">
                    </div>
                    <div
                        class="flex-shrink-0 w-16 h-16 md:w-20 md:h-20 bg-white rounded-lg shadow-md border-2 border-transparent hover:border-[#113EA1] cursor-pointer transition-all">
                        <img src="{{ asset('images/bag.png') }}" alt="Thumbnail 4"
                            class="w-full h-full object-cover rounded-lg thumbnail-image">
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="bg-white">
                <!-- Product Title & Wishlist -->
                <div class="flex items-start justify-between mb-4 md:mb-6">
                    <div>
                        <h1 class="text-xl md:text-3xl font-bold text-gray-900 mb-2">Celyne Rattan Bag</h1>
                        <div class="flex items-center text-xs md:text-sm text-gray-500 mb-2 md:mb-3">
                            <svg class="w-3 h-3 md:w-4 md:h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Kabupaten Gowa, Makassar Barat
                        </div>
                    </div>
                    <button
                        class="w-8 h-8 md:w-10 md:h-10 flex items-center justify-center rounded-full bg-[#E7ECF6] hover:bg-blue-100 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" class="md:w-24 md:h-24"
                            viewBox="0,0,255.99409,255.99409">
                            <g fill="#113ea1" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <g transform="scale(8.53333,8.53333)">
                                    <path
                                        d="M23,3c-2.20914,0 -4,1.79086 -4,4c0.00178,0.28117 0.03321,0.56136 0.09375,0.83594l-9.08203,4.54102c-0.75785,-0.87251 -1.85604,-1.3746 -3.01172,-1.37695c-2.20914,0 -4,1.79086 -4,4c0,2.20914 1.79086,4 4,4c1.15606,-0.0013 2.25501,-0.5027 3.01367,-1.375l9.07617,4.53906c-0.05923,0.27472 -0.08934,0.55491 -0.08984,0.83594c0,2.20914 1.79086,4 4,4c2.20914,0 4,-1.79086 4,-4c0,-2.20914 -1.79086,-4 -4,-4c-1.15606,0.0013 -2.25501,0.5027 -3.01367,1.375l-9.07617,-4.53906c0.05923,-0.27472 0.08934,-0.55491 0.08984,-0.83594c-0.00192,-0.28051 -0.03334,-0.56005 -0.09375,-0.83398l9.08203,-4.54102c0.75821,0.87178 1.85635,1.37313 3.01172,1.375c2.20914,0 4,-1.79086 4,-4c0,-2.20914 -1.79086,-4 -4,-4z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </button>
                </div>

                <!-- Price Section -->
                <div class="mb-4 md:mb-6 bg-gradient-to-r rounded-xl">
                    <div class="flex items-center space-x-2 md:space-x-3 mb-2">
                        <span class="text-sm md:text-normal text-gray-500 line-through">Rp 220.000</span>
                        <span class="text-lg md:text-xl font-bold text-[#113EA1]">Rp 180.000</span>
                        <span class="bg-[rgba(234,75,72,0.1)] text-red-600 px-2 py-0.5 md:px-3 md:py-1 rounded-full text-xs md:text-sm">64% Off</span>
                    </div>
                    <div class="flex items-center space-x-2">

                    </div>
                </div>

                <!-- Product Details -->
                <div class="mb-4 md:mb-6 border-t border-[#C3C3C3] pt-3">
                    <p class="text-xs md:text-sm text-gray-700 leading-relaxed mb-3">
                        Tas brand lokal model baru ini hadir dengan tampilan dan kualitas terbaik dengan desain cantik dan
                        trendi serta memiliki nilai seni yg estetik dan autentik
                    </p>
                    <!-- Product Details -->
                    <div class="text-xs md:text-sm text-gray-600 space-y-1">
                        <div><span class="font-medium">Category:</span> Fashion & Aksesoris</div>
                        <div><span class="font-medium">Tag:</span> Tas rotan, Tas Motif rotan, Tas Homemade</div>
                    </div>
                </div>

                <!-- Quantity Selector -->
                <div class="flex flex-col md:flex-row md:items-center space-y-3 md:space-y-0 md:space-x-4 mb-4 md:mb-6">
                    <div class="py-2 px-3 inline-block bg-white border border-gray-200 rounded-4xl dark:bg-neutral-900 dark:border-neutral-700"
                        data-hs-input-number="">
                        <div class="flex items-center gap-x-1.5">
                            <button type="button"
                                class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-[#113EA1] text-white shadow-2xs hover:bg-blue-700 focus:outline-hidden focus:bg-[#113EA1] disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                tabindex="-1" aria-label="Decrease" data-hs-input-number-decrement="">
                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                </svg>
                            </button>
                            <input
                                class="p-0 w-6 bg-transparent border-0 text-gray-800 text-center focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none dark:text-white"
                                style="-moz-appearance: textfield;" type="number" aria-roledescription="Number field"
                                value="0" data-hs-input-number-input="">
                            <button type="button"
                                class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-[#113EA1] text-white shadow-2xs hover:bg-blue-700 focus:outline-hidden focus:bg-[#113EA1] disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                tabindex="-1" aria-label="Increase" data-hs-input-number-increment="">
                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5v14"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <button
                        class="bg-[#113EA1] w-full md:w-115 h-12 md:h-14 text-white px-4 md:px-6 py-2 rounded-3xl md:rounded-4xl text-sm font-medium hover:bg-blue-700 transition-colors flex justify-center items-center space-x-2">
                        <span>Hubungi Penjual</span>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.097" />
                        </svg>
                    </button>
                </div>


                <!-- Store Info -->
                <div class="pt-4 md:pt-6">
                    <div class="flex items-center space-x-3 md:space-x-4 rounded-xl md:rounded-2xl p-3 md:p-5 border-1 border-[#C3C3C3]">
                        <div
                            class="w-12 h-12 md:w-16 md:h-16 bg-gradient-to-br from-[#113EA1] to-blue-600 rounded-full flex items-center justify-center shadow-lg">
                            <span class="text-white font-bold text-xl">PS</span>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-gray-900 text-base md:text-lg">PSBN STORE</h3>
                            <div class="flex items-center space-x-4 text-xs md:text-sm text-gray-600">
                                <span class="flex items-center">
                                    <svg class="w-3 h-3 md:w-4 md:h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Kabupaten Gowa
                                </span>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button
                                class="bg-[#E7ECF6] text-[#113EA1] px-3 py-1.5 md:px-4 md:py-2 rounded-xl md:rounded-2xl text-xs md:text-sm font-medium border-2 border-[#113EA1] hover:bg-blue-700 hover:text-white transition-colors">
                                <i class="fa-solid fa-store"></i> Lihat Toko
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product dari Toko yang Sama -->
        <div class="mb-8 md:mb-14">
            <div class="flex justify-between items-center mb-4 md:mb-8">
                <h2 class="text-xl md:text-2xl font-bold text-gray-900">Produk Lainnya dari Toko</h2>
            </div>
            <section class="py-6 md:py-10 mx-auto px-4 sm:px-6 mb-8 md:mb-16 rounded-2xl md:rounded-4xl border-2 border-[#C3C3C3]">
                <div class="container">
                    <!-- Main Content Container -->
                    <div class="bg-white rounded-xl sm:rounded-2xl overflow-hidden hide-scrollbar">
                        <div class="flex flex-col lg:flex-row min-h-[350px] md:min-h-[400px] lg:h-[460px] hide-scrollbar">

                            <!-- Left Panel - CTA Section -->
                            <div
                                class="w-full lg:w-60 h-48 md:h-64 lg:h-full relative bg-white flex-shrink-0 rounded-xl md:rounded-2xl shadow-lg">
                                <div class="p-3 md:p-4 text-center h-full flex flex-col justify-center">
                                    <!-- Store Logo -->
                                    <div
                                        class="w-12 h-12 md:w-16 md:h-16 mx-auto mb-3 md:mb-4 bg-gray-100 rounded-full flex items-center justify-center border-2 border-gray-200 overflow-hidden">
                                        <img src="https://via.placeholder.com/64x64/f0f0f0/333333?text=PSBN"
                                            alt="PSBN Store Logo" class="w-full h-full object-cover">
                                    </div>

                                    <!-- Store Name -->
                                    <h2 class="text-lg md:text-xl font-bold text-gray-800 mb-1 md:mb-2">PSBN STORE</h2>

                                    <!-- Location -->
                                    <div class="flex items-center justify-center text-gray-500 mb-4 md:mb-6">
                                        <svg class="w-3 h-3 md:w-4 md:h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="text-xs md:text-sm">Kabupaten Gowa</span>
                                    </div>

                                    <!-- View All Button -->
                                    <a href="#"
                                        class="inline-block w-full text-center text-[#113EA1] underline font-medium py-2 md:py-3 px-4 md:px-6 hover:text-blue-700 active:scale-95 active:opacity-75 transition-all duration-200 rounded-lg">
                                        Lihat Semua
                                    </a>
                                </div>
                            </div>


                            <!-- Right Panel - Products Scroll -->
                            <div class="h-auto lg:h-full overflow-hidden hide-scrollbar">
                                <!-- Mobile: Horizontal Scroll -->
                                <div class="h-full p-3 md:p-4">
                                    <div class="flex gap-3 md:gap-4 overflow-x-auto pb-3 md:pb-4" style="scroll-snap-type: x mandatory;">
                                        @for ($i = 0; $i < 5; $i++)
                                            <div class="bg-white rounded-xl md:rounded-2xl border border-gray-100 hover:border-[#113EA1] hover:shadow-lg transition-all duration-300 flex-shrink-0 w-56 md:w-72 cursor-pointer"
                                                style="scroll-snap-align: start;">
                                                <div class="p-3 md:p-5 h-full flex flex-col">
                                                    <div class="mb-3 md:mb-4 flex justify-center">
                                                        <div class="w-full h-36 md:h-48 bg-gray-50 rounded-lg md:rounded-xl overflow-hidden">
                                                            <img src="{{ asset('images/bag.png') }}"
                                                                alt="Celyne Rattan Bag"
                                                                class="w-full h-full object-cover" />
                                                        </div>
                                                    </div>
                                                    <div class="mt-auto">
                                                        <h3
                                                            class="font-semibold text-gray-900 mb-1 md:mb-2 text-sm md:text-base leading-tight">
                                                            Celyne Rattan Bag</h3>
                                                        <p class="text-[#113EA1] font-bold text-base md:text-lg mb-2 md:mb-3">Rp.180.000</p>
                                                        <div class="flex items-center text-gray-400 text-xs md:text-sm">
                                                            <svg class="w-3 h-3 md:w-4 md:h-4 mr-1 md:mr-2" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd"
                                                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            <span>Kabupaten Gowa</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>

                                <!-- Desktop: Vertical Scroll (Hidden on mobile) -->
                                <div class="hidden lg:block w-full overflow-x-auto scrollbar-hide">
                                    <div class="flex gap-6 h-full items-center scrollbar-hide"
                                        style="scroll-snap-type: x mandatory;">
                                        @for ($i = 0; $i < 5; $i++)
                                            <div
                                                class="bg-white rounded-2xl border border-gray-100 hover:border-[#113EA1] hover:shadow-lg transition-all duration-300 flex-shrink-0 w-80 h-[430px] cursor-pointer p-4">
                                                <div class="p-5 h-full flex flex-col">
                                                    <div class="mb-6 flex justify-center">
                                                        <div class="w-full h-60 bg-gray-50 rounded-xl overflow-hidden">
                                                            <img src="{{ asset('images/bag.png') }}"
                                                                alt="Celyne Rattan Bag"
                                                                class="w-full h-full object-cover" />
                                                        </div>
                                                    </div>
                                                    <div class="mt-auto">
                                                        <h3 class="font-semibold text-gray-900 mb-2 text-sm leading-tight">
                                                            Celyne Rattan Bag</h3>
                                                        <p class="text-[#113EA1] font-bold text-lg mb-3">Rp.180.000</p>
                                                        <div class="flex items-center text-gray-400 text-xs">
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd"
                                                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            <span>Kabupaten Gowa</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Rekomendasi Produk Serupa -->
        <div class="flex justify-between items-center mb-6 md:mb-14">
            <h2 class="text-xl md:text-2xl font-bold text-gray-900">Rekomendasi Produk Serupa</h2>
            <a href="#" class="text-[#113EA1] hover:text-blue-700 font-medium flex items-center group text-sm md:text-base">
                <span class="hidden md:inline">Lihat Semua Produk Serupa</span>
                <span class="inline md:hidden">Lihat Semua</span>
                <svg class="w-3 h-3 md:w-4 md:h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        <div class="h-auto lg:h-full overflow-hidden">
            <!-- Mobile: Horizontal Scroll (Default) -->
            <div class="h-full p-3 md:p-4">
                <div class="flex gap-3 md:gap-4 overflow-x-auto pb-3 md:pb-4" style="scroll-snap-type: x mandatory;">
                    @for($i = 0; $i < 5; $i++)
                    <div class="bg-white rounded-xl md:rounded-2xl border border-gray-100 hover:border-[#113EA1] hover:shadow-lg transition-all duration-300 flex-shrink-0 w-56 md:w-72 cursor-pointer" style="scroll-snap-align: start;">
                        <div class="p-3 md:p-5 h-full flex flex-col">
                            <div class="mb-3 md:mb-4 flex justify-center">
                                <div class="w-full h-36 md:h-48 bg-gray-50 rounded-lg md:rounded-xl overflow-hidden">
                                    <img src="{{ asset('images/bag.png') }}" alt="Celyne Rattan Bag" class="w-full h-full object-cover" />
                                </div>
                            </div>
                            <div class="mt-auto">
                                <h3 class="font-semibold text-gray-900 mb-1 md:mb-2 text-sm md:text-base leading-tight">Celyne Rattan Bag</h3>
                                <p class="text-[#113EA1] font-bold text-base md:text-lg mb-2 md:mb-3">Rp.180.000</p>
                                <div class="flex items-center text-gray-400 text-xs md:text-sm">
                                    <svg class="w-3 h-3 md:w-4 md:h-4 mr-1 md:mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span>Kabupaten Gowa</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
            <!-- Desktop: Horizontal Scroll (Hidden on mobile) -->
            <div class="hidden lg:block w-full overflow-x-auto scrollbar-hide">
                <div class="flex gap-6 h-full items-center scrollbar-hide"
                    style="scroll-snap-type: x mandatory;">
                    @for ($i = 0; $i < 5; $i++)
                        <div
                            class="bg-white rounded-2xl border border-gray-100 hover:border-[#113EA1] hover:shadow-lg transition-all duration-300 flex-shrink-0 w-80 h-[430px] cursor-pointer p-4">
                            <div class="p-5 h-full flex flex-col">
                                <div class="mb-6 flex justify-center">
                                    <div class="w-full h-60 bg-gray-50 rounded-xl overflow-hidden">
                                        <img src="{{ asset('images/bag.png') }}"
                                            alt="Celyne Rattan Bag"
                                            class="w-full h-full object-cover" />
                                    </div>
                                </div>
                                <div class="mt-auto">
                                    <h3 class="font-semibold text-gray-900 mb-2 text-sm leading-tight">
                                        Celyne Rattan Bag</h3>
                                    <p class="text-[#113EA1] font-bold text-lg mb-3">Rp.180.000</p>
                                    <div class="flex items-center text-gray-400 text-xs">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span>Kabupaten Gowa</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
</div>
@endsection
