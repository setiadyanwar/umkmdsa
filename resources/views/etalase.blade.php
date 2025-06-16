@extends('layouts.app')

@php
    $currentRoute = 'etalase';
@endphp

@section('content')
    <!-- Header Section -->
    <div class="pt-32 bg-white">
        <!-- Padding Container -->
        <div class="px-4 sm:px-6 max-w-7xl mx-auto w-full">
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
            <button id="mobile-filter-toggle"
                class="md:hidden w-full flex items-center justify-between bg-white rounded-xl shadow-sm border border-gray-100 p-3 mb-4">
                <span class="text-lg font-semibold text-gray-900">Filter</span>
                <svg class="w-5 h-5 transition-transform duration-300 " id="filter-icon"stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6"></path>
                </svg>
            </button>

            <div class="flex flex-col md:flex-row gap-6">
                <!-- Left Sidebar Filter -->
                <div id="filter-sidebar"
                    class="w-full md:w-72 flex-shrink-0 hidden md:block transition-all duration-300 ease-in-out">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 sticky top-4">
                        <!-- Filter Title -->
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Filter</h3>
                            <button id="reset-filter" class="text-sm text-blue-600 hover:text-blue-800">Reset</button>
                        </div>

                        <!-- Kategori (Accordion) -->
                        <div class="mb-4 border-b border-gray-100 pb-4">
                            <button
                                class="accordion-button flex w-full justify-between items-center text-sm font-medium text-gray-700 mb-3">
                                <span>Kategori</span>
                                <svg class="w-4 h-4 accordion-icon transition-transform duration-200" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div class="accordion-content space-y-2">
                                <label class="flex items-center">
                                    <input type="radio" name="category" value="kerajinan"
                                        class="border-gray-300 text-blue-600 focus:ring-blue-500 mr-2">
                                    <span class="text-sm text-gray-600">Kerajinan Kriya</span>
                                    <span class="ml-auto text-xs text-gray-400">(25)</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="category" value="fashion"
                                        class="border-gray-300 text-blue-600 focus:ring-blue-500 mr-2">
                                    <span class="text-sm text-gray-600">Fashion & Aksesoris</span>
                                    <span class="ml-auto text-xs text-gray-400">(150)</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="category" value="pertanian"
                                        class="border-gray-300 text-blue-600 focus:ring-blue-500 mr-2">
                                    <span class="text-sm text-gray-600">Pertanian & Perkebunan</span>
                                    <span class="ml-auto text-xs text-gray-400">(54)</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="category" value="jasa"
                                        class="border-gray-300 text-blue-600 focus:ring-blue-500 mr-2">
                                    <span class="text-sm text-gray-600">Jasa</span>
                                    <span class="ml-auto text-xs text-gray-400">(47)</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="category" value="seni"
                                        class="border-gray-300 text-blue-600 focus:ring-blue-500 mr-2">
                                    <span class="text-sm text-gray-600">Seni & Musik</span>
                                    <span class="ml-auto text-xs text-gray-400">(43)</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="category" value="elektronik"
                                        class="border-gray-300 text-blue-600 focus:ring-blue-500 mr-2">
                                    <span class="text-sm text-gray-600">Komputer & Elektronik</span>
                                    <span class="ml-auto text-xs text-gray-400">(38)</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="category" value="makanan"
                                        class="border-gray-300 text-blue-600 focus:ring-blue-500 mr-2">
                                    <span class="text-sm text-gray-600">Makanan & Minuman</span>
                                    <span class="ml-auto text-xs text-gray-400">(15)</span>
                                </label>
                            </div>
                        </div>

                        <!-- Harga Range (Accordion) -->
                        <div class="mb-4 border-b border-gray-100 pb-4">
                            <button
                                class="accordion-button flex w-full justify-between items-center text-sm font-medium text-gray-700 mb-3">
                                <span>Harga</span>
                                <svg class="w-4 h-4 accordion-icon transition-transform duration-200" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div class="accordion-content">
                                <div class="mb-3 mt-4">
                                    <div class="flex justify-between mb-2">
                                        <span class="text-xs text-gray-500">Rp 0</span>
                                        <span class="text-xs text-gray-500">Rp 2.000.000</span>
                                    </div>
                                    <div id="price-range-slider" class="h-2 bg-gray-200 rounded-full relative">
                                        <div id="price-range-progress" class="absolute h-full bg-[#113EA1] rounded-full">
                                        </div>
                                        <input type="range" id="min-price-range" min="0" max="2000000"
                                            value="50000"
                                            class="price-slider absolute w-full h-2 opacity-0 cursor-pointer">
                                        <input type="range" id="max-price-range" min="0" max="2000000"
                                            value="1500000"
                                            class="price-slider absolute w-full h-2 opacity-0 cursor-pointer">
                                        <div id="min-price-handle"
                                            class="absolute top-1/2 size-4 bg-white border-2 border-[#113EA1] rounded-full cursor-pointer -translate-y-2/4 shadow-sm">
                                        </div>
                                        <div id="max-price-handle"
                                            class="absolute top-1/2 size-4 bg-white border-2 border-[#113EA1] rounded-full cursor-pointer -translate-y-2/4 shadow-sm">
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between mt-6 mb-2">
                                    <div class="relative w-[45%]">
                                        <span class="absolute text-xs text-gray-500 -top-5">Min</span>
                                        <input type="text" id="min-price-input"
                                            class="w-full border border-gray-300 rounded-md px-2 py-1 text-sm"
                                            value="50.000">
                                    </div>
                                    <span class="text-gray-400">-</span>
                                    <div class="relative w-[45%]">
                                        <span class="absolute text-xs text-gray-500 -top-5">Max</span>
                                        <input type="text" id="max-price-input"
                                            class="w-full border border-gray-300 rounded-md px-2 py-1 text-sm"
                                            value="1.500.000">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Urutkan (Accordion) -->
                        <div class="mb-4">
                            <button
                                class="accordion-button flex w-full justify-between items-center text-sm font-medium text-gray-700 mb-3">
                                <span>Urutkan</span>
                                <svg class="w-4 h-4 accordion-icon transition-transform duration-200" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                            </button>
                            <div class="accordion-content">
                                <div class="flex flex-col gap-2">
                                    <label
                                        class="sort-option flex items-center p-2 rounded-md cursor-pointer hover:bg-gray-50 transition-colors">
                                        <input type="radio" name="sort" value="newest" class="hidden">
                                        <div
                                            class="w-4 h-4 rounded-full border border-gray-300 mr-2 flex items-center justify-center sort-radio">
                                            <div class="w-2 h-2 rounded-full bg-[#113EA1] hidden sort-radio-dot"></div>
                                        </div>
                                        <span class="text-sm text-gray-700">Terbaru</span>
                                    </label>

                                    <label
                                        class="sort-option flex items-center p-2 rounded-md cursor-pointer hover:bg-gray-50 transition-colors">
                                        <input type="radio" name="sort" value="cheapest" class="hidden" checked>
                                        <div
                                            class="w-4 h-4 rounded-full border border-gray-300 mr-2 flex items-center justify-center sort-radio">
                                            <div class="w-2 h-2 rounded-full bg-[#113EA1] hidden sort-radio-dot"></div>
                                        </div>
                                        <span class="text-sm text-gray-700">Harga Terendah</span>
                                    </label>

                                    <label
                                        class="sort-option flex items-center p-2 rounded-md cursor-pointer hover:bg-gray-50 transition-colors">
                                        <input type="radio" name="sort" value="expensive" class="hidden">
                                        <div
                                            class="w-4 h-4 rounded-full border border-gray-300 mr-2 flex items-center justify-center sort-radio">
                                            <div class="w-2 h-2 rounded-full bg-[#113EA1] hidden sort-radio-dot"></div>
                                        </div>
                                        <span class="text-sm text-gray-700">Harga Tertinggi</span>
                                    </label>

                                    <label
                                        class="sort-option flex items-center p-2 rounded-md cursor-pointer hover:bg-gray-50 transition-colors">
                                        <input type="radio" name="sort" value="popular" class="hidden">
                                        <div
                                            class="w-4 h-4 rounded-full border border-gray-300 mr-2 flex items-center justify-center sort-radio">
                                            <div class="w-2 h-2 rounded-full bg-[#113EA1] hidden sort-radio-dot"></div>
                                        </div>
                                        <span class="text-sm text-gray-700">Paling Populer</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Apply Filter Button -->
                        <button id="apply-filter"
                            class="w-full bg-[#113EA1] text-white py-2 rounded-lg hover:bg-blue-700 transition-colors">
                            Terapkan Filter
                        </button>
                    </div>
                </div>

                <!-- Right Content Area -->
                <div class="flex-1">
                    <!-- Header with Search - New Design -->
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
                        <div>
                            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-1">Produk UMKM</h1>
                            <p class="text-gray-600" id="results-count">250+ hasil ditemukan</p>
                        </div>
                        <!-- Search Input -->
                        <div class="relative w-full sm:w-auto sm:min-w-[300px]">
                            <input type="text" id="search-input" placeholder="Jelajahi produk UMKM di sini"
                                class="w-full border border-gray-300 rounded-full pl-4 pr-12 py-3 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-blue-700 text-sm text-gray-900 placeholder-gray-400 bg-white" />

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
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-8" id="products-grid">
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
                                data-price="{{ $product['price'] }}" data-category="{{ $product['category'] }}"
                                data-date="{{ $product['date'] }}" data-popularity="{{ $product['popularity'] }}">
                                <div class="p-4 h-full flex flex-col">
                                    <div class="mb-4 flex justify-center">
                                        <div class="w-full h-40 sm:h-48 bg-gray-50 rounded-xl overflow-hidden">
                                            <img src="{{ asset('images/' . $product['image']) }}"
                                                alt="{{ $product['name'] }}" class="w-full h-full object-cover" />
                                        </div>
                                    </div>
                                    <div class="mt-auto">
                                        <h3 class="font-semibold text-gray-900 mb-2 text-sm leading-tight">
                                            {{ $product['name'] }}</h3>
                                        <p class="text-[#113EA1] font-bold text-lg mb-3">Rp
                                            {{ number_format($product['price'], 0, ',', '.') }}</p>
                                        <div class="flex items-center text-gray-400 text-xs">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
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
    </div>

    <style>
        .accordion-content {
            overflow: hidden;
            max-height: 0;
            transition: max-height 0.3s ease-out;
        }

        /* Accordion content padding */
        .accordion-content {
            padding: 0 4px;
        }

        /* Price range slider styling */
        .price-slider {
            -webkit-appearance: none;
            pointer-events: none;
        }

        .price-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            pointer-events: auto;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: white;
            border: 2px solid #113EA1;
            cursor: pointer;
            z-index: 10;
        }

        /* Custom radio button styling */
        .sort-option input:checked+.sort-radio {
            border-color: #113EA1;
            background-color: #f0f7ff;
        }

        .sort-option input:checked+.sort-radio .sort-radio-dot {
            display: block;
        }
    </style>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Store original products data
            const originalProducts = Array.from(document.querySelectorAll('.product-card')).map(card => ({
                element: card.cloneNode(true),
                name: card.getAttribute('data-name'),
                price: parseInt(card.getAttribute('data-price')),
                category: card.getAttribute('data-category'),
                date: new Date(card.getAttribute('data-date')),
                popularity: parseInt(card.getAttribute('data-popularity'))
            }));

            // Initialize accordion functionality
            const accordionButtons = document.querySelectorAll('.accordion-button');

            accordionButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    const icon = this.querySelector('.accordion-icon');

                    // Toggle content visibility
                    if (content.style.maxHeight && content.style.maxHeight !== '0px') {
                        content.style.maxHeight = '0px';
                        icon.style.transform = 'rotate(0deg)';
                    } else {
                        content.style.maxHeight = content.scrollHeight + 'px';
                        icon.style.transform = 'rotate(180deg)';
                    }
                });

                // Open accordions by default
                const content = button.nextElementSibling;
                const icon = button.querySelector('.accordion-icon');
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.style.transform = 'rotate(180deg)';
            });

            // Mobile filter toggle
            const mobileFilterToggle = document.getElementById('mobile-filter-toggle');
            const filterSidebar = document.getElementById('filter-sidebar');
            const filterIcon = document.getElementById('filter-icon');

            mobileFilterToggle.addEventListener('click', function() {
                filterSidebar.classList.toggle('hidden');
                if (filterSidebar.classList.contains('hidden')) {
                    filterIcon.style.transform = 'rotate(0deg)';
                } else {
                    filterIcon.style.transform = 'rotate(180deg)';
                }
            });

            // Price range slider functionality
            const minPriceRange = document.getElementById('min-price-range');
            const maxPriceRange = document.getElementById('max-price-range');
            const minPriceHandle = document.getElementById('min-price-handle');
            const maxPriceHandle = document.getElementById('max-price-handle');
            const priceRangeProgress = document.getElementById('price-range-progress');
            const minPriceInput = document.getElementById('min-price-input');
            const maxPriceInput = document.getElementById('max-price-input');

            // Format number to currency
            function formatCurrency(value) {
                return new Intl.NumberFormat('id-ID').format(value);
            }

            // Parse currency string to number
            function parseCurrency(value) {
                return parseInt(value.replace(/\D/g, ''));
            }

            // Update slider positions and progress bar
            function updateSlider() {
                const minVal = parseInt(minPriceRange.value);
                const maxVal = parseInt(maxPriceRange.value);

                const percent1 = (minVal / parseInt(minPriceRange.max)) * 100;
                const percent2 = (maxVal / parseInt(maxPriceRange.max)) * 100;

                minPriceHandle.style.left = `${percent1}%`;
                maxPriceHandle.style.left = `${percent2}%`;
                priceRangeProgress.style.left = `${percent1}%`;
                priceRangeProgress.style.width = `${percent2 - percent1}%`;

                minPriceInput.value = formatCurrency(minVal);
                maxPriceInput.value = formatCurrency(maxVal);
            }

            // Initialize slider
            updateSlider();

            // Event listeners for range inputs
            minPriceRange.addEventListener('input', function() {
                const minVal = parseInt(minPriceRange.value);
                const maxVal = parseInt(maxPriceRange.value);

                if (minVal > maxVal - 50000) {
                    minPriceRange.value = maxVal - 50000;
                }

                updateSlider();
            });

            maxPriceRange.addEventListener('input', function() {
                const minVal = parseInt(minPriceRange.value);
                const maxVal = parseInt(maxPriceRange.value);

                if (maxVal < minVal + 50000) {
                    maxPriceRange.value = minVal + 50000;
                }

                updateSlider();
            });

            // Event listeners for text inputs
            minPriceInput.addEventListener('change', function() {
                let value = parseCurrency(this.value);
                const maxVal = parseInt(maxPriceRange.value);

                if (isNaN(value)) value = 0;
                if (value < 0) value = 0;
                if (value > parseInt(minPriceRange.max)) value = parseInt(minPriceRange.max);
                if (value > maxVal - 50000) value = maxVal - 50000;

                minPriceRange.value = value;
                updateSlider();
            });

            maxPriceInput.addEventListener('change', function() {
                let value = parseCurrency(this.value);
                const minVal = parseInt(minPriceRange.value);

                if (isNaN(value)) value = parseInt(maxPriceRange.max);
                if (value > parseInt(maxPriceRange.max)) value = parseInt(maxPriceRange.max);
                if (value < minVal + 50000) value = minVal + 50000;

                maxPriceRange.value = value;
                updateSlider();
            });

            // Custom radio buttons for sort options
            const sortOptions = document.querySelectorAll('.sort-option');
            sortOptions.forEach(option => {
                const radio = option.querySelector('input[type="radio"]');
                if (radio.checked) {
                    option.classList.add('bg-blue-50');
                }

                option.addEventListener('click', function() {
                    sortOptions.forEach(opt => opt.classList.remove('bg-blue-50'));
                    this.classList.add('bg-blue-50');

                    // Apply sorting
                    applyFilters();
                });
            });

            // Reset filter functionality
            document.getElementById('reset-filter').addEventListener('click', function() {
                // Reset category filters
                document.querySelectorAll('input[name="category"]').forEach(radio => radio.checked = false);

                // Reset price range
                minPriceRange.value = 50000;
                maxPriceRange.value = 1500000;
                updateSlider();

                // Reset sort
                document.querySelectorAll('input[name="sort"]').forEach(radio => {
                    radio.checked = radio.value === 'cheapest';
                });

                // Reset sort option styling
                sortOptions.forEach(opt => opt.classList.remove('bg-blue-50'));
                sortOptions[1].classList.add('bg-blue-50');

                // Reset search
                document.getElementById('search-input').value = '';

                // Apply reset filters
                applyFilters();
            });

            // Apply filter button
            document.getElementById('apply-filter').addEventListener('click', function() {
                applyFilters();
            });

            // Search functionality with debounce
            const searchInput = document.getElementById('search-input');
            let searchTimeout;

            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    applyFilters();
                }, 300);
            });

            // Category filter functionality
            document.querySelectorAll('input[name="category"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    applyFilters();
                });
            });

            // Pagination functionality
            const pageButtons = document.querySelectorAll('.page-btn');
            const prevButton = document.getElementById('prev-btn');
            const nextButton = document.getElementById('next-btn');

            pageButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    pageButtons.forEach(b => {
                        b.classList.remove('bg-[#113EA1]', 'text-white', 'active');
                        b.classList.add('border', 'border-gray-300', 'text-gray-700',
                            'hover:bg-gray-50');
                    });
                    this.classList.add('bg-[#113EA1]', 'text-white', 'active');
                    this.classList.remove('border', 'border-gray-300', 'text-gray-700',
                        'hover:bg-gray-50');
                });
            });

            prevButton.addEventListener('click', function() {
                const activePage = document.querySelector('.page-btn.active');
                const prevPage = activePage.previousElementSibling;
                if (prevPage && prevPage.classList.contains('page-btn')) {
                    prevPage.click();
                }
            });

            nextButton.addEventListener('click', function() {
                const activePage = document.querySelector('.page-btn.active');
                const nextPage = activePage.nextElementSibling;
                if (nextPage && nextPage.classList.contains('page-btn')) {
                    nextPage.click();
                }
            });

            // Filter and sort products
            function applyFilters() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                const selectedCategory = document.querySelector('input[name="category"]:checked')?.value || '';
                const minPrice = parseInt(minPriceRange.value);
                const maxPrice = parseInt(maxPriceRange.value);
                const sortBy = document.querySelector('input[name="sort"]:checked')?.value || 'cheapest';

                let filteredProducts = originalProducts.filter(product => {
                    // Search filter
                    if (searchTerm && !product.name.includes(searchTerm)) {
                        return false;
                    }

                    // Category filter
                    if (selectedCategory && product.category !== selectedCategory) {
                        return false;
                    }

                    // Price range filter
                    if (product.price < minPrice || product.price > maxPrice) {
                        return false;
                    }

                    return true;
                });

                // Sort products
                filteredProducts.sort((a, b) => {
                    switch (sortBy) {
                        case 'cheapest':
                            return a.price - b.price;
                        case 'expensive':
                            return b.price - a.price;
                        case 'newest':
                            return b.date - a.date;
                        case 'popular':
                            return b.popularity - a.popularity;
                        default:
                            return a.price - b.price;
                    }
                });

                // Update display
                const productsGrid = document.getElementById('products-grid');
                const resultsCount = document.getElementById('results-count');

                // Clear current products
                productsGrid.innerHTML = '';

                if (filteredProducts.length === 0) {
                    const noResults = document.createElement('div');
                    noResults.className = 'col-span-full text-center py-12';
                    noResults.innerHTML = `
                        <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-gray-500 text-lg mb-4">Tidak ada produk yang sesuai dengan pencarian Anda</p>
                        <button id="clear-filters" class="text-blue-600 hover:text-blue-800 font-medium">Hapus semua filter</button>
                    `;
                    productsGrid.appendChild(noResults);

                    // Update results count
                    resultsCount.textContent = '0 hasil ditemukan';

                    // Add event listener for clear filters button
                    document.getElementById('clear-filters').addEventListener('click', function() {
                        document.getElementById('reset-filter').click();
                    });
                } else {
                    // Add filtered products to grid
                    filteredProducts.forEach(product => {
                        const clonedElement = product.element.cloneNode(true);
                        productsGrid.appendChild(clonedElement);
                    });

                    // Update results count
                    resultsCount.textContent = `${filteredProducts.length} hasil ditemukan`;
                }
            }

            // Handle window resize for responsive sidebar
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768) { // md breakpoint
                    filterSidebar.classList.remove('hidden');
                } else if (!filterSidebar.classList.contains('hidden')) {
                    filterSidebar.classList.add('hidden');
                }
            });

            // Initialize with default filters
            applyFilters();
        });
    </script> --}}

    <script src="{{ asset('js/filter.js') }}" defer></script>
@endsection
