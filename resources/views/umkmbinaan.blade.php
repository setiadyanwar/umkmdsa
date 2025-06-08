@extends('layouts.app')

@php
    $currentRoute = 'umkmbinaan';
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
                        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-2">UMKM Binaan DSA</h1>
                        <p class="text-sm sm:text-base md:text-lg text-gray-200 max-w-xl mx-auto">
                            Jelajahi produk unik berkualitas tinggi dari pengusaha lokal yang penuh dedikasi
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Main Content -->
<section class="py-12 sm:py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar -->
            <div class="lg:w-1/4">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sticky top-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Semua UMKM</h3>
                    
                    <!-- Category Filter -->
                    <div class="space-y-3">
                        <div class="text-sm text-gray-600 mb-2">Portfolio 13650 foto</div>
                        
                        <!-- Alphabet Filter -->
                        <div class="flex flex-wrap gap-1 mb-4">
                            @foreach(range('A', 'Z') as $letter)
                                <button class="w-8 h-8 text-xs border border-gray-300 rounded hover:bg-blue-50 hover:border-blue-300 transition-colors {{ $letter === 'A' ? 'bg-blue-50 border-blue-300 text-blue-600' : 'text-gray-600' }}">
                                    {{ $letter }}
                                </button>
                            @endforeach
                        </div>
                        
                        <!-- Category List -->
                        <div class="space-y-2">
                            @php
                                $categories = [
                                    'Kerajinan Kriya',
                                    'Fashion & Aksesoris', 
                                    'Pertanian & Perkebunan',
                                    'Jasa',
                                    'Seni & Musik',
                                    'Komputer & Elektronik',
                                    'Makanan & Minuman',
                                    'Kesehatan & Kecantikan',
                                    'Pertanian & Perkebunan',
                                    'Handphone & Aksesoris'
                                ];
                            @endphp
                            
                            @foreach($categories as $category)
                                <label class="flex items-center cursor-pointer hover:bg-gray-50 p-2 rounded">
                                    <input type="checkbox" class="mr-3 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    <span class="text-sm text-gray-700">{{ $category }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:w-3/4">
                <!-- Company Logos Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6 mb-12">
                    @php
                        $companies = [
                            ['name' => 'Apple', 'logo' => 'https://logo.clearbit.com/apple.com', 'category' => 'teknologi'],
                            ['name' => 'Nike', 'logo' => 'https://logo.clearbit.com/nike.com', 'category' => 'fashion'],
                            ['name' => 'Puma', 'logo' => 'https://logo.clearbit.com/puma.com', 'category' => 'fashion'],
                            ['name' => 'Hermes', 'logo' => 'https://logo.clearbit.com/hermes.com', 'category' => 'fashion'],
                            ['name' => 'Wrangler', 'logo' => 'https://logo.clearbit.com/wrangler.com', 'category' => 'fashion'],
                            ['name' => 'PSN Store', 'logo' => 'https://logo.clearbit.com/playstation.com', 'category' => 'teknologi'],
                            ['name' => 'Adobe', 'logo' => 'https://logo.clearbit.com/adobe.com', 'category' => 'teknologi'],
                            ['name' => 'Almadall', 'logo' => 'https://logo.clearbit.com/amazon.com', 'category' => 'teknologi'],
                            ['name' => 'PSN Store', 'logo' => 'https://logo.clearbit.com/playstation.com', 'category' => 'teknologi'],
                            ['name' => 'PSN Store', 'logo' => 'https://logo.clearbit.com/playstation.com', 'category' => 'teknologi'],
                            ['name' => 'PSN Store', 'logo' => 'https://logo.clearbit.com/playstation.com', 'category' => 'teknologi'],
                            ['name' => 'PSN Store', 'logo' => 'https://logo.clearbit.com/playstation.com', 'category' => 'teknologi'],
                        ];
                    @endphp

                    @foreach($companies as $company)
                        <div class="company-card bg-white rounded-xl border border-gray-200 p-4 hover:shadow-lg hover:border-blue-300 transition-all duration-300 cursor-pointer group">
                            <div class="aspect-square flex items-center justify-center mb-3">
                                <img src="{{ $company['logo'] }}" 
                                     alt="{{ $company['name'] }}" 
                                     class="w-12 h-12 object-contain group-hover:scale-110 transition-transform duration-300"
                                     onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNDgiIGhlaWdodD0iNDgiIHZpZXdCb3g9IjAgMCA0OCA0OCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHJlY3Qgd2lkdGg9IjQ4IiBoZWlnaHQ9IjQ4IiByeD0iOCIgZmlsbD0iIzMzNzNkYyIvPgo8dGV4dCB4PSIyNCIgeT0iMzAiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIxNiIgZm9udC13ZWlnaHQ9ImJvbGQiIGZpbGw9IndoaXRlIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj57eyBzdWJzdHIoJGNvbXBhbnlbJ25hbWUnXSwgMCwgMSkgfX08L3RleHQ+Cjwvc3ZnPgo='">
                            </div>
                            <div class="text-center">
                                <h4 class="font-medium text-gray-900 text-sm">{{ $company['name'] }}</h4>
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
                        <button class="w-8 h-8 rounded-full {{ $i === 2 ? 'bg-blue-600 text-white' : 'border border-gray-300 hover:bg-gray-50' }} flex items-center justify-center text-sm">
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

                <!-- Achievements Section -->
                <div class="mb-12">
                    <h2 class="text-2xl md:text-3xl font-bold text-center text-gray-900 mb-8">
                        Prestasi membanggakan
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
                    <a
                       class="inline-flex items-center px-8 py-3 bg-white text-blue-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Daftar Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Alphabet filter functionality
    const alphabetButtons = document.querySelectorAll('button[class*="w-8 h-8"]');
    const companyCards = document.querySelectorAll('.company-card');
    
    alphabetButtons.forEach(button => {
        button.addEventListener('click', function() {
            const letter = this.textContent.trim();
            
            // Update active state
            alphabetButtons.forEach(btn => {
                btn.classList.remove('bg-blue-50', 'border-blue-300', 'text-blue-600');
                btn.classList.add('text-gray-600');
            });
            
            this.classList.add('bg-blue-50', 'border-blue-300', 'text-blue-600');
            this.classList.remove('text-gray-600');
            
            // Filter companies (for demo purposes, we'll just show/hide randomly)
            companyCards.forEach((card, index) => {
                if (letter === 'A' || Math.random() > 0.5) {
                    card.style.display = 'block';
                    card.style.animation = 'fadeIn 0.3s ease-in-out';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
    
    // Category filter functionality
    const categoryCheckboxes = document.querySelectorAll('input[type="checkbox"]');
    
    categoryCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            // Filter logic would go here
            console.log('Category filter changed:', this.nextElementSibling.textContent);
        });
    });
    
    // Company card click functionality
    companyCards.forEach(card => {
        card.addEventListener('click', function() {
            const companyName = this.querySelector('h4').textContent;
            // You could redirect to a company detail page or show a modal
            console.log('Clicked on company:', companyName);
        });
    });
    
    // Achievement cards hover effect
    const achievementCards = document.querySelectorAll('.relative.rounded-xl');
    
    achievementCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px)';
            this.style.transition = 'transform 0.3s ease';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});

// Add CSS animation for fade in effect
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
`;
document.head.appendChild(style);
</script>
@endsection
