@extends('layouts.app')

@php
    $currentRoute = 'etalase';
@endphp

@section('content')
    <div class="max-w-7xl mx-auto px-2 sm:px-4 py-28 sm:py-8">
        <!-- Header Navigation -->
        <div class="bg-white sm:pt-28 sm:p-2">
            <div class="flex items-center text-xs sm:text-sm text-gray-600 overflow-x-auto whitespace-nowrap">
                <span>Beranda</span>
                <span class="mx-2">/</span>
                <span>UMKM Binaan</span>
                <span class="mx-2">/</span>
                <span class="text-[#113EA1]">Profile Toko</span>
            </div>
        </div>

        <!-- Store Profile Header -->
        <div
            class="bg-gradient-to-r from-white to-gray-50 mx-auto max-w-7xl mt-4 rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8 relative overflow-hidden">
            <!-- Background decorative elements -->
            <div
                class="absolute bottom-0 right-0 w-32 h-32 sm:w-40 sm:h-40 bg-[#E7ECF6] rounded-full translate-y-3/4 translate-x-1 sm:translate-x-1 opacity-60">
            </div>
            <div
                class="absolute top-0 right-0 w-32 h-32 sm:w-48 sm:h-48 bg-[#B5C3E2] rounded-full translate-y-1/4 translate-x-1/4 sm:translate-x-3/4 opacity-40">
            </div>

            <div class="relative z-10">
                <!-- Main content container -->
                <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-6 lg:gap-8">

                    <!-- Left section - Store info and buttons -->
                    <div class="flex-1">
                        <!-- Store header -->
                        <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-6">
                            <div
                                class="w-16 h-16 sm:w-20 sm:h-20 bg-black rounded-2xl flex items-center justify-center shadow-lg flex-shrink-0">
                                <i class="fab fa-apple text-white text-2xl sm:text-3xl"></i>
                            </div>
                            <div class="flex-1">
                                <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900 leading-tight">APPLE
                                    OFFICIAL STORE</h1>
                                <p class="text-gray-600 text-sm sm:text-base flex items-center mt-2">
                                    <i class="fas fa-map-marker-alt mr-2 text-gray-500 flex-shrink-0"></i>
                                    <span>Kabupaten Gowa, Makassar Barat</span>
                                </p>
                            </div>
                        </div>

                        <!-- Action buttons -->
                        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                            <button
                                class="bg-[#113EA1] text-white px-6 py-3 sm:px-8 rounded-full flex items-center justify-center space-x-3 hover:bg-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 w-full sm:w-auto">
                                <i class="fab fa-whatsapp text-lg sm:text-xl flex-shrink-0"></i>
                                <span class="font-medium text-sm sm:text-base">Hubungi Penjual</span>
                            </button>
                            <button
                                class="bg-white/90 backdrop-blur-sm border border-[#113EA1] text-[#113EA1] px-6 py-3 sm:px-8 rounded-full flex items-center justify-center space-x-3 hover:bg-white transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 w-full sm:w-auto">
                                <i class="fas fa-share-alt text-sm sm:text-lg flex-shrink-0"></i>
                                <span class="font-medium text-sm sm:text-base">Bagikan Profile</span>
                            </button>
                        </div>
                    </div>

                    <!-- Right section - Stats -->
                    <div
                        class="flex justify-between sm:justify-center lg:justify-end gap-2 sm:gap-4 lg:gap-6 lg:flex-shrink-0">
                        <!-- Registration Date -->
                        <div
                            class="flex flex-col items-center p-3 sm:p-4  transition-shadow duration-300 flex-1 sm:flex-none sm:min-w-[120px]">
                            <div
                                class="w-10 h-10 sm:w-12 sm:h-12 bg-[#E7ECF6] rounded-xl flex items-center justify-center mb-2 sm:mb-3">
                                <svg width="20" height="20" viewBox="0 0 21 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6">
                                    <path
                                        d="M18.4961 9.121V17.5C18.4961 18.0304 18.2854 18.5391 17.9103 18.9142C17.5352 19.2893 17.0265 19.5 16.4961 19.5H4.50409C3.97383 19.4997 3.46538 19.2889 3.09052 18.9139C2.71566 18.5388 2.50509 18.0303 2.50509 17.5V9.121M6.00209 7.25L6.50209 1.5M6.00209 7.25C6.00209 10.152 10.5001 10.152 10.5001 7.25M6.00209 7.25C6.00209 10.426 0.847088 9.77 1.56909 7.002L2.61409 2.995C2.72577 2.56703 2.97617 2.18815 3.32611 1.91765C3.67605 1.64714 4.10579 1.50026 4.54809 1.5H16.4521C16.8944 1.50026 17.3241 1.64714 17.6741 1.91765C18.024 2.18815 18.2744 2.56703 18.3861 2.995L19.4311 7.002C20.1531 9.771 14.9981 10.426 14.9981 7.25M10.5001 7.25V1.5M10.5001 7.25C10.5001 10.152 14.9981 10.152 14.9981 7.25M14.9981 7.25L14.4981 1.5"
                                        stroke="#113EA1" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <p class="text-xs text-gray-600 text-center leading-tight">Terdaftar pada</p>
                            <p class="text-sm sm:text-base font-semibold text-gray-900 text-center">25 Jan 2025</p>
                        </div>

                        <!-- Total Products -->
                        <div
                            class="flex flex-col items-center p-3 sm:p-4 transition-shadow duration-300 flex-1 sm:flex-none sm:min-w-[120px]">
                            <div
                                class="w-10 h-10 sm:w-12 sm:h-12 bg-[#E7ECF6] rounded-xl flex items-center justify-center mb-2 sm:mb-3">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.5 5.5H17.5M1.5 5.5V15.5C1.5 16.0304 1.71071 16.5391 2.08579 16.9142C2.46086 17.2893 2.96957 17.5 3.5 17.5H15.5C16.0304 17.5 16.5391 17.2893 16.9142 16.9142C17.2893 16.5391 17.5 16.0304 17.5 15.5V5.5M1.5 5.5L5.5 1.5H13.5L17.5 5.5M5.5 9.5H9.5"
                                        stroke="#113EA1" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>

                            </div>
                            <p class="text-xs text-gray-600 text-center leading-tight">Total Produk</p>
                            <p class="text-sm sm:text-base font-semibold text-gray-900 text-center">53</p>
                        </div>

                        <!-- Operating Hours -->
                        <div
                            class="flex flex-col items-center p-3 sm:p-4 transition-shadow duration-300 flex-1 sm:flex-none sm:min-w-[120px]">
                            <div
                                class="w-10 h-10 sm:w-12 sm:h-12 bg-[#E7ECF6] rounded-xl flex items-center justify-center mb-2 sm:mb-3">
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.45117 0.201172C10.4878 -0.203941 12.5991 0.00426538 14.5176 0.798828C16.4362 1.59353 18.0767 2.93936 19.2305 4.66602C20.3842 6.39273 21 8.4233 21 10.5C21 13.2847 19.8939 15.9557 17.9248 17.9248C15.9557 19.8939 13.2847 21 10.5 21C8.4233 21 6.39273 20.3842 4.66602 19.2305C2.93936 18.0767 1.59353 16.4362 0.798828 14.5176C0.00426538 12.5991 -0.203941 10.4878 0.201172 8.45117C0.606333 6.41442 1.60677 4.54362 3.0752 3.0752C4.54362 1.60677 6.41442 0.606333 8.45117 0.201172ZM10.5 1.5C8.72005 1.5 6.98 2.02776 5.5 3.0166C4.01996 4.00553 2.86576 5.41113 2.18457 7.05566C1.50342 8.70017 1.32559 10.5101 1.67285 12.2559C2.02015 14.0016 2.87712 15.6056 4.13574 16.8643C5.39439 18.1228 6.99839 18.9799 8.74414 19.3271C10.4899 19.6744 12.2999 19.4956 13.9443 18.8145C15.5887 18.1332 16.9945 16.9799 17.9834 15.5C18.9722 14.02 19.5 12.2799 19.5 10.5C19.5 8.11313 18.552 5.82355 16.8643 4.13574C15.1765 2.44795 12.8869 1.50004 10.5 1.5ZM10.75 10.1982L14.5 13.7988L13.4424 14.8125L9.25 10.7949V4.03125H10.75V10.1982Z"
                                        fill="#113EA1" />
                                </svg>

                            </div>
                            <p class="text-xs text-gray-600 text-center leading-tight">Jam Buka</p>
                            <p class="text-sm sm:text-base font-semibold text-gray-900 text-center">09:00 - 22:00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <div class="sm:mt-6 overflow-x-auto py-2">
            <div class="max-w-7xl overflow-x-auto">
                <div class="max-w-7xl flex gap-2 sm:gap-4 border-gray-200 bg-white rounded-t-2xl  py-2 whitespace-nowrap">
                    <!-- Slider Navigation for Mobile -->
                    <div class="flex items-center gap-2 sm:hidden">

                        <div class="overflow-x-auto flex gap-2 scrollbar-hide" id="tab-slider">
                            <button id="tab-utama"
                                class="tab-button flex-shrink-0 px-3 sm:px-5 py-2 text-sm sm:text-base border-2 border-[#113EA1] text-[#113EA1] font-semibold bg-blue-50 rounded-4xl transition-all duration-300 hover:bg-blue-100"
                                data-tab="utama">
                                Utama
                            </button>

                            <button id="tab-produk"
                                class="tab-button flex-shrink-0 px-5 py-2 border-2 border-[#C3C3C3] text-gray-600 transition-all duration-300 flex items-center space-x-2 rounded-4xl hover:border-gray-400 hover:text-gray-800"
                                data-tab="produk">
                                <span>Semua Produk</span>
                                <span
                                    class="bg-[#113EA1] text-white text-xs px-2.5 py-1 rounded-full font-medium min-w-[28px] text-center">
                                    53
                                </span>
                            </button>

                            <button id="tab-tentang"
                                class="tab-button flex-shrink-0 px-5 py-2 border-2 border-[#C3C3C3] text-gray-600 transition-all duration-300 rounded-4xl hover:border-gray-400 hover:text-gray-800"
                                data-tab="tentang">
                                Tentang Toko
                            </button>
                        </div>

                    </div>

                    <!-- Desktop View -->
                    <div class="hidden sm:flex gap-3">
                        <button id="tab-utama-desktop"
                            class="tab-button px-5 py-2 text-base border-2 border-[#113EA1] text-[#113EA1] font-semibold bg-blue-50 rounded-4xl transition-all duration-300 hover:bg-blue-100"
                            data-tab="utama">
                            Utama
                        </button>

                        <button id="tab-produk-desktop"
                            class="tab-button px-5 py-2 border-2 border-[#C3C3C3] text-gray-600 transition-all duration-300 flex items-center space-x-2 rounded-4xl hover:border-gray-400 hover:text-gray-800"
                            data-tab="produk">
                            <span>Semua Produk</span>
                            <span
                                class="bg-[#113EA1] text-white text-xs px-2.5 py-1 rounded-full font-medium min-w-[28px] text-center">
                                53
                            </span>
                        </button>

                        <button id="tab-tentang-desktop"
                            class="tab-button px-5 py-2 border-2 border-[#C3C3C3] text-gray-600 transition-all duration-300 rounded-4xl hover:border-gray-400 hover:text-gray-800"
                            data-tab="tentang">
                            Tentang Toko
                        </button>
                    </div>
                </div>
            </div>



            <!-- Content Area -->

                <!-- Tab Content: Utama -->
                <div id="content-utama" class="tab-content py-6 max-w-7xl">
                    <div class="bg-gradient-to-r from-blue-600 to-red-500 rounded-2xl p-6 mb-6 text-white">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-bold mb-2">Special BIG SALE</h2>
                                <p class="text-lg">50% OFF</p>
                                <p class="text-sm opacity-90">Dapatkan diskon besar untuk semua produk tas rotan
                                    berkualitas
                                    tinggi</p>
                            </div>
                            <div class="text-6xl">🛍️</div>
                        </div>
                    </div>

                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Produk Unggulan</h3>
                    <div class="h-auto lg:h-full overflow-hidden">
                        <!-- Mobile: Horizontal Scroll -->
                        <div class="lg:hidden h-full p-4">
                            <div class="flex gap-4 overflow-x-auto pb-4 scrollbar-hide"
                                style="scroll-snap-type: x mandatory;">
                                @for ($i = 0; $i < 5; $i++)
                                    <div class="bg-white rounded-2xl border border-gray-100 hover:border-[#113EA1] hover:shadow-lg transition-all duration-300 flex-shrink-0 w-72 hover:-translate-y-1 cursor-pointer"
                                        style="scroll-snap-align: start;">
                                        <div class="p-5 h-full flex flex-col">
                                            <div class="mb-4 flex justify-center">
                                                <div class="w-full h-48 bg-gray-50 rounded-xl overflow-hidden">
                                                    <img src="{{ asset('images/bag.png') }}" alt="Celyne Rattan Bag"
                                                        class="w-full h-full object-cover" />
                                                </div>
                                            </div>
                                            <div class="mt-auto">
                                                <h3 class="font-semibold text-gray-900 mb-2 text-base leading-tight">Celyne
                                                    Rattan Bag</h3>
                                                <p class="text-[#113EA1] font-bold text-lg mb-3">Rp.180.000</p>
                                                <div class="flex items-center text-gray-400 text-sm">
                                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
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

                        <!-- Desktop: Vertical Scroll -->
                        <div class="hidden lg:block w-full h-full overflow-y-auto p-4">
                            <div class="flex gap-6 h-full items-center scrollbar-hide"
                                style="scroll-snap-type: x mandatory;">
                                @for ($i = 0; $i < 5; $i++)
                                    <div
                                        class="bg-white rounded-2xl border border-gray-100 hover:border-[#113EA1] hover:shadow-lg transition-all duration-300 flex-shrink-0 w-80 h-[420px] hover:-translate-y-1 cursor-pointer">
                                        <div class="p-5 h-full flex flex-col">
                                            <div class="mb-6 flex justify-center">
                                                <div class="w-full h-60 bg-gray-50 rounded-xl overflow-hidden">
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
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Content: Semua Produk -->
                <div id="content-produk" class="tab-content py-5 hidden">
                    <div class="flex flex-col md:flex-row gap-6">
                        <!-- Left Sidebar Filter -->
                        <!-- Mobile Filter Toggle Button -->
                            <button id="mobile-filter-toggle"
                                class="md:hidden fixed bottom-4 left-4 right-4 bg-[#113EA1] text-white py-3 px-4 rounded-lg shadow-lg z-40 flex items-center justify-center gap-2 hover:bg-blue-700 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707v4.586a1 1 0 01-.293.707l-2 2A1 1 0 0110 21v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                                    </path>
                                </svg>
                                <span>Filter</span>
                            </button>

                            <!-- Mobile Overlay -->
                            <div id="mobile-overlay" class="md:hidden fixed inset-0 bg-black bg-opacity-50 filter-overlay z-40 hidden"></div>

                            <!-- Filter Sidebar -->
                            <div id="filter-sidebar"
                                class="
                                /* Mobile styles */
                                fixed bottom-0 left-0 right-0 z-40
                                transform translate-y-full md:translate-y-0
                                transition-transform duration-300 ease-in-out
                                bg-white

                                /* Desktop styles */
                                md:relative md:w-72 md:flex-shrink-0 md:block md:top-0 md:left-0 md:right-auto md:bottom-auto
                                ">
                                <div class="
                                    /* Mobile styles */
                                    bg-white rounded-t-xl shadow-lg border-t border-gray-100 p-4 max-h-[80vh] overflow-y-auto

                                    /* Desktop styles */
                                    md:rounded-xl md:shadow-sm md:border md:border-gray-100 md:p-4 md:sticky md:top-24 md:max-h-[calc(100vh-8rem)]
                                    ">
                                    <!-- Filter Title -->
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-lg font-semibold text-gray-900">Filter</h3>
                                        <div class="flex items-center gap-2">
                                            <button id="reset-filter"
                                                class="text-sm text-[#113EA1] hover:text-blue-800">Reset</button>
                                            <!-- Mobile Close Button -->
                                            <button id="mobile-close"
                                                class="md:hidden p-1 text-gray-500 hover:text-gray-700">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Kategori -->
                                    <div class="mb-4 border-b border-gray-100 pb-4">
                                        <h3 class="text-sm font-medium text-gray-700 mb-3">Kategori</h3>
                                        <div class="flex flex-col gap-2">
                                            <label
                                                class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded transition-colors">
                                                <input type="radio" name="category" value="kerajinan"
                                                    class="border-gray-300 text-[#113EA1] focus:ring-blue-500 mr-2">
                                                <span class="text-sm text-gray-600 flex-1">Kerajinan Kriya</span>
                                                <span class="text-xs text-gray-400">(25)</span>
                                            </label>
                                            <label
                                                class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded transition-colors">
                                                <input type="radio" name="category" value="fashion"
                                                    class="border-gray-300 text-[#113EA1] focus:ring-blue-500 mr-2">
                                                <span class="text-sm text-gray-600 flex-1">Fashion & Aksesoris</span>
                                                <span class="text-xs text-gray-400">(150)</span>
                                            </label>
                                            <label
                                                class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded transition-colors">
                                                <input type="radio" name="category" value="pertanian"
                                                    class="border-gray-300 text-[#113EA1] focus:ring-blue-500 mr-2">
                                                <span class="text-sm text-gray-600 flex-1">Pertanian & Perkebunan</span>
                                                <span class="text-xs text-gray-400">(54)</span>
                                            </label>
                                            <label
                                                class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded transition-colors">
                                                <input type="radio" name="category" value="jasa"
                                                    class="border-gray-300 text-[#113EA1] focus:ring-blue-500 mr-2">
                                                <span class="text-sm text-gray-600 flex-1">Jasa</span>
                                                <span class="text-xs text-gray-400">(47)</span>
                                            </label>
                                            <label
                                                class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded transition-colors">
                                                <input type="radio" name="category" value="seni"
                                                    class="border-gray-300 text-[#113EA1] focus:ring-blue-500 mr-2">
                                                <span class="text-sm text-gray-600 flex-1">Seni & Musik</span>
                                                <span class="text-xs text-gray-400">(43)</span>
                                            </label>
                                            <label
                                                class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded transition-colors">
                                                <input type="radio" name="category" value="elektronik"
                                                    class="border-gray-300 text-[#113EA1] focus:ring-blue-500 mr-2">
                                                <span class="text-sm text-gray-600 flex-1">Komputer & Elektronik</span>
                                                <span class="text-xs text-gray-400">(38)</span>
                                            </label>
                                            <label
                                                class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded transition-colors">
                                                <input type="radio" name="category" value="makanan"
                                                    class="border-gray-300 text-[#113EA1] focus:ring-blue-500 mr-2">
                                                <span class="text-sm text-gray-600 flex-1">Makanan & Minuman</span>
                                                <span class="text-xs text-gray-400">(15)</span>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Apply Filter Button -->
                                    <button id="apply-filter"
                                        class="w-full bg-[#113EA1] text-white py-3 px-4 rounded-lg hover:bg-blue-700 transition-colors font-medium">
                                        Terapkan Filter
                                    </button>
                                </div>
                            </div>

                            <!-- Right Content Area -->
                            <div class="flex-1">
                                <!-- Header with Search - New Design -->
                                <div
                                    class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
                                    <div>
                                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-1">Produk UMKM</h1>
                                        <p class="text-gray-600" id="results-count">250+ hasil ditemukan</p>
                                    </div>
                                    <!-- Search Input -->
                                    <div class="relative w-full sm:w-auto sm:min-w-[300px]">
                                        <input type="text" id="search-input"
                                            placeholder="Jelajahi produk UMKM di sini"
                                            class="w-full border border-gray-300 rounded-full pl-4 pr-12 py-3 focus:outline-none focus:ring-2 focus:ring-[#113EA1] focus:border-[#113EA1] text-sm text-gray-900 placeholder-gray-400 bg-white" />

                                        <!-- Search Icon -->
                                        <svg class="absolute right-10 top-3.5 w-4 h-4 text-gray-400 pointer-events-none"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>

                                        <!-- Clear (X) Button -->
                                        <button id="clear-input"
                                            class="absolute right-3 top-3.5 w-4 h-4 text-gray-400 hover:text-red-500 hidden focus:outline-none"
                                            type="button">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <!-- Products Grid -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-8"
                                    id="products-grid">
                                    @php
                                        $products = [
                                            [
                                                'id' => 1,
                                                'name' => 'Celyne Rattan Bag',
                                                'price' => 180000,
                                                'location' => 'Kabupaten Gowa',
                                                'image' => 'bag.png',
                                                'category' => 'fashion',
                                                'date' => '2023-05-15',
                                                'popularity' => 95,
                                            ],
                                            [
                                                'id' => 2,
                                                'name' => 'Handmade Batik Shirt',
                                                'price' => 250000,
                                                'location' => 'Yogyakarta',
                                                'image' => 'bag.png',
                                                'category' => 'fashion',
                                                'date' => '2023-06-20',
                                                'popularity' => 87,
                                            ],
                                            [
                                                'id' => 3,
                                                'name' => 'Traditional Wooden Craft',
                                                'price' => 120000,
                                                'location' => 'Jepara',
                                                'image' => 'bag.png',
                                                'category' => 'kerajinan',
                                                'date' => '2023-04-10',
                                                'popularity' => 76,
                                            ],
                                            [
                                                'id' => 4,
                                                'name' => 'Organic Coffee Beans',
                                                'price' => 85000,
                                                'location' => 'Toraja',
                                                'image' => 'bag.png',
                                                'category' => 'makanan',
                                                'date' => '2023-07-05',
                                                'popularity' => 92,
                                            ],
                                            [
                                                'id' => 5,
                                                'name' => 'Silver Jewelry Set',
                                                'price' => 320000,
                                                'location' => 'Kotagede',
                                                'image' => 'bag.png',
                                                'category' => 'kerajinan',
                                                'date' => '2023-03-25',
                                                'popularity' => 88,
                                            ],
                                            [
                                                'id' => 6,
                                                'name' => 'Bamboo Handicraft',
                                                'price' => 95000,
                                                'location' => 'Tasikmalaya',
                                                'image' => 'bag.png',
                                                'category' => 'kerajinan',
                                                'date' => '2023-06-30',
                                                'popularity' => 79,
                                            ],
                                            [
                                                'id' => 7,
                                                'name' => 'Leather Wallet',
                                                'price' => 150000,
                                                'location' => 'Bandung',
                                                'image' => 'bag.png',
                                                'category' => 'fashion',
                                                'date' => '2023-07-15',
                                                'popularity' => 82,
                                            ],
                                            [
                                                'id' => 8,
                                                'name' => 'Ceramic Vase',
                                                'price' => 200000,
                                                'location' => 'Yogyakarta',
                                                'image' => 'bag.png',
                                                'category' => 'kerajinan',
                                                'date' => '2023-05-20',
                                                'popularity' => 75,
                                            ],
                                            [
                                                'id' => 9,
                                                'name' => 'Herbal Tea',
                                                'price' => 45000,
                                                'location' => 'Bogor',
                                                'image' => 'bag.png',
                                                'category' => 'makanan',
                                                'date' => '2023-08-01',
                                                'popularity' => 68,
                                            ],
                                        ];
                                    @endphp

                                    @foreach ($products as $product)
                                        <!-- Product Card -->
                                        <div class="product-card bg-white rounded-2xl border border-gray-100 hover:border-[#113EA1] hover:shadow-lg transition-all duration-300 flex-shrink-0 w-full hover:-translate-y-1 cursor-pointer"
                                            data-id="{{ $product['id'] }}" data-name="{{ strtolower($product['name']) }}"
                                            data-price="{{ $product['price'] }}"
                                            data-category="{{ $product['category'] }}" data-date="{{ $product['date'] }}"
                                            data-popularity="{{ $product['popularity'] }}">
                                            <div class="p-4 h-full flex flex-col">
                                                <div class="mb-4 flex justify-center">
                                                    <div class="w-full h-40 sm:h-48 bg-gray-50 rounded-xl overflow-hidden">
                                                        <img src="{{ asset('images/' . $product['image']) }}"
                                                            alt="{{ $product['name'] }}"
                                                            class="w-full h-full object-cover" />
                                                    </div>
                                                </div>
                                                <div class="mt-auto">
                                                    <h3 class="font-semibold text-gray-900 mb-2 text-sm leading-tight">
                                                        {{ $product['name'] }}</h3>
                                                    <p class="text-[#113EA1] font-bold text-lg mb-3">Rp
                                                        {{ number_format($product['price'], 0, ',', '.') }}</p>
                                                    <div class="flex items-center text-gray-400 text-xs">
                                                        <svg class="w-3 h-3 mr-1" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span>{{ $product['location'] }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Pagination -->
                                <div class="flex justify-center items-center space-x-2 mb-12">
                                    <button class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </button>

                                    @for($i = 1; $i <= 5; $i++)
                                        <button class="w-8 h-8 rounded-full {{ $i === 2 ? 'bg-[#113EA1] text-white' : 'border border-gray-300 hover:bg-gray-50' }} flex items-center justify-center text-sm">
                                            {{ $i }}
                                        </button>
                                    @endfor

                                    <span class="text-gray-400">...</span>
                                    <button class="w-8 h-8 rounded-full border border-gray-300 hover:bg-gray-50 flex items-center justify-center text-sm">21</button>

                                    <button class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center hover:bg-gray-50">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                    </div>
                </div>

                <!-- Tab Content: Tentang Toko -->
                <div id="content-tentang" class="tab-content py-5 hidden">
                    <div class="max-w-7xl">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Tentang Toko</h2>

                        <div class="grid md:grid-cols-2 gap-8 flex justify-between">
                            <div>
                                <h3 class="text-lg font-semibold mb-4 text-gray-800">Deskripsi Toko</h3>
                                <p class="text-gray-600 mb-4">
                                    Apple Store adalah jaringan toko retail yang dimiliki dan dioperasikan oleh Apple Inc.
                                    Toko ini menjual, melayani, dan memperbaiki berbagai produk Apple, termasuk komputer
                                    Mac, iPhone, iPad, Apple Watch, Apple TV, serta berbagai aksesori dan perangkat lunak.
                                </p>
                                <p class="text-gray-600 mb-4">
                                    Apple Store dikenal dengan desainnya yang modern dan minimalis, sering kali menggunakan
                                    material kaca yang elegan. Selain sebagai tempat berbelanja, toko ini juga menawarkan
                                    layanan seperti Genius Bar, di mana pelanggan dapat mendapatkan dukungan teknis dan
                                    perbaikan perangkat.
                                </p>

                                <h4 class="font-semibold mb-2 text-gray-800">Kategori Usaha</h4>
                                <p class="text-gray-600 mb-4">Handphone & Aksesoris</p>

                                <h4 class="font-semibold mb-2 text-gray-800">Informasi Kontak</h4>
                                <div class="grid grid-cols-[auto_1fr] gap-x-2 gap-y-2 text-gray-600 mb-6">
                                    <span class="font-medium text-right pr-2">Telepon</span>
                                    <span class="pl-2">: +62 21 5555 9999</span>

                                    <span class="font-medium text-rleft pr-2">Email</span>
                                    <span class="pl-2">: support@appleofficial.co.id</span>

                                    <span class="font-medium text-right pr-2">Website</span>
                                    <span class="pl-2">: www.appleofficial.co.id</span>
                                </div>

                                <h4 class="font-semibold mb-4 text-gray-800">Sosial Media:</h4>

                                <div class="grid grid-cols-[auto_1fr] gap-x-2 gap-y-2 text-gray-600">
                                    <span class="font-medium text-right pr-2">Instagram</span>
                                    <span class="pl-2">: <a href="#" class="text-blue-600 hover:text-blue-800">@appleofficial</a></span>

                                    <span class="font-medium text-left pr-2">TikTok</span>
                                    <span class="pl-2">: <a href="#" class="text-blue-600 hover:text-blue-800">@appleofficial</a></span>

                                    <span class="font-medium text-right pr-2">Facebook</span>
                                    <span class="pl-2">: <a href="#" class="text-blue-600 hover:text-blue-800">Apple Official Store</a></span>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold mb-4 text-gray-800">Alamat</h3>
                                <p class="text-gray-600 mb-4">
                                    Jl. Sudirman No. 123, Jakarta Pusat, Indonesia
                                </p>

                                <div class="rounded-lg h-64 overflow-hidden">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11517.793457659525!2d106.80564010433685!3d-6.588182265481417!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5d2e602b501%3A0x25a12f0f97fac4ee!2sSchool%20of%20Vocational%20Studies%20-%20IPB%20University!5e0!3m2!1sen!2sid!4v1750008125751!5m2!1sen!2sid"
                                        class="w-full h-full"
                                        style="border:0;"
                                        allowfullscreen=""
                                        loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>

        </div>
    </div>


    <script>
        // Slider functionality in mobile view
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.getElementById('tab-slider');
            const slideLeft = document.getElementById('slide-left');
            const slideRight = document.getElementById('slide-right');

            if (slideLeft && slideRight) {
                slideLeft.addEventListener('click', () => {
                    slider.scrollLeft -= 100;
                });

                slideRight.addEventListener('click', () => {
                    slider.scrollLeft += 100;
                });
            }
        });

        // Filter functionality
        const mobileToggle = document.getElementById('mobile-filter-toggle');
        const mobileOverlay = document.getElementById('mobile-overlay');
        const mobileClose = document.getElementById('mobile-close');
        const filterSidebar = document.getElementById('filter-sidebar');
        const resetFilter = document.getElementById('reset-filter');
        const applyFilter = document.getElementById('apply-filter');

        // Show filter on mobile
        function showMobileFilter() {
            mobileOverlay.classList.remove('hidden');
            filterSidebar.classList.remove('translate-y-full');
            filterSidebar.classList.add('filter-slide-in');
            document.body.style.overflow = 'hidden';
        }

        // Hide filter on mobile
        function hideMobileFilter() {
            filterSidebar.classList.add('translate-y-full');
            filterSidebar.classList.remove('filter-slide-in');
            filterSidebar.classList.add('filter-slide-out');

            setTimeout(() => {
                mobileOverlay.classList.add('hidden');
                filterSidebar.classList.remove('filter-slide-out');
                document.body.style.overflow = '';
            }, 300);
        }

        // Event listeners
        mobileToggle.addEventListener('click', showMobileFilter);
        mobileClose.addEventListener('click', hideMobileFilter);
        mobileOverlay.addEventListener('click', hideMobileFilter);

        // Reset filter functionality
        resetFilter.addEventListener('click', () => {
            const radioButtons = document.querySelectorAll('input[name="category"]');
            radioButtons.forEach(radio => radio.checked = false);
        });

        // Apply filter functionality
        applyFilter.addEventListener('click', () => {
            const selectedCategory = document.querySelector('input[name="category"]:checked');
            if (selectedCategory) {
                console.log('Filter applied:', selectedCategory.value);
                // Here you would typically filter your content
                alert(`Filter diterapkan untuk kategori: ${selectedCategory.nextElementSibling.textContent}`);
            } else {
                alert('Pilih kategori terlebih dahulu');
            }

            // Close filter on mobile after applying
            if (window.innerWidth < 768) {
                hideMobileFilter();
            }
        });

        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                // Reset mobile filter state on desktop
                mobileOverlay.classList.add('hidden');
                filterSidebar.classList.remove('translate-y-full');
                document.body.style.overflow = '';
            }
        });

        // Prevent body scroll when filter is open on mobile
        document.addEventListener('touchmove', (e) => {
            if (!mobileOverlay.classList.contains('hidden') && window.innerWidth < 768) {
                if (!filterSidebar.contains(e.target)) {
                    e.preventDefault();
                }
            }
        }, {
            passive: false
        });
        // Tab navigation functionality
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');

        // Active tab styles
        const activeStyles = {
            button: 'border-[#113EA1] text-[#113EA1] bg-blue-50',
            inactive: 'border-[#C3C3C3] text-gray-600 bg-white'
        };

        // Initialize active tab
        let activeTab = 'utama';

        // Function to switch tabs
        function switchTab(targetTab) {
            // Hide all tab contents
            tabContents.forEach(content => {
                content.classList.add('hidden');
            });

            // Show target tab content
            const targetContent = document.getElementById(`content-${targetTab}`);
            if (targetContent) {
                targetContent.classList.remove('hidden');
            }

            // Update button styles
            tabButtons.forEach(button => {
                const tab = button.getAttribute('data-tab');

                if (tab === targetTab) {
                    // Active tab styles
                    button.className =
                        `tab-button px-5 py-2 border-2 ${activeStyles.button} font-semibold rounded-4xl transition-all duration-300 hover:bg-blue-100`;

                    // Special handling for "Semua Produk" button
                    if (tab === 'produk') {
                        button.className += ' flex items-center space-x-2';
                    }
                } else {
                    // Inactive tab styles
                    button.className =
                        `tab-button px-5 py-2 border-2 ${activeStyles.inactive} transition-all duration-300 rounded-4xl hover:border-gray-400 hover:text-gray-800`;

                    // Special handling for "Semua Produk" button
                    if (tab === 'produk') {
                        button.className += ' flex items-center space-x-2';
                    }
                }
            });

            // Update active tab
            activeTab = targetTab;
        }

        // Add event listeners to tab buttons
        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetTab = button.getAttribute('data-tab');
                switchTab(targetTab);
            });
        });

        // Add smooth scrolling for product cards
        document.addEventListener('DOMContentLoaded', () => {
            const productCards = document.querySelectorAll('.border.rounded-lg');

            productCards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transform = 'translateY(-2px)';
                });

                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'translateY(0)';
                });
            });
        });

        // Keyboard navigation support
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft' || e.key === 'ArrowRight') {
                const tabs = ['utama', 'produk', 'tentang'];
                const currentIndex = tabs.indexOf(activeTab);

                if (e.key === 'ArrowLeft' && currentIndex > 0) {
                    switchTab(tabs[currentIndex - 1]);
                } else if (e.key === 'ArrowRight' && currentIndex < tabs.length - 1) {
                    switchTab(tabs[currentIndex + 1]);
                }
            }
        });

        // Initialize with first tab active
        switchTab('utama');
    </script>
    </body>
@endsection
