@extends('layouts.app')

@php
    $currentRoute = 'etalase';
@endphp

@section('content')
    <div class="pt-32 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <!-- Breadcrumb -->
            <nav class="text-sm text-gray-500 flex items-center space-x-2 mb-8 md:mb-14" aria-label="Breadcrumb">
                <a href="{{ route('homepage') }}"
                    class="hover:text-[#113EA1] transition-colors duration-200 font-medium whitespace-nowrap">
                    Beranda
                </a>
                <span class="text-gray-400 mx-2">/</span>
                <a href="{{ route('etalase') }}"
                    class="hover:text-[#113EA1] transition-colors duration-200 font-medium whitespace-nowrap">
                    Etalase
                </a>
                <span class="text-gray-400 mx-2">/</span>
                <span class="text-gray-800 font-semibold truncate" aria-current="page">
                    {{ $product->name }}
                </span>
            </nav>

            <!-- Product Detail Section -->
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 mb-16">
                <!-- Product Images -->
                <div class="space-y-4">
                    <!-- Main Image -->
                    <div class="relative">
                        <div class="w-full aspect-square bg-gray-50 rounded-2xl overflow-hidden">
                            <img id="main-image"
                                src="{{ $product->primaryImage ? asset('storage/' . $product->primaryImage->image_url) : asset('images/default-image.png') }}"
                                alt="{{ $product->name }}"
                                class="w-full h-full object-cover cursor-zoom-in transition-transform hover:scale-105"
                                loading="lazy" />
                        </div>
                    </div>

                    <!-- Thumbnail Images -->
                    @if($product->images && $product->images->count() > 1)
                        <div class="flex space-x-3 overflow-x-auto pb-2 scrollbar-hide">
                            @foreach ($product->images as $index => $image)
                                <div class="flex-shrink-0 w-16 h-16 md:w-20 md:h-20 bg-white rounded-lg border-2 cursor-pointer transition-all hover:border-[#113EA1] thumbnail-image {{ $index === 0 ? 'border-[#113EA1]' : 'border-gray-200' }}"
                                    data-image="{{ asset('storage/' . $image->image_url) }}">
                                    <img src="{{ $image->image_url ? asset('storage/' . $image->image_url) : asset('images/default-image.png') }}"
                                        alt="{{ $product->name }} - {{ $index + 1 }}" class="w-full h-full object-cover rounded-lg"
                                        loading="lazy">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Product Info -->
                <div class="space-y-6">
                    <!-- Product Title & Wishlist -->
                    <div class="flex items-start justify-between">
                        <div class="flex-1 pr-4">
                            <h1 class="text-xl md:text-3xl font-bold text-gray-900 mb-2">
                                {{ $product->name }}
                            </h1>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-3 h-3 md:w-4 md:h-4 mr-1 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="truncate">{{ $product->umkm->location ?? 'Lokasi tidak tersedia' }}</span>
                            </div>
                        </div>
                        <button id="share-product"
                            class="cursor-pointer w-8 h-8 md:w-10 md:h-10 flex items-center justify-center rounded-full text-blue-800 bg-[#E7ECF6] hover:bg-blue-100 hover:scale-105 transition-all flex-shrink-0">
                            <i class="fa-solid fa-share-nodes"></i>
                        </button>
                    </div>

                    <!-- Price Section -->
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2 md:space-x-3">
                            @if ($product->price_original > $product->price_final)
                                <span class="text-sm md:text-base text-gray-500 line-through">
                                    Rp{{ number_format($product->price_original, 0, ',', '.') }}
                                </span>
                            @endif

                            <span class="text-lg md:text-xl font-bold text-[#113EA1]">
                                Rp{{ number_format($product->price_final, 0, ',', '.') }}
                            </span>

                            @if ($product->discount_percent)
                                <span
                                    class="bg-[rgba(234,75,72,0.1)] text-red-600 px-2 py-0.5 md:px-3 md:py-1 rounded-full text-xs md:text-sm font-medium">
                                    {{ $product->discount_percent }}% Off
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="mb-4 md:mb-6 border-t border-[#C3C3C3] pt-3">
                        <p class="text-gray-900 leading-relaxed mb-3">
                            {{ $product->description ?? 'Tidak ada deskripsi.' }}
                        </p>
                        <div class="text-gray-900 space-y-1 text-sm">
                            <div>
                                <span class="font-medium">Category:</span>
                                <span class="text-gray-700">{{ $product->category->name ?? '-' }}</span>
                            </div>
                            <div>
                                <span class="font-medium">Tag:</span>
                                <span
                                    class="text-gray-700">{{ is_array($product->tags) ? implode(', ', $product->tags) : $product->tags }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Quantity & Action -->
                    <div class="flex flex-col md:flex-row md:items-center space-y-3 md:space-y-0 md:space-x-4 mb-4 md:mb-6">
                        <!-- Quantity Selector -->
                        <div class="flex items-center space-x-4">
                            <div class="py-2 px-3 bg-white border border-gray-200 rounded-full" data-hs-input-number>
                                <div class="flex items-center gap-x-1.5">
                                    <button type="button"
                                        class="size-8 inline-flex justify-center items-center text-sm font-medium rounded-full border border-gray-200 bg-[#113EA1] text-white hover:bg-blue-800 transition-colors disabled:opacity-50 cursor-pointer disabled:pointer-events-none"
                                        data-hs-input-number-decrement>
                                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                        </svg>
                                    </button>
                                    <input
                                        class="p-0 w-6 bg-transparent border-0 text-gray-800 text-center focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none"
                                        style="-moz-appearance: textfield;" type="number" value="1" min="1"
                                        data-hs-input-number-input>
                                    <button type="button"
                                        class="size-8 inline-flex justify-center items-center text-sm font-medium rounded-full border border-gray-200 bg-[#113EA1] text-white hover:bg-blue-800 transition-colors disabled:opacity-50 cursor-pointer disabled:pointer-events-none"
                                        data-hs-input-number-increment>
                                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5v14"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Button -->
                        <button id="contact-seller"
                            class="w-full bg-[#113EA1] text-white py-3 md:py-4 rounded-full text-sm md:text-base font-medium hover:bg-blue-800 transition-colors flex items-center justify-center space-x-2 cursor-pointer">
                            <span>Hubungi Penjual</span>
                            <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.097" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-blue-800 text-sm">*Jika ingin memesan akan dihubungkan dengan whatsapp dari pihak toko
                        secara langsung</p>

                    <!-- Store Info -->
                    <div class="border border-gray-200 rounded-2xl p-4 md:p-6">
                        <div class="flex items-center space-x-4">
                            <div
                                class="w-12 h-12 md:w-16 md:h-16 bg-gradient-to-br from-[#113EA1] to-blue-600 rounded-full flex items-center justify-center border-2 border-gray-200 overflow-hidden flex-shrink-0">
                                <img src="{{ $product->umkm->logo ? asset('storage/' . $product->umkm->logo) : asset('images/default-image.png') }}"
                                    alt="{{ $product->umkm->name }}" class="w-full h-full object-cover" loading="lazy" />
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="font-bold text-gray-900 text-base md:text-lg truncate">
                                    {{ $product->umkm->name }}
                                </h3>
                                <div class="flex items-center text-xs md:text-sm text-gray-600">
                                    <svg class="w-3 h-3 md:w-4 md:h-4 mr-1 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="truncate">{{ $product->umkm->location ?? 'Lokasi tidak tersedia' }}</span>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <a href="{{ route('umkm-binaan', $product->umkm->slug) }}"
                                    class="bg-[#E7ECF6] text-[#113EA1] px-3 py-1.5 md:px-4 md:py-2 rounded-xl text-xs md:text-sm font-medium border-2 border-[#113EA1] hover:bg-[#113EA1] hover:text-white transition-colors">
                                    <i class="fa-solid fa-store mr-1"></i>
                                    <span class="hidden sm:inline">Lihat Toko</span>
                                    <span class="sm:hidden">Toko</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products Section -->
            @if($product->umkm && $product->umkm->products && $product->umkm->products->where('id', '!=', $product->id)->count() > 0)
                <div class="mb-16 overflow-hidden">
                    <div class="flex justify-between items-center mb-8">
                        <h2 class="text-xl md:text-2xl font-bold text-gray-900">Produk Lainnya dari Toko</h2>
                    </div>

                    <div class="border-2 border-gray-200 rounded-2xl md:rounded-3xl p-4 md:p-6">
                        <div class="flex flex-col lg:flex-row items-start lg:items-center">
                            <!-- Store Info Panel -->
                            <div
                                class="w-full lg:w-50 h-full flex-shrink-0 rounded-xl md:rounded-2xl flex flex-col justify-center items-center text-center">
                                <!-- Store Logo -->
                                <div
                                    class="w-16 h-16 md:w-20 md:h-20 mx-auto mb-3 md:mb-4 bg-white rounded-full flex items-center justify-center border-2 border-gray-200 overflow-hidden">
                                    <img src="{{ $product->umkm->logo ? asset('storage/' . $product->umkm->logo) : asset('images/default-image.png') }}"
                                        alt="{{ $product->umkm->name }}" class="w-full h-full object-cover" loading="lazy" />
                                </div>

                                <!-- Store Name -->
                                <h3 class="text-lg md:text-xl font-bold text-gray-800 mb-1 md:mb-2">
                                    {{ $product->umkm->name }}
                                </h3>

                                <!-- Location -->
                                <div class="flex items-center text-gray-400 text-sm truncate gap-2 mb-4 md:mb-6">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span
                                        class="text-xs md:text-sm">{{ $product->umkm->location ?? 'Lokasi tidak tersedia' }}</span>
                                </div>

                                <!-- View All Button -->
                                <a href="{{ route('umkm-binaan', $product->umkm->slug) }}"
                                    class="inline-block w-full text-center text-[#113EA1] underline font-medium py-2 md:py-3 px-4 md:px-6 hover:text-blue-700 transition-colors rounded-lg">
                                    Lihat Semua
                                </a>
                            </div>

                            <!-- Products Grid -->
                            <div class="h-full overflow-x-auto scrollbar-hide" style="scroll-snap-type: x mandatory;">
                                <div class="h-full flex items-stretch gap-4 lg:gap-6 p-2">
                                    @foreach($product->umkm->products->where('id', '!=', $product->id)->take(8) as $relatedProduct)
                                        <a href="{{ route('singleview', $relatedProduct->slug) }}"
                                            class="bg-white rounded-2xl border border-gray-100 hover:border-[#113EA1] hover:shadow-lg transition-all duration-300 hover:-translate-y-1 cursor-pointer h-full flex flex-col"
                                            style="scroll-snap-align: start;">
                                            <div class="h-full flex flex-col w-60 lg:w-72 min-h-[360px]">
                                                <div class="mb-2 flex justify-center">
                                                    <div class="aspect-square w-full bg-gray-50 rounded-t-2xl overflow-hidden">
                                                        <img src="{{ $relatedProduct->primaryImage ? asset('storage/' . $relatedProduct->primaryImage->image_url) : asset('images/default-image.png') }}"
                                                            alt="{{ $relatedProduct->name }}" class="w-full h-full object-cover"
                                                            loading="lazy" />
                                                    </div>
                                                </div>
                                                <div class="mx-2 mb-2 flex-1 flex flex-col justify-between gap-2">
                                                    <div>
                                                        <h3 class="font-semibold text-gray-900 line-clamp-2">
                                                            {{ $relatedProduct->name }}
                                                        </h3>
                                                        <p class="text-[#113EA1] font-bold text-lg truncate">
                                                            Rp.{{ number_format($relatedProduct->price_final, 0, ',', '.') }}
                                                        </p>
                                                        <div class="flex items-center text-gray-400 text-sm truncate gap-2">
                                                            <i class="fa-solid fa-location-dot"></i>
                                                            <span>{{ $relatedProduct->umkm->location ?? 'Lokasi tidak tersedia' }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Image Gallery Functionality
            const mainImage = document.getElementById('main-image');
            const thumbnails = document.querySelectorAll('.thumbnail-image');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function () {
                    const newImageSrc = this.getAttribute('data-image');

                    // Update main image
                    mainImage.src = newImageSrc;

                    // Update active thumbnail
                    thumbnails.forEach(thumb => {
                        thumb.classList.remove('border-[#113EA1]');
                        thumb.classList.add('border-gray-200');
                    });

                    this.classList.remove('border-gray-200');
                    this.classList.add('border-[#113EA1]');
                });
            });

            // Quantity Input Functionality
            const quantityWrapper = document.querySelector('[data-hs-input-number]');
            let quantityInput;
            if (quantityWrapper) {
                const quantityInput = quantityWrapper.querySelector('[data-hs-input-number-input]');
                const decrementBtn = quantityWrapper.querySelector('[data-hs-input-number-decrement]');
                const incrementBtn = quantityWrapper.querySelector('[data-hs-input-number-increment]');

                function updateButtons() {
                    const value = parseInt(quantityInput.value) || 1;
                    decrementBtn.disabled = value <= 1;
                    incrementBtn.disabled = value >= 99;
                }

                decrementBtn.addEventListener('click', function () {
                    const currentValue = parseInt(input.value) || 1;
                    if (currentValue > 1) {
                        quantityInput.value = currentValue - 1;
                        updateButtons();
                    }
                });

                incrementBtn.addEventListener('click', function () {
                    const currentValue = parseInt(input.value) || 1;
                    if (currentValue < 99) {
                        quantityInput.value = currentValue + 1;
                        updateButtons();
                    }
                });

                quantityInput.addEventListener('input', function () {
                    let value = parseInt(this.value) || 1;
                    if (value < 1) value = 1;
                    this.value = value;
                    updateButtons();
                });

                // Initialize
                updateButtons();
            }

            // Contact Seller Functionality
            const contactBtn = document.getElementById('contact-seller');
            if (contactBtn) {
                contactBtn.addEventListener('click', function () {
                    const productName = "{{ $product->name }}";
                    const productPrice = "{{ number_format($product->price_final, 0, ',', '.') }}";
                    const quantity = quantityInput ? quantityInput.value : 1;

                    const message = `Halo, saya tertarik dengan produk "${productName}" dengan harga Rp${productPrice}. Jumlah yang saya inginkan: ${quantity} pcs. Bisakah kita diskusikan lebih lanjut?`;
                    const whatsappUrl = `https://wa.me/{{ $product->umkm->phone ?? '' }}?text=${encodeURIComponent(message)}`;

                    window.open(whatsappUrl, '_blank');
                });
            }

            // Share Product Functionality
            const shareBtn = document.getElementById('share-product');
            if (shareBtn) {
                shareBtn.addEventListener('click', function () {
                    if (navigator.share) {
                        navigator.share({
                            title: "{{ $product->name }}",
                            text: "Lihat produk UMKM ini: {{ $product->name }}",
                            url: window.location.href
                        }).catch(console.error);
                    } else {
                        // Fallback: copy to clipboard
                        navigator.clipboard.writeText(window.location.href).then(() => {
                            // Show temporary success message
                            const originalText = shareBtn.innerHTML;
                            shareBtn.innerHTML = '<svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>';
                            setTimeout(() => {
                                shareBtn.innerHTML = originalText;
                            }, 2000);
                        }).catch(console.error);
                    }
                });
            }
        });
    </script>
@endsection