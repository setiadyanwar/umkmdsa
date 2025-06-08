@extends('layouts.app')

@php
    $currentRoute = 'etalase';
@endphp

@section('content')
    <!-- Header Section -->
    <div class="flex justify-center items-center bg-white pt-32">
        <!-- Banner -->
        <div class="relative w-[1292px] h-[321px] bg-cover bg-center rounded-lg overflow-hidden" style="background-image: url('{{ asset('images/header-etalase.png') }}');">
            <!-- Overlay Content -->
            <div class="relative z-10 flex items-center justify-center h-full ">
                <div class="text-center text-white px-4">
                    <h1 class="text-3xl md:text-4xl font-bold mb-2">Etalase Produk UMKM</h1>
                    <p class="text-base md:text-lg text-gray-200 max-w-xl mx-auto">
                        Jelajahi produk unik berkualitas tinggi dari pengusaha lokal yang penuh dedikasi
                    </p>
                </div>
            </div>
        </div>
    </div>



    <div class="flex justify-center items-center bg-white mx-auto px-4 py-16">
        <!-- Mobile Filter Toggle Button -->
        <button id="mobile-filter-toggle"
            class="md:hidden w-full flex items-center justify-between bg-white rounded-xl shadow-sm border border-gray-100 p-3 mb-4">
            <span class="text-lg font-semibold text-gray-900">Filter</span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>

        <div class="flex flex-col md:flex-row gap-6">
            <!-- Left Sidebar Filter -->
            <div id="filter-sidebar" class="w-full md:w-72 flex-shrink-0 hidden md:block">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-3 sticky top-4">
                    <!-- Filter Title -->
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Filter</h3>
                        <button id="reset-filter" class="text-sm text-blue-600 hover:text-blue-800">Reset</button>
                    </div>

                    <!-- Kategori (Accordion) -->
                    <div class="mb-4  border-gray-100">
                        <button
                            class="accordion-button flex w-full justify-between items-center text-sm font-medium text-gray-700 mb-3">
                            <span>Kategori</span>
                            <svg class="w-4 h-4 accordion-icon transition-transform duration-200" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
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
                    <div class="mb-4">
                        <button
                            class="accordion-button flex w-full justify-between items-center text-sm font-medium text-gray-700 mb-3">
                            <span>Harga</span>
                            <svg class="w-4 h-4 accordion-icon transition-transform duration-200" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div class="accordion-content">
                            <label class="sr-only">Price range slider</label>
                            <div id="hs-pass-values-to-html-elements" class="--prevent-on-load-init mb-3"
                                data-hs-range-slider='{
                                "start": [50, 1500],
                                "range": {
                                    "min": 0,
                                    "max": 2000
                                },
                                "formatter": {
                                    "type": "integer",
                                    "thousandsSeparator": ","
                                },
                                "connect": true,
                                "cssClasses": {
                                    "target": "relative h-2 rounded-full bg-gray-200",
                                    "base": "w-full h-full relative z-1",
                                    "origin": "absolute top-0 end-0 w-full h-full origin-[0_0] rounded-full",
                                    "handle": "absolute top-1/2 end-0 size-4 bg-white border-2 border-[#113EA1] rounded-full cursor-pointer translate-x-2/4 -translate-y-2/4 shadow-sm",
                                    "connects": "relative z-0 w-full h-full rounded-full overflow-hidden",
                                    "connect": "absolute top-0 end-0 z-1 w-full h-full bg-[#113EA1] origin-[0_0]",
                                    "touchArea": "absolute -top-1 -bottom-1 -start-1 -end-1"
                                }
                            }'>
                            </div>

                            <div class="flex justify-start items-center w-full">
                                <span class="text-sm text-gray-600">Price:</span>
                                <div class="flex items-center text-sm text-black ml-2">
                                    <span id="hs-pass-values-to-html-elements-min-target">50</span>
                                    <span class="mx-2">–</span>
                                    <span id="hs-pass-values-to-html-elements-max-target">1,500</span>
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div class="accordion-content flex flex-wrap gap-2 max-w-md mb-4">
                            <!-- Termurah -->
                            <label
                                class="flex items-center cursor-pointer px-2 py-1 rounded-full border text-sm font-normal leading-tight whitespace-nowrap border-gray-300 text-[#113EA1] transition-all duration-200 has-[:checked]:border-[#113EA1] has-[:checked]:bg-blue-50  hover:border-[#113EA1]">
                                <input type="radio" name="sort" value="cheapest" class="sr-only" checked>
                                <span>Termurah</span>
                            </label>

                            <!-- Paling dicari -->
                            <label
                                class="flex items-center cursor-pointer px-2 py-1 rounded-full border text-sm font-normal leading-tight whitespace-nowrap border-gray-300 text-[#113EA1] transition-all duration-200 has-[:checked]:border-[#113EA1] has-[:checked]:bg-blue-50  hover:border-[#113EA1]">
                                <input type="radio" name="sort" value="popular" class="sr-only">
                                <span>Paling dicari</span>
                            </label>

                            <!-- Terlama -->
                            <label
                                class="flex items-center cursor-pointer px-2 py-1 rounded-full border text-sm font-normal leading-tight whitespace-nowrap border-gray-300 text-[#113EA1] transition-all duration-200 has-[:checked]:border-[#113EA1] has-[:checked]:bg-blue-50  hover:border-[#113EA1]">
                                <input type="radio" name="sort" value="oldest" class="sr-only">
                                <span>Terlama</span>
                            </label>

                            <!-- Terbaru -->
                            <label
                                class="flex items-center cursor-pointer px-2 py-1 rounded-full border text-sm font-normal leading-tight whitespace-nowrap border-gray-300 text-[#113EA1] transition-all duration-200 has-[:checked]:border-[#113EA1] has-[:checked]:bg-blue-50  hover:border-[#113EA1]">
                                <input type="radio" name="sort" value="newest" class="sr-only">
                                <span>Terbaru</span>
                            </label>

                            <!-- Termahal -->
                            <label
                                class="flex items-center cursor-pointer px-2 py-1 rounded-full border text-sm font-normal leading-tight whitespace-nowrap border-gray-300 text-[#113EA1] transition-all duration-200 has-[:checked]:border-[#113EA1] has-[:checked]:bg-blue-50  hover:border-[#113EA1]">
                                <input type="radio" name="sort" value="expensive" class="sr-only">
                                <span>Termahal</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Content Area -->
            <div class="flex-1">
                <!-- Top Bar with Search and Sort -->
                <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
                    <div class="relative w-full sm:max-w-md flex-1">
                        <input type="text" id="search-input" placeholder="Cari produk UMKM..."
                            class="w-full border border-gray-300 rounded-lg pl-10 pr-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <svg class="absolute left-3 top-3.5 w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <div class="flex items-center space-x-4 w-full sm:w-auto">
                        <span class="text-sm text-gray-600">Urutkan:</span>
                        <select id="sort-select"
                            class="w-full sm:w-auto border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="newest">Terbaru</option>
                            <option value="cheapest">Harga Terendah</option>
                            <option value="expensive">Harga Tertinggi</option>
                            <option value="popular">Populer</option>
                        </select>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8" id="products-grid">
                    @php
                        $products = [
                            [
                                'name' => 'Celyne Rattan Bag',
                                'price' => 'Rp.180.000',
                                'location' => 'Kabupaten Gowa',
                                'image' => 'bag.png',
                            ],
                            [
                                'name' => 'Handmade Batik Shirt',
                                'price' => 'Rp.250.000',
                                'location' => 'Yogyakarta',
                                'image' => 'bag.png',
                            ],
                            [
                                'name' => 'Traditional Wooden Craft',
                                'price' => 'Rp.120.000',
                                'location' => 'Jepara',
                                'image' => 'bag.png',
                            ],
                            [
                                'name' => 'Organic Coffee Beans',
                                'price' => 'Rp.85.000',
                                'location' => 'Toraja',
                                'image' => 'bag.png',
                            ],
                            [
                                'name' => 'Silver Jewelry Set',
                                'price' => 'Rp.320.000',
                                'location' => 'Kotagede',
                                'image' => 'bag.png',
                            ],
                            [
                                'name' => 'Bamboo Handicraft',
                                'price' => 'Rp.95.000',
                                'location' => 'Tasikmalaya',
                                'image' => 'bag.png',
                            ],
                        ];
                    @endphp

                    @foreach ($products as $index => $product)
                        <!-- Product Card {{ $index + 1 }} -->
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
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="flex justify-center items-center space-x-2 flex-wrap gap-2">
                    <button class="px-3 py-2 rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50"
                        id="prev-btn">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </button>
                    <button class="px-3 py-2 rounded-lg bg-[#113EA1] text-white page-btn active" data-page="1">1</button>
                    <button class="px-3 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 page-btn"
                        data-page="2">2</button>
                    <button class="px-3 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 page-btn"
                        data-page="3">3</button>
                    <span class="px-2">...</span>
                    <button class="px-3 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 page-btn"
                        data-page="10">10</button>
                    <button class="px-3 py-2 rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50"
                        id="next-btn">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Include HSRangeSlider CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/preline@2.0.3/dist/components/hs-range-slider.min.css">
    <script src="https://cdn.jsdelivr.net/npm/preline@2.0.3/dist/components/hs-range-slider.min.js"></script>

    <style>
        .accordion-content {
            overflow: hidden;
            max-height: 0;
            transition: max-height 0.3s ease-out;
        }

        /* Tambahkan padding untuk konten accordion harga */
        .accordion-content {
            padding: 0 4px;
        }

        /* Perbaikan tampilan range slider */
        #hs-pass-values-to-html-elements {
            margin-top: 12px;
            margin-bottom: 16px;
        }

        /* Perbaikan tampilan text harga */
        .accordion-content .flex.justify-start.items-center {
            margin-top: 8px;
            margin-bottom: 4px;
            padding: 4px 0;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize accordion functionality
            const accordionButtons = document.querySelectorAll('.accordion-button');

            // Tunggu range slider diinisialisasi sebelum membuka accordion
            setTimeout(() => {
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

                    // Kode untuk membuka accordion secara default
                    const content = button.nextElementSibling;
                    const icon = button.querySelector('.accordion-icon');
                    content.style.maxHeight = content.scrollHeight + 'px';
                    icon.style.transform = 'rotate(180deg)';

                    // Tambahkan penanganan khusus untuk accordion harga
                    if (content.querySelector('#hs-pass-values-to-html-elements')) {
                        // Recalculate height after range slider is fully initialized
                        setTimeout(() => {
                            content.style.maxHeight = content.scrollHeight + 'px';
                        }, 300);
                    }
                });
            }, 100);

            // Mobile filter toggle
            const mobileFilterToggle = document.getElementById('mobile-filter-toggle');
            const filterSidebar = document.getElementById('filter-sidebar');

            mobileFilterToggle.addEventListener('click', function() {
                filterSidebar.classList.toggle('hidden');
            });

            // Initialize HSRangeSlider
            window.addEventListener('load', () => {
                (function() {
                    const range = document.querySelector('#hs-pass-values-to-html-elements');
                    if (range && typeof HSRangeSlider !== 'undefined') {
                        const rangeInstance = new HSRangeSlider(range);
                        const min = document.querySelector(
                            '#hs-pass-values-to-html-elements-min-target');
                        const max = document.querySelector(
                            '#hs-pass-values-to-html-elements-max-target');

                        if (range.noUiSlider) {
                            range.noUiSlider.on('update', (values, handle) => {
                                if (rangeInstance.formattedValue) {
                                    min.textContent = rangeInstance.formattedValue[0];
                                    max.textContent = rangeInstance.formattedValue[1];
                                }
                            });
                        }

                        // Initialize values on load
                        if (rangeInstance.formattedValue) {
                            min.textContent = rangeInstance.formattedValue[0];
                            max.textContent = rangeInstance.formattedValue[1];
                        }
                    }
                })();
            });

            // Reset filter functionality
            document.getElementById('reset-filter').addEventListener('click', function() {
                document.querySelectorAll('input[type="radio"]').forEach(radio => radio.checked = false);
                document.getElementById('search-input').value = '';
                document.getElementById('sort-select').value = 'newest';

                // Reset range slider
                const range = document.querySelector('#hs-pass-values-to-html-elements');
                if (range && range.noUiSlider) {
                    range.noUiSlider.set([50, 1500]);
                }
            });

            // Pagination functionality
            document.querySelectorAll('.page-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    document.querySelectorAll('.page-btn').forEach(b => {
                        b.classList.remove('bg-[#113EA1]', 'text-white', 'active');
                        b.classList.add('border', 'border-gray-300', 'text-gray-700',
                            'hover:bg-gray-50');
                    });
                    this.classList.add('bg-[#113EA1]', 'text-white', 'active');
                    this.classList.remove('border', 'border-gray-300', 'text-gray-700',
                        'hover:bg-gray-50');
                });
            });

            // Search functionality
            document.getElementById('search-input').addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const productCards = document.querySelectorAll('.product-card');

                productCards.forEach(card => {
                    const productName = card.querySelector('h3').textContent.toLowerCase();
                    if (productName.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });

            // Category filter functionality
            document.querySelectorAll('input[name="category"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.checked) {
                        // Here you can add logic to filter products by category
                        console.log('Selected category:', this.value);
                    }
                });
            });

            // Sort filter functionality
            document.querySelectorAll('input[name="sort"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.checked) {
                        // Sync with dropdown
                        document.getElementById('sort-select').value = this.value;
                        // Here you can add logic to sort products
                        console.log('Selected sort:', this.value);
                    }
                });
            });

            // Sync dropdown with radio buttons
            document.getElementById('sort-select').addEventListener('change', function() {
                const sortValue = this.value;
                document.querySelectorAll('input[name="sort"]').forEach(radio => {
                    radio.checked = radio.value === sortValue;
                });
            });

            // Handle window resize for responsive sidebar
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768) { // md breakpoint
                    filterSidebar.classList.remove('hidden');
                    filterSidebar.classList.add('block');
                } else {
                    filterSidebar.classList.add('hidden');
                }
            });
        });
    </script>
@endsection
