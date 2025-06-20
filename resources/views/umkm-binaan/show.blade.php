@extends('layouts.app')

@section('title', $umkm->name . ' - UMKM Binaan DSA IPB')

@section('meta')
    <meta name="description" content="{{ Str::limit(strip_tags($umkm->description ?? 'Profil dan produk unggulan dari ' . $umkm->name . ', UMKM binaan DSA IPB.'), 155) }}">
    <meta name="keywords" content="{{ $umkm->category->name ?? '' }}, {{ $umkm->city }}, {{ $umkm->province }}, UMKM, DSA IPB, {{ $umkm->name }}">
    <meta property="og:title" content="{{ $umkm->name }} - UMKM Binaan DSA IPB">
    <meta property="og:description" content="{{ Str::limit(strip_tags($umkm->description ?? 'Profil dan produk unggulan dari ' . $umkm->name . ', UMKM binaan DSA IPB.'), 155) }}">
    <meta property="og:image" content="{{ $umkm->logo ? asset('storage/' . $umkm->logo) : asset('images/dpma-logo-dark.png') }}">
    <meta property="og:type" content="profile">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="UMKM DSA IPB">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $umkm->name }} - UMKM Binaan DSA IPB">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($umkm->description ?? 'Profil dan produk unggulan dari ' . $umkm->name . ', UMKM binaan DSA IPB.'), 155) }}">
    <meta name="twitter:image" content="{{ $umkm->logo ? asset('storage/' . $umkm->logo) : asset('images/dpma-logo-dark.png') }}">
@endsection

@php
    $currentRoute = 'umkm-binaan';
@endphp

