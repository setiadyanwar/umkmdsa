@extends('layouts.app')

@php
    $currentRoute = 'umkm-binaan';
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
                        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-2">UMKM Binaan DSA</h1>
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
                                <h3 class="text-lg font-semibold text-gray-900">Filter</h3>
                                <button type="button" id="reset-filter" 
                                    class="text-sm text-blue-600 hover:text-blue-800 transition-colors cursor-pointer">Reset</button>
                            </div>

                            <!-- Kategori (Accordion) -->
                            <div class="mb-6">
                                <button type="button"
                                    class="accordion-button flex w-full justify-between items-center text-sm font-medium text-gray-700 mb-3 hover:text-gray-900 transition-colors cursor-pointer">
                                    <span>Kategori</span>
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

                            <!-- Hidden starts_with input to preserve filter when searching -->
                            @if(request('starts_with'))
                                <input type="hidden" name="starts_with" value="{{ request('starts_with') }}">
                            @endif
                        </form>
                    </div>

                    <!-- Right Content Area -->
                    <div class="flex-1">
                        <!-- Header with Search -->
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
                            <div>
                                <p class="text-gray-600" id="results-count">
                                    Perlihatkan {{ $umkms->count() }} dari {{ $umkms->total() }} toko
                                </p>
                            </div>

                            <!-- Search Input -->
                            <form id="search-form" class="relative w-full sm:w-auto sm:min-w-[300px]">
                                <input type="text" id="search-input" name="search"
                                    placeholder="Jelajahi UMKM di sini"
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

                        <!-- Alphabet Filter -->
                        <div class="mb-6">
                            <div class="flex flex-wrap gap-1">
                                @foreach(range('A', 'Z') as $letter)
                                    <a href="{{ route('umkm-binaan', array_merge(request()->except(['page', 'starts_with']), request('starts_with') == $letter ? [] : ['starts_with' => $letter])) }}"
                                       class="px-2 py-1 text-sm rounded-lgtransition-colors {{ request('starts_with') == $letter ? 'text-blue-800 underline' : 'bg-white text-gray-600 hover:bg-gray-50' }}">
                                        {{ $letter }}
                                    </a>
                                @endforeach
                                @if(request('starts_with'))
                                    <a href="{{ route('umkm-binaan', request()->except(['page', 'starts_with'])) }}"
                                       class="px-3 py-1 text-sm rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors">
                                        Reset
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!-- UMKM Grid -->
                        @if($umkms->count() > 0)
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 mb-8" id="umkm-grid">
                                @foreach ($umkms as $umkm)
                                    <!-- UMKM Card -->
                                    <a href="{{ route('umkm-binaan.show', $umkm->slug) }}"
                                        class="umkm-card bg-white rounded-2xl border border-gray-300 hover:border-[#113EA1] hover:shadow-lg transition-all duration-300 p-3 text-center cursor-pointer hover:-translate-y-0.5">
                                        <div class="h-full flex flex-col">
                                            <div class="mb-3 flex justify-center">
                                                <div class="size-16 bg-gray-50 rounded-lg overflow-hidden">
                                                    <img src="{{ $umkm->logo ? asset('storage/' . $umkm->logo) : asset('images/default-image.png') }}"
                                                        alt="{{ $umkm->name }}" 
                                                        class="w-full h-full object-cover" 
                                                        loading="lazy" />
                                                </div>
                                            </div>
                                            <h3 class="font-semibold text-gray-900 line-clamp-2">
                                                {{ $umkm->name }}
                                            </h3>
                                        </div>
                                    </a>
                                @endforeach
                            </div>

                            <!-- Pagination -->
                            <div class="mt-8">
                                {{ $umkms->links('pagination::tailwind') }}
                            </div>
                        @else
                            <!-- Empty State -->
                            <div class="text-center py-16">
                                <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">UMKM tidak ditemukan</h3>
                                <p class="text-gray-600 mb-4">Coba ubah kata kunci pencarian atau filter yang digunakan</p>
                                <button type="button" onclick="window.location.href='{{ route('umkm-binaan') }}'" 
                                    class="cursor-pointer bg-[#113EA1] text-white px-6 py-2 rounded-lg hover:bg-blue-800 transition-colors">
                                    Reset Pencarian
                                </button>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Achievements Section -->
                <div class="mt-16 mb-12">
                    <h2 class="text-2xl md:text-3xl font-bold text-center text-gray-900 mb-8">
                        Prestasi Membanggakan
                        <div class="w-24 h-1 bg-blue-600 mx-auto mt-2 rounded-full"></div>
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Achievement 1 -->
                        <div class="relative rounded-xl overflow-hidden group cursor-pointer">
                            <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=400&h=300&fit=crop" 
                                alt="Achievement 1" 
                                class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 text-white">
                                <div class="bg-blue-600 text-xs px-2 py-1 rounded mb-2">UMKM</div>
                                <h3 class="font-semibold">Sinergi DSA dan UMKM Lokal</h3>
                                <p class="text-sm opacity-90">Pembangunan UMKM untuk ekonomi lokal digital</p>
                            </div>
                        </div>

                        <!-- Achievement 2 -->
                        <div class="relative rounded-xl overflow-hidden group cursor-pointer">
                            <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=400&h=300&fit=crop" 
                                alt="Achievement 2" 
                                class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 text-white">
                                <div class="bg-green-600 text-xs px-2 py-1 rounded mb-2">SUCCESS</div>
                                <h3 class="font-semibold">Digital Transformation</h3>
                                <p class="text-sm opacity-90">Transformasi digital untuk UMKM modern</p>
                            </div>
                        </div>

                        <!-- Achievement 3 -->
                        <div class="relative rounded-xl overflow-hidden group cursor-pointer">
                            <img src="https://images.unsplash.com/photo-1556740758-90de374c12ad?w=400&h=300&fit=crop" 
                                alt="Achievement 3" 
                                class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 text-white">
                                <div class="bg-purple-600 text-xs px-2 py-1 rounded mb-2">INNOVATION</div>
                                <h3 class="font-semibold">Inovasi Berkelanjutan</h3>
                                <p class="text-sm opacity-90">Mendorong inovasi untuk masa depan</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Call to Action -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-2xl p-8 text-center text-white">
                    <h3 class="text-2xl font-bold mb-4">Bergabung dengan UMKM Binaan DSA</h3>
                    <p class="text-lg mb-6 opacity-90">
                        Dapatkan pendampingan dan dukungan untuk mengembangkan usaha Anda
                    </p>
                    <a href="#" class="inline-flex items-center px-8 py-3 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Daftar Sekarang
                    </a>
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
                max-height: 500px;
            }

            .line-clamp-2 {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
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
                    const url = new URL("{{ route('umkm-binaan') }}", window.location.origin);

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