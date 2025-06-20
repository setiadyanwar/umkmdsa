@extends('layouts.app')

@section('title', 'Etalase Produk UMKM - Temukan Produk Lokal Berkualitas | DSA IPB')

@section('meta')
    <meta name="description" content="Jelajahi etalase produk UMKM binaan DSA IPB. Temukan produk lokal berkualitas, inovatif, dan inspiratif dari berbagai kategori. Dukung UMKM Indonesia bersama DSA IPB.">
    <meta name="keywords" content="Etalase UMKM, Produk UMKM, UMKM Indonesia, UMKM Bogor, DSA IPB, produk lokal, marketplace UMKM, inovasi UMKM, pemberdayaan UMKM">
    <meta property="og:title" content="Etalase Produk UMKM - Temukan Produk Lokal Berkualitas | DSA IPB">
    <meta property="og:description" content="Jelajahi etalase produk UMKM binaan DSA IPB. Temukan produk lokal berkualitas, inovatif, dan inspiratif dari berbagai kategori.">
    <meta property="og:image" content="{{ asset('images/dpma-logo-dark.png') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="UMKM DSA IPB">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Etalase Produk UMKM - Temukan Produk Lokal Berkualitas | DSA IPB">
    <meta name="twitter:description" content="Jelajahi etalase produk UMKM binaan DSA IPB. Temukan produk lokal berkualitas, inovatif, dan inspiratif dari berbagai kategori.">
    <meta name="twitter:image" content="{{ asset('images/dpma-logo-dark.png') }}">
@endsection

@php
    $currentRoute = 'etalase';
@endphp

@section('content')
    <!-- Header Section -->
    <div class="pt-32 bg-white">
        <!-- Padding Container -->
        <div class="max-w-7xl mx-auto w-full px-4 sm:px-6">
            <!-- Banner -->
            <div class="relative h-[200px] sm:h-[250px] md:h-[300px] bg-cover bg-center rounded-lg overflow-hidden"
                style="background-image: url('{{ asset('images/header-etalase.png') }}');">
                <!-- Overlay Content -->
                <div class="relative z-10 flex items-center justify-center h-full">
                    <div class="text-center text-white px-4">
                        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-2">Etalase Produk UMKM</h1>
                        <p class="text-sm sm:text-base md:text-lg text-gray-200 max-w-xl mx-auto">
                            Jelajahi produk unik berkualitas tinggi dari pengusaha lokal yang penuh dedikasi
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center items-center bg-white mx-auto px-4 py-8 sm:py-12 md:py-16">
        <div class="w-full max-w-7xl">
            <!-- Mobile Filter Toggle Button -->
            <button type="button" id="mobile-filter-toggle"
                class="md:hidden w-full flex items-center justify-between bg-white rounded-xl shadow-sm border border-gray-100 p-3 mb-4 hover:bg-gray-50 transition-colors">
                <span class="text-lg font-semibold text-gray-900">Filter</span>
                <svg class="w-5 h-5 transition-transform duration-300" id="filter-icon" stroke="currentColor"
                    viewBox="0 0 24 24" fill="none">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6"></path>
                </svg>
            </button>

            <div class="flex flex-col md:flex-row gap-6">
                <!-- Left Sidebar Filter -->
                <div class="w-full md:w-72 flex-shrink-0">
                    <!-- Filter Form -->
                        <form method="GET" 
                            class="filter-form bg-white rounded-xl shadow-sm border border-gray-100 p-4 
                                   hidden md:block md:sticky md:top-4
                                   transition-all duration-300 ease-in-out" 
                            id="filter-form">

                            <!-- Filter Title -->
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-lg font-semibold text-gray-900">Filter</h2>
                                <button type="button" id="reset-filter" 
                                    class="text-sm text-blue-600 hover:text-blue-800 transition-colors cursor-pointer">Reset</button>
                            </div>

                            <!-- Kategori (Accordion) -->
                            <div class="mb-4 border-b border-gray-100 pb-4">
                                <button type="button"
                                    class="accordion-button flex w-full justify-between items-center text-sm font-medium text-gray-700 mb-3 hover:text-gray-900 transition-colors cursor-pointer">
                                    <h3>Kategori</h3>
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
                                    <h3>Harga</h3>
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
                                    <h3>Urutkan</h3>
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

                    <!-- Right Content Area -->
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
                                <button type="button" onclick="window.location.href='{{ route('etalase') }}'" 
                                    class="cursor-pointer bg-[#113EA1] text-white px-6 py-2 rounded-lg hover:bg-blue-800 transition-colors">
                                    Reset Pencarian
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <style>
            .accordion-content {
                overflow: hidden;
                max-height: 0;
                transition: max-height 0.3s ease-out;
                padding: 0 4px;
            }

            .accordion-content.open {
                max-height: 500px; /* Adjust as needed */
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Mobile filter toggle functionality
                const mobileFilterToggle = document.getElementById('mobile-filter-toggle');
                const filterForm = document.getElementById('filter-form');
                const filterIcon = document.getElementById('filter-icon');

                function showMobileFilter() {
                    filterForm.classList.remove('hidden');
                    filterIcon.style.transform = 'rotate(180deg)';
                }

                function hideMobileFilter() {
                    filterForm.classList.add('hidden');
                    filterIcon.style.transform = 'rotate(0deg)';
                }

                if (mobileFilterToggle) {
                    mobileFilterToggle.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        if (filterForm.classList.contains('hidden')) {
                            showMobileFilter();
                        } else {
                            hideMobileFilter();
                        }
                    });
                }

                // Close mobile filter when window is resized to desktop
                window.addEventListener('resize', function() {
                    if (window.innerWidth >= 768) {
                        filterForm.classList.remove('hidden');
                        filterForm.classList.add('md:block');
                        filterIcon.style.transform = 'rotate(0deg)';
                    }
                });

                // Initialize accordion functionality
                const accordionButtons = document.querySelectorAll('.accordion-button');

                accordionButtons.forEach(button => {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

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
                    const url = new URL("{{ route('etalase') }}", window.location.origin);

                    if (search) {
                        url.searchParams.set('search', search);
                    }

                    window.location.href = url.href;
                }

                const resetFilterBtn = document.getElementById('reset-filter');

                if (resetFilterBtn) {
                    resetFilterBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        resetFilters();
                    });
                }

                // Filter form submission
                const filterFormElement = document.getElementById('filter-form');
                if (filterFormElement) {
                    filterFormElement.addEventListener('submit', function(e) {
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
                    searchForm.addEventListener('submit', function(e) {
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
                        clearSearchBtn.addEventListener('click', function(e) {
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
            });
        </script>
@endsection