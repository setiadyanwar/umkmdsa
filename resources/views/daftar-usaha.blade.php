@extends('layouts.app')

@php
    $currentRoute = 'daftar-usaha';
    $tokenGeneratedAt = session('form_token_generated_at', now());
    $tokenExpiresAt = $tokenGeneratedAt->addHours(24);
    $isTokenValid = now()->lt($tokenExpiresAt);
    $timeRemaining = $isTokenValid ? now()->diffInSeconds($tokenExpiresAt) : 0;
@endphp

@section('content')
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<div class="min-h-screen bg-gray-50 py-8 sm:py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-8 pt-26">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Daftar Usaha Anda</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Bergabunglah dengan komunitas UMKM binaan DSA dan kembangkan usaha Anda bersama kami
            </p>
        </div>

        <!-- Token Status & Countdown -->
        <div class="mb-6">
            @if($isTokenValid)
                <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-green-800 font-medium">Formulir Aktif</span>
                        </div>
                        <div class="text-right">
                            <div class="text-sm text-green-600">Waktu tersisa:</div>
                            <div id="countdown-timer" class="text-lg font-bold text-green-800" data-remaining="{{ $timeRemaining }}">
                                --:--:--
                            </div>
                        </div>
                    </div>
                    <p class="text-sm text-green-700 mt-2">
                        Anda memiliki waktu 24 jam untuk mengisi formulir ini. Setelah waktu habis, Anda perlu meminta token baru dari admin.
                    </p>
                </div>
            @else
                <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-red-800 font-medium">Token Formulir Kedaluwarsa</span>
                    </div>
                    <p class="text-sm text-red-700 mt-2">
                        Waktu pengisian formulir telah habis. Silakan hubungi admin untuk mendapatkan token baru.
                    </p>
                    <button onclick="requestNewToken()" class="mt-3 bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                        Minta Token Baru
                    </button>
                </div>
            @endif
        </div>

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden {{ !$isTokenValid ? 'opacity-50 pointer-events-none' : '' }}">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                <!-- Left Side - Form -->
                <div class="p-6 sm:p-8 lg:p-10">
                    <!-- Form Header -->
                    <div class="bg-[#113EA1] text-white rounded-xl p-4 mb-8">
                        <h2 class="text-xl font-semibold">Formulir Daftar Usaha</h2>
                    </div>

                    <form id="business-registration-form" class="space-y-6">
                        <!-- Hidden coordinates fields -->
                        <input type="hidden" id="latitude" name="latitude" value="">
                        <input type="hidden" id="longitude" name="longitude" value="">

                        <!-- Business Name -->
                        <div>
                            <label for="business-name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Usaha<span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="business-name" name="business_name" required
                                placeholder="misal. kedas beauty"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                        </div>

                        <!-- Business Category -->
                        <div>
                            <label for="business-category" class="block text-sm font-medium text-gray-700 mb-2">
                                Kategori Usaha<span class="text-red-500">*</span>
                            </label>
                            <select id="business-category" name="business_category" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                <option value="">Pilih kategori usahamu</option>
                                <option value="kerajinan">Kerajinan Kriya</option>
                                <option value="fashion">Fashion & Aksesoris</option>
                                <option value="makanan">Makanan & Minuman</option>
                                <option value="pertanian">Pertanian & Perkebunan</option>
                                <option value="jasa">Jasa</option>
                                <option value="teknologi">Teknologi</option>
                                <option value="kesehatan">Kesehatan & Kecantikan</option>
                            </select>
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                Deskripsi<span class="text-red-500">*</span>
                            </label>
                            <textarea id="description" name="description" rows="4" required
                                placeholder="ketikkan deskripsi dari usahamu"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-none"></textarea>
                        </div>

                        <!-- Start Date -->
                        <div>
                            <label for="start-date" class="block text-sm font-medium text-gray-700 mb-2">
                                Tanggal mulai usaha<span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="date" id="start-date" name="start_date" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                            </div>
                        </div>

                        <!-- Location -->
                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-2">
                                Lokasi usaha<span class="text-red-500">*</span>
                            </label>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm text-gray-600">Gunakan lokasimu saat ini?</span>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" id="use-current-location" class="sr-only peer">
                                    <div class="relative w-11 h-6 bg-gray-200 focus:outline-none peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                </label>
                            </div>
                            <select id="location" name="location" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                <option value="">pilih lokasi usahamu</option>
                                <option value="jakarta">DKI Jakarta</option>
                                <option value="bogor">Bogor</option>
                                <option value="depok">Depok</option>
                                <option value="tangerang">Tangerang</option>
                                <option value="bekasi">Bekasi</option>
                                <option value="bandung">Bandung</option>
                                <option value="yogyakarta">Yogyakarta</option>
                                <option value="surabaya">Surabaya</option>
                            </select>
                        </div>

                        <!-- Interactive Map -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Tentukan Lokasi Tepat<span class="text-red-500">*</span>
                            </label>
                            <div class="bg-gray-100 rounded-lg p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span class="text-sm font-medium text-gray-700">Klik pada peta untuk menentukan lokasi</span>
                                    </div>
                                    <button type="button" id="clear-marker" class="text-xs text-red-600 hover:text-red-800">
                                        Hapus Marker
                                    </button>
                                </div>
                                
                                <!-- Map Container -->
                                <div id="map" class="w-full h-64 rounded-lg border border-gray-300 bg-gray-200"></div>
                                
                                <!-- Coordinates Display -->
                                <div id="coordinates-display" class="mt-3 text-xs text-gray-600 hidden">
                                    <div class="flex items-center space-x-4">
                                        <span>Latitude: <span id="display-lat">-</span></span>
                                        <span>Longitude: <span id="display-lng">-</span></span>
                                        <span class="text-green-600 font-medium">✓ Lokasi dipilih</span>
                                    </div>
                                </div>
                                
                                <p class="text-xs text-gray-500 mt-2">
                                    Klik pada peta untuk menandai lokasi usaha Anda. Marker dapat dipindahkan dengan mengklik lokasi baru.
                                </p>
                            </div>
                        </div>

                        <!-- Social Media -->
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Sosial Media</h3>
                            <div class="space-y-3">
                                <!-- Instagram -->
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-br from-purple-600 to-pink-500 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                        </svg>
                                    </div>
                                    <input type="text" name="instagram" placeholder="@example"
                                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                </div>

                                <!-- TikTok -->
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-black rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-.88-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/>
                                        </svg>
                                    </div>
                                    <input type="text" name="tiktok" placeholder="@example"
                                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                </div>

                                <!-- Facebook -->
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                        </svg>
                                    </div>
                                    <input type="text" name="facebook" placeholder="@example"
                                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Right Side - Contact Info & Process -->
                <div class="bg-gray-50 p-6 sm:p-8 lg:p-10">
                    <!-- Contact Information -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            Informasi Kontak<span class="text-red-500">*</span>
                        </h3>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm text-gray-600 mb-1">Nomor Telepon</label>
                                <input type="tel" name="phone" placeholder="misal. kedas beauty"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 mb-1">Email</label>
                                <input type="email" name="email" placeholder="misal.example@dsa.com"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm text-gray-600 mb-1">Website</label>
                            <input type="url" name="website" placeholder="misal.www.dsa.com"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                        </div>
                    </div>

                    <!-- File Upload -->
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Upload lampiran</h3>
                        <p class="text-sm text-gray-600 mb-4">unggah lampiran bukti usaha seperti NIB, Haki atau dokumen lainnya</p>
                        
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-blue-400 transition-colors">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="text-gray-500 mb-2">unggah lampirannya disini</p>
                                <input type="file" id="file-upload" name="documents[]" multiple accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" class="hidden">
                                <label for="file-upload" class="cursor-pointer bg-blue-50 text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-100 transition-colors">
                                    Pilih File
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Terms -->
                    <div class="mb-6">
                        <label class="flex items-start">
                            <input type="checkbox" name="terms" required class="mt-1 mr-3 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <span class="text-sm text-gray-600">
                                dengan ini saya telah menyetujui seluruh 
                                <a href="#" class="text-blue-600 hover:underline">syarat dan ketentuan umkmdsa.id</a>
                            </span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" form="business-registration-form"
                        class="w-full bg-gray-400 text-white py-3 px-6 rounded-lg font-medium hover:bg-blue-600 transition-colors duration-200 flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                        Kirim Formulir
                    </button>

                    <!-- Process Flow -->
                    <div class="mt-8">
                        <div class="flex items-center justify-between text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center mb-2">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </div>
                                <span class="text-xs text-gray-600">Isi Formulir</span>
                            </div>
                            
                            <div class="flex-1 h-px bg-gray-300 mx-2"></div>
                            
                            <div class="flex flex-col items-center">
                                <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center mb-2">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-xs text-gray-600">Proses Verifikasi</span>
                            </div>
                            
                            <div class="flex-1 h-px bg-gray-300 mx-2"></div>
                            
                            <div class="flex flex-col items-center">
                                <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center mb-2">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                </div>
                                <span class="text-xs text-gray-600">Diberi Tanggapan</span>
                            </div>
                            
                            <div class="flex-1 h-px bg-gray-300 mx-2"></div>
                            
                            <div class="flex flex-col items-center">
                                <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center mb-2">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-xs text-gray-600">Selesai</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('business-registration-form');
    const submitBtn = document.querySelector('button[type="submit"]');
    const fileUpload = document.getElementById('file-upload');
    const useLocationToggle = document.getElementById('use-current-location');
    const countdownTimer = document.getElementById('countdown-timer');
    const timeRemaining = parseInt(countdownTimer?.dataset.remaining || 0);
    
    // Initialize map
    let map, marker;
    let selectedLat = null, selectedLng = null;
    
    function initMap() {
        // Default to Indonesia center
        map = L.map('map').setView([-6.2088, 106.8456], 10);
        
        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);
        
        // Add click event to map
        map.on('click', function(e) {
            const lat = e.latlng.lat;
            const lng = e.latlng.lng;
            
            // Remove existing marker
            if (marker) {
                map.removeLayer(marker);
            }
            
            // Add new marker
            marker = L.marker([lat, lng], {
                draggable: true
            }).addTo(map);
            
            // Update coordinates
            updateCoordinates(lat, lng);
            
            // Add drag event to marker
            marker.on('dragend', function(e) {
                const newLat = e.target.getLatLng().lat;
                const newLng = e.target.getLatLng().lng;
                updateCoordinates(newLat, newLng);
            });
        });
    }
    
    function updateCoordinates(lat, lng) {
        selectedLat = lat;
        selectedLng = lng;
        
        // Update hidden form fields
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
        
        // Update display
        document.getElementById('display-lat').textContent = lat.toFixed(6);
        document.getElementById('display-lng').textContent = lng.toFixed(6);
        document.getElementById('coordinates-display').classList.remove('hidden');
        
        // Validate form
        validateForm();
    }
    
    // Clear marker functionality
    document.getElementById('clear-marker').addEventListener('click', function() {
        if (marker) {
            map.removeLayer(marker);
            marker = null;
        }
        
        selectedLat = null;
        selectedLng = null;
        document.getElementById('latitude').value = '';
        document.getElementById('longitude').value = '';
        document.getElementById('coordinates-display').classList.add('hidden');
        validateForm();
    });
    
    // Initialize map
    initMap();
    
    // Countdown timer functionality
    if (timeRemaining > 0) {
        let remaining = timeRemaining;
        
        function updateCountdown() {
            const hours = Math.floor(remaining / 3600);
            const minutes = Math.floor((remaining % 3600) / 60);
            const seconds = remaining % 60;
            
            const timeString = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            countdownTimer.textContent = timeString;
            
            if (remaining <= 0) {
                // Time expired - reload page or show expired state
                location.reload();
            }
            
            remaining--;
        }
        
        // Update immediately and then every second
        updateCountdown();
        setInterval(updateCountdown, 1000);
    }
    
    // Form validation
    function validateForm() {
        const requiredFields = form.querySelectorAll('[required]');
        const termsCheckbox = document.querySelector('input[name="terms"]');
        let isValid = true;
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
            }
        });
        
        // Check if location is selected
        if (!selectedLat || !selectedLng) {
            isValid = false;
        }
        
        if (!termsCheckbox.checked) {
            isValid = false;
        }
        
        // Update submit button state
        if (isValid) {
            submitBtn.classList.remove('bg-gray-400');
            submitBtn.classList.add('bg-blue-600');
            submitBtn.disabled = false;
        } else {
            submitBtn.classList.add('bg-gray-400');
            submitBtn.classList.remove('bg-blue-600');
            submitBtn.disabled = true;
        }
    }
    
    // Add event listeners for form validation
    form.addEventListener('input', validateForm);
    form.addEventListener('change', validateForm);
    
    // File upload handling
    fileUpload.addEventListener('change', function(e) {
        const files = Array.from(e.target.files);
        const uploadArea = fileUpload.closest('.border-dashed');
        
        if (files.length > 0) {
            const fileList = files.map(file => file.name).join(', ');
            uploadArea.innerHTML = `
                <div class="flex flex-col items-center">
                    <svg class="w-12 h-12 text-green-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-green-600 mb-2">${files.length} file(s) dipilih</p>
                    <p class="text-sm text-gray-500 mb-2">${fileList}</p>
                    <label for="file-upload" class="cursor-pointer bg-blue-50 text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-100 transition-colors">
                        Ganti File
                    </label>
                </div>
            `;
        }
    });
    
    // Location toggle
    useLocationToggle.addEventListener('change', function() {
        if (this.checked) {
            // Get user's current location
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;
                    
                    // Center map on user location
                    map.setView([lat, lng], 15);
                    
                    // Remove existing marker
                    if (marker) {
                        map.removeLayer(marker);
                    }
                    
                    // Add marker at user location
                    marker = L.marker([lat, lng], {
                        draggable: true
                    }).addTo(map);
                    
                    // Update coordinates
                    updateCoordinates(lat, lng);
                    
                    // Add drag event to marker
                    marker.on('dragend', function(e) {
                        const newLat = e.target.getLatLng().lat;
                        const newLng = e.target.getLatLng().lng;
                        updateCoordinates(newLat, newLng);
                    });
                }, function(error) {
                    alert('Tidak dapat mengakses lokasi. Silakan pilih lokasi secara manual pada peta.');
                    useLocationToggle.checked = false;
                });
            } else {
                alert('Geolocation tidak didukung oleh browser ini.');
                useLocationToggle.checked = false;
            }
        }
    });
    
    // Form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (!selectedLat || !selectedLng) {
            alert('Silakan pilih lokasi pada peta terlebih dahulu.');
            return;
        }
        
        // Show loading state
        submitBtn.innerHTML = `
            <svg class="animate-spin w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Mengirim...
        `;
        submitBtn.disabled = true;
        
        // Collect form data including coordinates
        const formData = new FormData(form);
        formData.append('latitude', selectedLat);
        formData.append('longitude', selectedLng);
        
        // Simulate form submission
        setTimeout(() => {
            alert(`Formulir berhasil dikirim!\nLokasi: ${selectedLat.toFixed(6)}, ${selectedLng.toFixed(6)}\nTim kami akan menghubungi Anda dalam 1-2 hari kerja.`);
            form.reset();
            
            // Clear map marker
            if (marker) {
                map.removeLayer(marker);
                marker = null;
            }
            selectedLat = null;
            selectedLng = null;
            document.getElementById('coordinates-display').classList.add('hidden');
            
            validateForm();
            
            // Reset submit button
            submitBtn.innerHTML = `
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                </svg>
                Kirim Formulir
            `;
        }, 2000);
    });
    
    // Initial validation
    validateForm();
});

// Request new token function
function requestNewToken() {
    // In a real application, this would make an API call to request a new token
    if (confirm('Apakah Anda ingin meminta token baru dari admin? Anda akan diarahkan ke halaman kontak.')) {
        // Redirect to contact page or show contact modal
        alert('Silakan hubungi admin di email: admin@umkmdsa.id atau WhatsApp: +62-xxx-xxxx-xxxx untuk mendapatkan token baru.');
    }
}
</script>
@endsection