@section('content')
    <div class="pt-32 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            {{-- Breadcrumb --}}
            <nav class="text-sm text-gray-500 flex items-center space-x-2 mb-8 md:mb-14" aria-label="Breadcrumb">
                <a href="{{ route('homepage') }}" class="hover:text-[#113EA1] transition-colors duration-200 font-medium whitespace-nowrap">
                    Beranda
                </a>
                <span class="text-gray-400 mx-2">/</span>
                <a href="{{ route('umkm-binaan') }}" class="hover:text-[#113EA1] transition-colors duration-200 font-medium whitespace-nowrap">
                    UMKM Binaan
                </a>
                <span class="text-gray-400 mx-2">/</span>
                <span class="text-gray-800 font-semibold truncate" aria-current="page">
                    {{ $umkm->name }}
                </span>
            </nav>

            {{-- Store Profile Header --}}
            <div
                class="bg-gradient-to-r from-white to-gray-50 mx-auto max-w-7xl mt-4 rounded-2xl border-2 border-gray-200 p-4 sm:p-6 lg:p-8 relative overflow-hidden">
                {{-- Background decorative elements --}}
                <div
                    class="absolute bottom-0 right-0 w-32 h-32 sm:w-40 sm:h-40 bg-[#E7ECF6] rounded-full translate-y-3/4 translate-x-1 sm:translate-x-1 opacity-60">
                </div>
                <div
                    class="absolute top-0 right-0 w-32 h-32 sm:w-48 sm:h-48 bg-[#B5C3E2] rounded-full translate-y-1/4 translate-x-1/4 sm:translate-x-3/4 opacity-40">
                </div>

                <div class="relative z-10">
                    <div class="flex flex-col lg:flex-row items-start lg:items-center gap-8 w-full">
                        {{-- Left Section --}}
                        <div class="flex-1 w-full">
                            {{-- Store Header --}}
                            <div class="flex flex-col sm:flex-row items-center sm:items-start gap-4 mb-6">
                                <div class="w-20 h-20 bg-gray-50 rounded-lg overflow-hidden flex-shrink-0">
                                    <img src="{{ $umkm->logo ? asset('storage/' . $umkm->logo) : asset('images/default-image.png') }}"
                                        alt="{{ $umkm->name }}" class="w-full h-full object-cover" loading="lazy" />
                                </div>
                                <div class="text-center sm:text-left">
                                    <h1 class="text-2xl lg:text-3xl font-bold text-gray-900 leading-tight">
                                        {{ $umkm->name }}
                                    </h1>
                                    <p
                                        class="text-gray-600 text-sm sm:text-base flex items-center justify-center sm:justify-start mt-2">
                                        <i class="fas fa-map-marker-alt mr-2 text-gray-500"></i>
                                        <span class="truncate">
                                            {{ $umkm->city . ", " . $umkm->province }}
                                        </span>
                                    </p>
                                </div>
                            </div>

                            {{-- Action Buttons --}}
                            <div class="flex flex-col sm:flex-row gap-3 w-full sm:max-w-md">
                                <button id="contact-umkm"
                                    class="cursor-pointer w-full flex items-center justify-center space-x-3 px-6 py-3 sm:px-8 rounded-lg transition-all duration-300 transform hover:-translate-y-0.5 bg-[#113EA1] text-white hover:bg-blue-800">
                                    <i class="fab fa-whatsapp text-lg sm:text-xl"></i>
                                    <span class="font-medium text-sm sm:text-base">Hubungi Penjual</span>
                                </button>
                                <button id="share-umkm"
                                    class="cursor-pointer w-full flex items-center justify-center space-x-3 px-6 py-3 sm:px-8 rounded-lg transition-all duration-300 transform hover:-translate-y-0.5 bg-white/90 text-[#113EA1] border border-[#113EA1] backdrop-blur-sm hover:bg-white">
                                    <i class="fas fa-share-alt text-sm sm:text-lg"></i>
                                    <span class="font-medium text-sm sm:text-base">Bagikan Profile</span>
                                </button>
                            </div>
                        </div>

                        {{-- Right Section (Stats Box) --}}
                        <div
                            class="w-full sm:w-auto flex gap-4 md:gap-8 lg:gap-12 flex-wrap lg:flex-nowrap justify-center lg:justify-end lg:flex-shrink-0">
                            {{-- Registration Date --}}
                            <div class="flex flex-col items-center text-center">
                                <div class="w-10 h-10 bg-[#E7ECF6] rounded-xl flex items-center justify-center mb-3">
                                    <svg width="20" height="20" viewBox="0 0 21 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6">
                                        <path
                                            d="M18.4961 9.121V17.5C18.4961 18.0304 18.2854 18.5391 17.9103 18.9142C17.5352 19.2893 17.0265 19.5 16.4961 19.5H4.50409C3.97383 19.4997 3.46538 19.2889 3.09052 18.9139C2.71566 18.5388 2.50509 18.0303 2.50509 17.5V9.121M6.00209 7.25L6.50209 1.5M6.00209 7.25C6.00209 10.152 10.5001 10.152 10.5001 7.25M6.00209 7.25C6.00209 10.426 0.847088 9.77 1.56909 7.002L2.61409 2.995C2.72577 2.56703 2.97617 2.18815 3.32611 1.91765C3.67605 1.64714 4.10579 1.50026 4.54809 1.5H16.4521C16.8944 1.50026 17.3241 1.64714 17.6741 1.91765C18.024 2.18815 18.2744 2.56703 18.3861 2.995L19.4311 7.002C20.1531 9.771 14.9981 10.426 14.9981 7.25M10.5001 7.25V1.5M10.5001 7.25C10.5001 10.152 14.9981 10.152 14.9981 7.25M14.9981 7.25L14.4981 1.5"
                                            stroke="#113EA1" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <p class="text-xs text-gray-600 leading-tight">Terdaftar pada</p>
                                <p class="text-sm sm:text-base text-gray-900">
                                    {{ $umkm->registered_at->format('d M Y') }}
                                </p>
                            </div>

                            {{-- Total Products --}}
                            <div class="flex flex-col items-center text-center">
                                <div class="w-10 h-10 bg-[#E7ECF6] rounded-xl flex items-center justify-center mb-3">
                                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M1.5 5.5H17.5M1.5 5.5V15.5C1.5 16.0304 1.71071 16.5391 2.08579 16.9142C2.46086 17.2893 2.96957 17.5 3.5 17.5H15.5C16.0304 17.5 16.5391 17.2893 16.9142 16.9142C17.2893 16.5391 17.5 16.0304 17.5 15.5V5.5M1.5 5.5L5.5 1.5H13.5L17.5 5.5M5.5 9.5H9.5"
                                            stroke="#113EA1" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <p class="text-xs text-gray-600 leading-tight">Total Produk</p>
                                <p class="text-sm sm:text-base text-gray-900">
                                    {{ $umkm->total_products }}
                                </p>
                            </div>

                            {{-- Operating Hours --}}
                            @if ($umkm->open_hour && $umkm->close_hour)
                                <div class="flex flex-col items-center text-center">
                                    <div class="w-10 h-10 bg-[#E7ECF6] rounded-xl flex items-center justify-center mb-3">
                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.45117 0.201172C10.4878 -0.203941 12.5991 0.00426538 14.5176 0.798828C16.4362 1.59353 18.0767 2.93936 19.2305 4.66602C20.3842 6.39273 21 8.4233 21 10.5C21 13.2847 19.8939 15.9557 17.9248 17.9248C15.9557 19.8939 13.2847 21 10.5 21C8.4233 21 6.39273 20.3842 4.66602 19.2305C2.93936 18.0767 1.59353 16.4362 0.798828 14.5176C0.00426538 12.5991 -0.203941 10.4878 0.201172 8.45117C0.606333 6.41442 1.60677 4.54362 3.0752 3.0752C4.54362 1.60677 6.41442 0.606333 8.45117 0.201172ZM10.5 1.5C8.72005 1.5 6.98 2.02776 5.5 3.0166C4.01996 4.00553 2.86576 5.41113 2.18457 7.05566C1.50342 8.70017 1.32559 10.5101 1.67285 12.2559C2.02015 14.0016 2.87712 15.6056 4.13574 16.8643C5.39439 18.1228 6.99839 18.9799 8.74414 19.3271C10.4899 19.6744 12.2999 19.4956 13.9443 18.8145C15.5887 18.1332 16.9945 16.9799 17.9834 15.5C18.9722 14.02 19.5 12.2799 19.5 10.5C19.5 8.11313 18.552 5.82355 16.8643 4.13574C15.1765 2.44795 12.8869 1.50004 10.5 1.5ZM10.75 10.1982L14.5 13.7988L13.4424 14.8125L9.25 10.7949V4.03125H10.75V10.1982Z"
                                                fill="#113EA1" />
                                        </svg>
                                    </div>
                                    <p class="text-xs text-gray-600 leading-tight">Jam Buka</p>
                                    <p class="text-sm sm:text-base text-gray-900">
                                        {{ $umkm->open_hour->format('H:i') }} - {{ $umkm->close_hour->format('H:i') }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Navigation Tabs --}}
            <div class="sm:mt-6 overflow-x-auto py-2">
                <div class="max-w-7xl">
                    <div class="flex gap-2 sm:gap-4 border-gray-200 bg-white rounded-t-2xl py-2 whitespace-nowrap">
                        <div class="flex items-center gap-2 w-full">
                            <div class="overflow-x-auto flex gap-2 scrollbar-hide w-full" id="tab-container">
                                <button data-tab="utama"
                                    class="tab-button active flex-shrink-0 px-3 sm:px-5 py-2 text-sm sm:text-base border-2 rounded-4xl transition-all duration-300">
                                    Utama
                                </button>
                                <button data-tab="produk"
                                    class="tab-button flex-shrink-0 px-5 py-2 border-2 transition-all duration-300 flex items-center space-x-2 rounded-4xl">
                                    <span>Semua Produk</span>
                                    <span
                                        class="bg-[#113EA1] text-white text-xs px-2.5 py-1 rounded-full font-medium min-w-[28px] text-center">
                                        {{ $umkm->total_products }}
                                    </span>
                                </button>
                                <button data-tab="tentang"
                                    class="tab-button flex-shrink-0 px-5 py-2 border-2 transition-all duration-300 rounded-4xl">
                                    Tentang Toko
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tab Content: Utama --}}
                <div id="content-utama" class="tab-content py-6 max-w-7xl">
                    {{-- Promo Banner --}}
                    <!-- <div class="bg-gradient-to-r from-blue-600 to-red-500 rounded-2xl p-6 mb-6 text-white">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-bold mb-2">Special BIG SALE</h2>
                                <p class="text-lg">50% OFF</p>
                                <p class="text-sm opacity-90">Dapatkan diskon besar untuk semua produk tas rotan berkualitas
                                    tinggi</p>
                            </div>
                            <div class="text-6xl">🛍️</div>
                        </div>
                    </div> -->

                    {{-- Featured Products --}}
                    <h2 class="text-xl font-semibold mb-4 text-gray-800">Mungkin Kamu Suka</h2>
                    <div class="h-full overflow-x-auto scrollbar-hide" style="scroll-snap-type: x mandatory;">
                        @if($featuredProducts->isNotEmpty())
                            <div class="h-full flex items-stretch gap-4 lg:gap-6 p-2">
                                @foreach($featuredProducts as $product)
                                    <a href="{{ route('etalase.show', $product->slug) }}"
                                        class="bg-white rounded-2xl border border-gray-100 hover:border-[#113EA1] hover:shadow-lg transition-all duration-300 hover:-translate-y-1 cursor-pointer h-full flex flex-col"
                                        style="scroll-snap-align: start;">
                                        <div class="h-full flex flex-col w-60 lg:w-72 min-h-[360px]">
                                            <div class="mb-2 flex justify-center">
                                                <div class="aspect-square w-full bg-gray-50 rounded-t-2xl overflow-hidden">
                                                    <img src="{{ $product->primaryImage ? asset('storage/' . $product->primaryImage->image_url) : asset('images/default-image.png') }}"
                                                        alt="{{ $product->name }}" class="w-full h-full object-cover"
                                                        loading="lazy" />
                                                </div>
                                            </div>
                                            <div class="mx-2 mb-2 flex-1 flex flex-col justify-between gap-2">
                                                <div>
                                                    <h3 class="font-semibold text-gray-900 line-clamp-2">
                                                        {{ $product->name }}
                                                    </h3>
                                                    <p class="text-[#113EA1] font-bold text-lg truncate">
                                                        Rp.{{ number_format($product->price_final, 0, ',', '.') }}
                                                    </p>
                                                    <div class="flex items-center text-gray-400 text-sm truncate gap-2">
                                                        <i class="fa-solid fa-location-dot"></i>
                                                        <span class="truncate">
                                                            {{ $product->umkm->city . ", " . $product->umkm->province }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center text-gray-400 italic">Tidak ada produk unggulan saat ini.</div>
                        @endif
                    </div>
                </div>

                {{-- Tab Content: Semua Produk --}}
                <div id="content-produk" class="tab-content py-5 hidden">
                    <div class="flex justify-center items-center bg-white mx-auto">
                        <div class="w-full max-w-7xl">
                            {{-- Mobile Filter Toggle --}}
                            <button type="button" id="mobile-filter-toggle"
                                class="md:hidden w-full flex items-center justify-between bg-white rounded-2xl shadow-sm border border-gray-100 p-3 mb-4 hover:bg-gray-50 transition-colors">
                                <span class="text-lg font-semibold text-gray-900">Filter</span>
                                <svg class="w-5 h-5 transition-transform duration-300" id="filter-icon"
                                    stroke="currentColor" viewBox="0 0 24 24" fill="none">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6">
                                    </path>
                                </svg>
                            </button>

                            <div class="flex flex-col md:flex-row gap-6">
                                {{-- Filter Sidebar --}}
                                <div class="w-full md:w-72 flex-shrink-0">
                                    <!-- Filter Form -->
                                    <form method="GET" 
                                        class="filter-form bg-white rounded-xl shadow-sm border border-gray-100 p-4 
                                            hidden md:block md:sticky md:top-4
                                            transition-all duration-300 ease-in-out" 
                                        id="filter-form">

                                        <!-- Filter Title -->
                                        <div class="flex justify-between items-center mb-4">
                                            <h3 class="text-lg font-semibold text-gray-900">Filter</h3>
                                            <button type="button" id="reset-filter" 
                                                class="text-sm text-blue-600 hover:text-blue-800 transition-colors cursor-pointer">Reset</button>
                                        </div>

                                        <!-- Kategori (Accordion) -->
                                        <div class="mb-4 border-b border-gray-100 pb-4">
                                            <button type="button"
                                                class="accordion-button flex w-full justify-between items-center text-sm font-medium text-gray-700 mb-3 hover:text-gray-900 transition-colors cursor-pointer">
                                                <h4>Kategori</h4>
                                                <svg class="w-4 h-4 accordion-icon transition-transform duration-200" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 9l-7 7-7-7">
                                                    </path>
                                                </svg>
                                            </button>
                                            <div class="accordion-content space-y-2">
                                                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-1 rounded transition-colors">
                                                    <input type="radio" name="category" value=""
                                                        class="border-gray-300 text-blue-600 focus:ring-blue-500 mr-2"
                                                        {{ !request('category') ? 'checked' : '' }}>
                                                    <span class="text-sm">Semua Kategori</span>
                                                </label>
                                                @foreach ($categories as $category)
                                                    <label class="flex items-center cursor-pointer hover:bg-gray-50 p-1 rounded transition-colors">
                                                        <input type="radio" name="category" value="{{ $category->slug }}"
                                                            class="border-gray-300 text-blue-600 focus:ring-blue-500 mr-2"
                                                            {{ request('category') == $category->slug ? 'checked' : '' }}>
                                                        <span class="text-sm">{{ $category->name }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>

                                        <!-- Harga (Accordion) -->
                                        <div class="mb-4 border-b border-gray-100 pb-4">
                                            <button type="button"
                                                class="accordion-button flex w-full justify-between items-center text-sm font-medium text-gray-700 mb-3 hover:text-gray-900 transition-colors cursor-pointer">
                                                <h4>Harga</h4>
                                                <svg class="w-4 h-4 accordion-icon transition-transform duration-200" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 9l-7 7-7-7">
                                                    </path>
                                                </svg>
                                            </button>
                                            <div class="accordion-content">
                                                <div class="flex items-center justify-between mb-2">
                                                    <div class="w-full flex items-center gap-2 text-sm">
                                                        <input type="number" name="price_min" min="0" placeholder="Min"
                                                            class="flex-1 min-w-0 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" 
                                                            value="{{ request('price_min') }}">
                                                        <span class="text-gray-500">-</span>
                                                        <input type="number" name="price_max" min="0" placeholder="Max"
                                                            class="flex-1 min-w-0 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" 
                                                            value="{{ request('price_max') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Urutkan (Accordion) -->
                                        <div class="mb-6">
                                            <button type="button"
                                                class="accordion-button flex w-full justify-between items-center text-sm font-medium text-gray-700 mb-3 hover:text-gray-900 transition-colors cursor-pointer">
                                                <h4>Urutkan</h4>
                                                <svg class="w-4 h-4 accordion-icon transition-transform duration-200" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 9l-7 7-7-7">
                                                    </path>
                                                </svg>
                                            </button>
                                            <div class="accordion-content">
                                                <div class="flex flex-col gap-2">
                                                    @php
                                                        $sorts = [
                                                            '' => 'Default',
                                                            'termurah' => 'Termurah',
                                                            'termahal' => 'Termahal',
                                                            'terbaru' => 'Terbaru',
                                                            'terlama' => 'Terlama',
                                                            'paling_dicari' => 'Paling dicari',
                                                        ];
                                                    @endphp

                                                    @foreach ($sorts as $key => $label)
                                                        <label class="flex items-center cursor-pointer hover:bg-gray-50 p-1 rounded transition-colors">
                                                            <input type="radio" name="sort" value="{{ $key }}"
                                                                class="border-gray-300 text-blue-600 focus:ring-blue-500 mr-2"
                                                                {{ request('sort') == $key ? 'checked' : '' }}>
                                                            <span class="text-sm">{{ $label }}</span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Apply Filter Button -->
                                        <div class="space-y-3">
                                            <button type="submit" 
                                                class="w-full bg-[#113EA1] text-white py-3 rounded-lg hover:bg-blue-800 transition-colors font-medium cursor-pointer">
                                                Terapkan Filter
                                            </button>
                                        </div>

                                        <!-- Hidden search input to preserve search when filtering -->
                                        @if(request('search'))
                                            <input type="hidden" name="search" value="{{ request('search') }}">
                                        @endif
                                    </form>
                                </div>

                                {{-- Products Grid --}}
                                <div class="flex-1">
                                    <!-- Header with Search -->
                                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
                                        <div>
                                            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-1">Produk UMKM</h2>
                                            <p class="text-gray-600" id="results-count">
                                                {{ $products->total() }} hasil ditemukan
                                            </p>
                                        </div>

                                        <!-- Search Input -->
                                        <form id="search-form" class="relative w-full sm:w-auto sm:min-w-[300px]">
                                            <input type="text" id="search-input" name="search"
                                                placeholder="Jelajahi produk UMKM di sini"
                                                class="w-full border border-gray-300 rounded-full pl-4 pr-12 py-3 text-sm text-gray-900 placeholder-gray-400 bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                                value="{{ request('search') }}" />

                                            <button type="submit" class="absolute right-3 top-2.5 p-1 hover:bg-gray-100 rounded-full transition-colors">
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                </svg>
                                            </button>

                                            @if(request('search'))
                                                <button type="button" id="clear-search" 
                                                    class="absolute right-8 top-2.5 p-1 hover:bg-gray-100 rounded-full transition-colors">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            @endif

                                            <!-- Preserve filter parameters -->
                                            @foreach(request()->except(['search', 'page']) as $key => $value)
                                                @if($value)
                                                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                                @endif
                                            @endforeach
                                        </form>
                                    </div>

                                    <!-- Products Grid -->
                                    @if($products->count() > 0)
                                        <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-8" id="products-grid">
                                            @foreach ($products as $product)
                                                <!-- Product Card -->
                                                <a href="{{ route('etalase.show', $product->slug) }}"
                                                    class="product-card bg-white rounded-2xl border border-gray-100 hover:border-[#113EA1] hover:shadow-lg transition-all duration-300 flex-shrink-0 w-full hover:-translate-y-0.5 cursor-pointer">
                                                    <div class="h-full flex flex-col">
                                                        <div class="mb-2 flex justify-center">
                                                            <div class="w-full aspect-square bg-gray-50 rounded-t-2xl overflow-hidden">
                                                                <img src="{{ $product->primaryImage ? asset('storage/' . $product->primaryImage->image_url) : asset('images/default-image.png') }}"
                                                                    alt="{{ $product->name }}" 
                                                                    class="w-full h-full object-cover" 
                                                                    loading="lazy" />
                                                            </div>
                                                        </div>
                                                        <div class="mx-2 mb-2 flex-1 flex flex-col justify-between gap-2">
                                                            <div>
                                                                <h3 class="font-semibold text-gray-900 line-clamp-2">
                                                                    {{ $product->name }}
                                                                </h3>
                                                                <p class="text-[#113EA1] font-bold text-lg truncate">
                                                                    Rp.{{ number_format($product->price_final, 0, ',', '.') }}
                                                                </p>
                                                                <div class="flex items-center text-gray-400 text-sm truncate gap-2">
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                    <span class="truncate">
                                                                        {{ $product->umkm->city . ", " . $product->umkm->province }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            @endforeach
                                        </div>

                                        <!-- Pagination -->
                                        <div class="mt-8">
                                            {{ $products->links('pagination::tailwind') }}
                                        </div>
                                    @else
                                        <!-- Empty State -->
                                        <div class="text-center py-16">
                                            <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                            </div>
                                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Produk tidak ditemukan</h3>
                                            <p class="text-gray-600 mb-4">Coba ubah kata kunci pencarian atau filter yang digunakan</p>
                                            <button type="button" onclick="window.location.href='{{ route('umkm-binaan.show', $umkm->slug) }}'" 
                                                class="bg-[#113EA1] text-white px-6 py-2 rounded-lg hover:bg-blue-800 transition-colors">
                                                Reset Pencarian
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tab Content: Tentang Toko --}}
                <div id="content-tentang" class="tab-content py-5 hidden">
                    <div class="max-w-7xl">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Tentang Toko</h2>

                        <div class="grid md:grid-cols-2 gap-8 justify-between">
                            <div>
                                {{-- Deskripsi Toko --}}
                                @if ($umkm->description)
                                    <h3 class="text-lg font-semibold mb-1 text-gray-800">Deskripsi Toko</h3>
                                    <p class="text-gray-600 mb-4">{{ $umkm->description }}</p>
                                @endif

                                {{-- Kategori Usaha --}}
                                @if ($umkm->category?->name)
                                    <h3 class="font-semibold mb-1 text-gray-800">Kategori Usaha</h3>
                                    <p class="text-gray-600 mb-4">{{ $umkm->category->name }}</p>
                                @endif

                                {{-- Informasi Kontak --}}
                                @if ($umkm->phone || $umkm->email || $umkm->website)
                                    <h3 class="font-semibold mb-1 text-gray-800">Informasi Kontak</h3>
                                    <div class="grid grid-cols-[auto_1fr] gap-x-2 gap-y-2 text-gray-600 mb-6">
                                        @if ($umkm->phone)
                                            <span class="pr-2">Telepon</span>
                                            <span class="pl-2">: {{ $umkm->phone }}</span>
                                        @endif

                                        @if ($umkm->email)
                                            <span class="pr-2">Email</span>
                                            <span class="pl-2">: {{ $umkm->email }}</span>
                                        @endif

                                        @if ($umkm->website)
                                            <span class="pr-2">Website</span>
                                                <span class="pl-2">:
                                                    <a href="{{ $umkm->website }}" class="text-blue-600 hover:text-blue-800" target="_blank">
                                                        {{ parse_url($umkm->website, PHP_URL_HOST) ?? $umkm->website }}
                                                    </a>
                                                </span>
                                        @endif
                                    </div>
                                @endif

                                {{-- Sosial Media --}}
                                @if ($umkm->instagram || $umkm->tiktok || $umkm->facebook)
                                    <h3 class="font-semibold mb-1 text-gray-800">Sosial Media</h3>
                                    <div class="grid grid-cols-[auto_1fr] gap-x-2 gap-y-2 text-gray-600">
                                        @if ($umkm->instagram)
                                            <span class="pr-2">Instagram</span>
                                            <span class="pl-2">:
                                                <a href="{{ $umkm->instagram }}" class="text-blue-600 hover:text-blue-800" target="_blank">
                                                    {{ '@' . Str::afterLast(rtrim($umkm->instagram, '/'), '/') }}
                                                </a>
                                            </span>
                                        @endif

                                        @if ($umkm->tiktok)
                                            <span class="pr-2">TikTok</span>
                                            <span class="pl-2">:
                                                <a href="{{ $umkm->tiktok }}" class="text-blue-600 hover:text-blue-800" target="_blank">
                                                    {{ Str::afterLast(rtrim($umkm->tiktok, '/'), '/') }}
                                                </a>
                                            </span>
                                        @endif

                                        @if ($umkm->facebook)
                                            <span class="pr-2">Facebook</span>
                                            <span class="pl-2">:
                                                <a href="{{ $umkm->facebook }}" class="text-blue-600 hover:text-blue-800" target="_blank">
                                                    {{ Str::afterLast(rtrim($umkm->facebook, '/'), '/') }}
                                                </a>
                                            </span>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <div>
                                {{-- Alamat --}}
                                @if ($umkm->address || $umkm->city || $umkm->province)
                                    <h3 class="text-lg font-semibold mb-4 text-gray-800">Alamat</h3>
                                    <p class="text-gray-600 mb-4">
                                        {{ $umkm->address }},
                                        {{ $umkm->city }},
                                        {{ $umkm->province }}
                                    </p>
                                @endif

                                {{-- Map --}}
                                @if ($umkm->latitude && $umkm->longitude)
                                    <div class="rounded-lg h-64 overflow-hidden">
                                        <iframe
                                            src="https://www.google.com/maps?q={{ $umkm->latitude }},{{ $umkm->longitude }}&hl=id&z=16&output=embed"
                                            class="w-full h-full" style="border:0;" allowfullscreen="" loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade">
                                        </iframe>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Styles --}}
    <style>
        .accordion-content {
            overflow: hidden;
            max-height: 0;
            transition: max-height 0.3s ease-out;
            padding: 0 4px;
        }

        .accordion-content.open {
            max-height: 500px;
        }
    </style>

    {{-- JavaScript --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Tab Navigation
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            // Active tab styles
            const activeStyles = {
                button: 'border-[#113EA1] text-[#113EA1] bg-blue-50',
                inactive: 'border-[#C3C3C3] text-gray-600 bg-white'
            };

            function switchTab(activeTab) {
                // Hide all contents
                tabContents.forEach(content => content.classList.add('hidden'));

                // Show active content
                const activeContent = document.getElementById(`content-${activeTab}`);
                if (activeContent) {
                    activeContent.classList.remove('hidden');
                }

                // Update button states
                tabButtons.forEach(button => {
                    const tab = button.getAttribute('data-tab');
                    if (tab === activeTab) {
                        // Active tab styles
                        button.className =
                            `tab-button px-5 py-2 border-2 ${activeStyles.button} font-semibold rounded-4xl transition-all duration-300 hover:bg-blue-100 cursor-pointer`;

                        // Special handling for "Semua Produk" button
                        if (tab === 'produk') {
                            button.className += ' flex items-center space-x-2';
                        }
                    } else {
                        // Inactive tab styles
                        button.className =
                            `tab-button px-5 py-2 border-2 ${activeStyles.inactive} transition-all duration-300 rounded-4xl hover:border-gray-400 hover:text-gray-800 cursor-pointer`;

                        // Special handling for "Semua Produk" button
                        if (tab === 'produk') {
                            button.className += ' flex items-center space-x-2';
                        }
                    }
                });
            }

            // Function to determine which tab should be active
            function getActiveTab() {
                const urlParams = new URLSearchParams(window.location.search);
                
                // Check if any filter/search parameters exist that should open the "produk" tab
                const filterParams = ['search', 'category', 'price_min', 'price_max', 'sort'];
                const hasFilterParams = filterParams.some(param => urlParams.has(param) && urlParams.get(param) !== '');
                
                return hasFilterParams ? 'produk' : 'utama';
            }

            // Tab button event listeners
            tabButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const tab = this.getAttribute('data-tab');
                    switchTab(tab);
                });
            });

            // Initialize the correct tab based on URL parameters
            const initialTab = getActiveTab();
            switchTab(initialTab);

            // Mobile Filter Toggle
            const mobileFilterToggle = document.getElementById('mobile-filter-toggle');
            const filterForm = document.getElementById('filter-form');
            const filterIcon = document.getElementById('filter-icon');

            function hideMobileFilter() {
                if (filterForm && filterIcon) {
                    filterForm.classList.add('hidden');
                    filterIcon.style.transform = 'rotate(0deg)';
                }
            }

            if (mobileFilterToggle && filterForm) {
                mobileFilterToggle.addEventListener('click', function () {
                    const isHidden = filterForm.classList.contains('hidden');

                    if (isHidden) {
                        filterForm.classList.remove('hidden');
                        filterIcon.style.transform = 'rotate(180deg)';
                    } else {
                        filterForm.classList.add('hidden');
                        filterIcon.style.transform = 'rotate(0deg)';
                    }
                });
            }

            // Accordion Functionality
            const accordionButtons = document.querySelectorAll('.accordion-button');

            accordionButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const content = this.nextElementSibling;
                    const icon = this.querySelector('.accordion-icon');
                    const isOpen = content.classList.contains('open');

                    if (isOpen) {
                        content.classList.remove('open');
                        content.style.maxHeight = '0px';
                        icon.style.transform = 'rotate(0deg)';
                    } else {
                        content.classList.add('open');
                        content.style.maxHeight = content.scrollHeight + 'px';
                        icon.style.transform = 'rotate(180deg)';
                    }
                });

                // Open accordions by default
                const content = button.nextElementSibling;
                const icon = button.querySelector('.accordion-icon');
                content.classList.add('open');
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.style.transform = 'rotate(180deg)';
            });

            // Reset filter functionality
            function resetFilters() {
                const currentParams = new URLSearchParams(window.location.search);
                const search = currentParams.get('search');
                
                // Use the current pathname (which includes the UMKM slug)
                const url = new URL(window.location.pathname, window.location.origin);

                // Only preserve search parameter if it exists
                if (search) {
                    url.searchParams.set('search', search);
                }

                window.location.href = url.href;
            }

            const resetFilterBtn = document.getElementById('reset-filter');
            if (resetFilterBtn) {
                resetFilterBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    resetFilters();
                });
            }

            // Filter form submission
            const filterFormElement = document.getElementById('filter-form');
            if (filterFormElement) {
                filterFormElement.addEventListener('submit', function (e) {
                    // Remove empty values before submission
                    const inputs = this.querySelectorAll('input[name="price_min"], input[name="price_max"]');
                    inputs.forEach(input => {
                        if (!input.value.trim()) {
                            input.disabled = true;
                        }
                    });

                    // Close mobile filter after submission
                    if (window.innerWidth < 768) {
                        hideMobileFilter();
                    }
                });
            }

            // Search functionality
            const searchForm = document.getElementById('search-form');
            const searchInput = document.getElementById('search-input');
            const clearSearchBtn = document.getElementById('clear-search');

            if (searchForm && searchInput) {
                searchForm.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const currentParams = new URLSearchParams(window.location.search);
                    const searchTerm = searchInput.value.trim();

                    if (searchTerm) {
                        currentParams.set('search', searchTerm);
                    } else {
                        currentParams.delete('search');
                    }

                    // Remove page parameter when searching
                    currentParams.delete('page');

                    const newUrl = `${window.location.pathname}?${currentParams.toString()}`;
                    window.location.href = newUrl;
                });

                if (clearSearchBtn) {
                    clearSearchBtn.addEventListener('click', function (e) {
                        e.preventDefault();
                        e.stopPropagation();

                        const currentParams = new URLSearchParams(window.location.search);
                        currentParams.delete('search');
                        currentParams.delete('page');

                        const newUrl = `${window.location.pathname}?${currentParams.toString()}`;
                        window.location.href = newUrl;
                    });
                }
            }

            // Close mobile filter when window is resized to desktop
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768) {
                    filterForm.classList.remove('hidden');
                    filterForm.classList.add('md:block');
                    filterIcon.style.transform = 'rotate(0deg)';
                }
            });

            // Contact Seller Functionality
            const contactUmkmBtn = document.getElementById('contact-umkm');
            if (contactUmkmBtn) {
                contactUmkmBtn.addEventListener('click', function () {
                    const umkmName = "{{ $umkm->name }}";
                    const message = `Halo, saya tertarik untuk mengetahui lebih lanjut tentang UMKM *${umkmName}*. Apakah saya bisa mendapatkan informasi lebih lanjut?`;
                    const whatsappUrl = `https://wa.me/{{ $umkm->phone ?? '' }}?text=${encodeURIComponent(message)}`;

                    window.open(whatsappUrl, '_blank');
                });
            }

            // Share Product Functionality
            const shareUmkmBtn = document.getElementById('share-umkm');
            if (shareUmkmBtn) {
                shareUmkmBtn.addEventListener('click', function () {
                    const umkmName = "{{ $umkm->name }}";
                    const url = window.location.href;

                    if (navigator.share) {
                        navigator.share({
                            title: umkmName,
                            text: `Lihat profil UMKM ini: ${umkmName}`,
                            url: url
                        }).catch(console.error);
                    } else {
                        navigator.clipboard.writeText(url).then(() => {
                            const originalText = shareUmkmBtn.innerHTML;
                            shareUmkmBtn.innerHTML = '<svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>';
                            setTimeout(() => {
                                shareUmkmBtn.innerHTML = originalText;
                            }, 2000);
                        }).catch(console.error);
                    }
                });
            }
        });
    </script>
@endsection