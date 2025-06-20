@extends('layouts.app')

@php
    use Carbon\Carbon;
    $currentRoute = 'daftar-usaha';
    $expiresAt = $expiresAt ?? null;
    $tokenStatus = $tokenStatus ?? 'none';
    $timeRemaining = $tokenStatus === 'valid' && $expiresAt ? now()->diffInSeconds($expiresAt, false) : 0;
@endphp

@section('content')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- Flatpickr CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <div class="min-h-screen bg-white py-8 sm:py-12">
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
                @if($tokenStatus === 'none')
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-red-800 font-medium">Token Formulir Tidak Ditemukan</span>
                        </div>
                        <p class="text-sm text-red-700 mt-2">
                            Anda belum memasukkan token untuk mengakses formulir ini.<br>
                            Silakan hubungi admin untuk mendapatkan token pendaftaran usaha.
                        </p>
                    </div>
                @elseif($tokenStatus === 'valid')
                    <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-green-800 font-medium">Formulir Aktif</span>
                            </div>
                            <div class="text-right">
                                <div class="text-sm text-green-600">Waktu tersisa:</div>
                                <div id="countdown-timer" class="text-lg font-bold text-green-800"
                                    data-remaining="{{ $timeRemaining }}">
                                    --:--:--
                                </div>
                            </div>
                        </div>
                        <p class="text-sm text-green-700 mt-2">
                            Anda memiliki waktu hingga {{ $expiresAt ? $expiresAt->format('d-m-Y H:i') : '-' }} untuk mengisi
                            formulir ini.
                        </p>
                    </div>
                @elseif($tokenStatus === 'used')
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-yellow-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-yellow-800 font-medium">Terima kasih, formulir sudah dikirim</span>
                        </div>
                        <p class="text-sm text-yellow-700 mt-2">
                            Data usaha Anda sudah kami terima.<br>
                            Tim kami akan menghubungi Anda untuk proses selanjutnya.<br>
                            Jika ada pertanyaan, silakan hubungi admin melalui kontak yang tersedia.
                        </p>
                    </div>
                @elseif($tokenStatus === 'expired' || $tokenStatus === 'invalid')
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-red-800 font-medium">Token Formulir Tidak Valid/Kedaluwarsa</span>
                        </div>
                        <p class="text-sm text-red-700 mt-2">
                            Token tidak valid atau sudah kedaluwarsa. Silakan hubungi admin untuk mendapatkan token baru.
                        </p>
                    </div>
                @endif
            </div>

            <div class="bg-white rounded-2xl overflow-hidden {{ $tokenStatus !== 'valid' ? 'opacity-50 pointer-events-none' : '' }}">
                <form id="business-registration-form" class="grid grid-cols-1 lg:grid-cols-2 gap-6" method="POST"
                    action="{{ route('daftar-usaha.store', ['token' => $token]) }}" enctype="multipart/form-data"
                    {{ $tokenStatus !== 'valid' ? 'style=pointer-events:none;opacity:0.5;' : '' }}>
                    @csrf

                    <!-- Hidden token field -->
                    <input type="hidden" name="token" value="{{ $token }}">

                    <!-- Hidden coordinates fields -->
                    <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude') }}">
                    <input type="hidden" id="longitude" name="longitude" value="{{ old('longitude') }}">

                    <!-- Left Side - Form -->
                    <div class="flex flex-col gap-2">
                        <!-- Form Header -->
                        <div class="bg-[#113EA1] text-white rounded-xl p-4">
                            <h2 class="text-xl font-semibold">Formulir Daftar Usaha</h2>
                        </div>

                        <!-- Business Name -->
                        <div>
                            <label for="name" class="block font-medium text-gray-700 mb-2">
                                Nama Usaha<span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="name" name="name" required
                                placeholder="misal. kedas beauty"
                                value="{{ old('name') }}"
                                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                        </div>

                        <!-- Business Logo -->
                        <div>
                            <label for="name" class="block font-medium text-gray-700 mb-2">
                                Logo Usaha
                            </label>
                            <div class="flex items-center gap-4">
                                <label for="logo"
                                    class="cursor-pointer inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 transition-colors">
                                    Pilih File
                                </label>

                                <span id="file-name" class="text-sm text-gray-600">Belum ada file dipilih</span>
                            </div>

                            <input type="file" name="logo" id="logo" accept="image/*" class="hidden">
                        </div>

                        <!-- Business Category -->
                        <div>
                            <label for="category_id" class="block font-medium text-gray-700 mb-2">
                                Kategori Usaha<span class="text-red-500">*</span>
                            </label>
                            <select id="category_id" name="category_id" required
                                class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                <option value="">Pilih kategori usahamu</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block font-medium text-gray-700 mb-2">
                                Deskripsi
                            </label>
                            <textarea id="description" name="description" rows="2"
                                placeholder="ketikkan deskripsi dari usahamu"
                                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-none">{{ old('description') }}</textarea>
                        </div>

                        <!-- Start Date -->
                        <div>
                            <label for="started_at" class="block font-medium text-gray-700 mb-2">
                                Tanggal mulai usaha<span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="date" id="started_at" name="started_at" required
                                    value="{{ old('started_at') }}"
                                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                            </div>
                        </div>

                        <!-- Operational Hours -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-2">
                                Jam Operasional
                            </label>
                            <div class="flex gap-2">
                                <div class="flex-1">
                                    <label for="open_hour" class="block text-sm text-gray-600 mb-1">Jam Buka</label>
                                    <input type="text" id="open_hour" name="open_hour" placeholder="misal. 08:00"
                                        value="{{ old('open_hour') }}"
                                        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                </div>
                                <div class="flex-1">
                                    <label for="close_hour" class="block text-sm text-gray-600 mb-1">Jam Tutup</label>
                                    <input type="text" id="close_hour" name="close_hour" placeholder="misal. 23:00" 
                                        value="{{ old('close_hour') }}"
                                        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                </div>
                            </div>
                        </div>

                        <!-- Location -->
                        <div>
                            <label for="location" class="block font-medium text-gray-700">
                                Lokasi usaha
                            </label>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm text-gray-600">Gunakan lokasimu saat ini?</span>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" id="use-current-location" class="sr-only peer">
                                    <div
                                        class="relative w-11 h-6 bg-gray-200 focus:outline-none peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600">
                                    </div>
                                </label>
                            </div>
                            <div>
                                <label for="province" class="block font-medium text-gray-700">
                                    Provinsi<span class="text-red-500">*</span>
                                </label>
                                <select id="province" name="province" required
                                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                    <option value="">Pilih provinsi</option>
                                </select>
                            </div>
                            <div class="mt-2">
                                <label for="city" class="block font-medium text-gray-700">
                                    Kota/Kabupaten<span class="text-red-500">*</span>
                                </label>
                                <select id="city" name="city" required
                                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" disabled>
                                    <option value="">Pilih kota/kabupaten</option>
                                </select>
                            </div>
                        </div>

                        <!-- Address -->
                         <div>
                            <label for="address" class="block font-medium text-gray-700 mb-2">
                                Alamat detail<span class="text-red-500">*</span>
                            </label>
                            <textarea id="address" name="address" rows="2"
                                placeholder="misal. nama desa, jalan, dan sebagainya"
                                class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-none">{{ old('address') }}</textarea>
                        </div>

                        <!-- Interactive Map -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-2">
                                Tentukan Lokasi Tempat
                            </label>
                            <div class="bg-gray-100 rounded-lg p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span class="text-sm font-medium text-gray-700">Klik pada peta untuk menentukan
                                            lokasi</span>
                                    </div>
                                    <button type="button" id="clear-marker"
                                        class="text-xs text-red-600 hover:text-red-800">
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
                                    Klik pada peta untuk menandai lokasi usaha Anda. Marker dapat dipindahkan dengan
                                    mengklik lokasi baru.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side - Contact Info & Process -->
                    <div class="flex flex-col gap-6">
                        <div class="flex flex-col gap-2 p-4 bg-gray-50 rounded-xl border border-gray-200">
                            <!-- Contact Information -->
                            <h3 class="text-lg font-medium text-gray-700">
                                Informasi Kontak
                            </h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block font-medium text-gray-700 mb-2">
                                        Nomor Telepon<span class="text-red-500">*</span>
                                    </label>
                                    <input type="tel" name="phone" placeholder="misal. kedas beauty" required
                                        value="{{ old('phone') }}"
                                        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                </div>
                                <div>
                                    <label class="block font-medium text-gray-700 mb-2">Email</label>
                                    <input type="email" name="email" placeholder="misal.example@dsa.com"
                                        value="{{ old('email') }}"
                                        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                </div>
                            </div>
                            <div class="">
                                <label class="block font-medium text-gray-700 mb-2">Website</label>
                                <input type="url" name="website" placeholder="https://websitemu.com"
                                    value="{{ old('website') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                            </div>

                            <!-- Social Media -->
                            <div>
                                <h3 class="font-medium text-gray-700 mb-4">Sosial Media</h3>
                                <div class="space-y-3">
                                    <!-- Instagram -->
                                    <div class="flex items-center">
                                        <div
                                            class="w-10 h-10 bg-gradient-to-br from-purple-600 to-pink-500 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                            </svg>
                                        </div>
                                        <input type="text" name="instagram" placeholder="https://instagram.com/example"
                                            value="{{ old('instagram') }}"
                                            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                    </div>

                                    <!-- TikTok -->
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-black rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-.88-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z" />
                                            </svg>
                                        </div>
                                        <input type="url" name="tiktok" placeholder="https://tiktok.com/@example"
                                            value="{{ old('tiktok') }}"
                                            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                    </div>

                                    <!-- Facebook -->
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                            </svg>
                                        </div>
                                        <input type="url" name="facebook" placeholder="https://facebook.com/example"
                                            value="{{ old('facebook') }}"
                                            class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                                    </div>
                                </div>
                            </div>

                            <!-- File Upload -->
                            <div class="mb-8">
                                <h3 class="text-lg font-medium text-gray-700">Upload lampiran</h3>
                                <p class="text-sm text-gray-400 mb-4">Opsional, unggah lampiran bukti usaha seperti NIB, Haki atau dokumen lainnya</p>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-blue-400 transition-colors">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <p class="text-gray-500 mb-2">unggah lampirannya disini</p>
                                        <input type="file" id="file-upload" name="documents[]" multiple
                                            accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" class="hidden">
                                        <label for="file-upload"
                                            class="cursor-pointer bg-blue-50 text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-100 transition-colors">
                                            Pilih File
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Terms -->
                            <div class="mb-6">
                                <label class="flex items-start">
                                    <input type="checkbox" name="terms" required
                                        class="mt-1 mr-3 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    <span class="text-sm text-gray-600">
                                        dengan ini saya telah menyetujui seluruh
                                        <a href="#" class="text-blue-600 hover:underline">syarat dan ketentuan umkmdsa.id</a>
                                    </span>
                                </label>
                            </div>

                            @if($errors->any())
                                <div class="mb-4 bg-red-50 border border-red-300 text-red-800 px-4 py-3 rounded flex items-start gap-3">
                                    <svg class="w-6 h-6 text-red-500 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div>
                                        <div class="font-semibold mb-1">Ada kesalahan pada input:</div>
                                        <ul class="list-disc pl-5 space-y-1">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif
                            
                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full py-3 px-6 rounded-lg font-medium flex items-center justify-center
                                    transition-colors duration-200 text-white bg-gray-400 cursor-not-allowed"
                                {{ $tokenStatus !== 'valid' ? 'disabled' : '' }}>                            
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                                Kirim Formulir
                            </button>
                        </div>

                        <!-- Process Flow -->
                        <div class="p-4 bg-gray-50 rounded-xl border border-gray-200">
                            <div class="flex items-center justify-between text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center mb-2">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </div>
                                    <span class="text-xs text-gray-600">Isi Formulir</span>
                                </div>
                                <div class="flex-1 h-px bg-gray-300 mx-2"></div>
                                <div class="flex flex-col items-center">
                                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center mb-2">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-xs text-gray-600">Proses Verifikasi</span>
                                </div>
                                <div class="flex-1 h-px bg-gray-300 mx-2"></div>
                                <div class="flex flex-col items-center">
                                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center mb-2">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                            </path>
                                        </svg>
                                    </div>
                                    <span class="text-xs text-gray-600">Diberi Tanggapan</span>
                                </div>
                                <div class="flex-1 h-px bg-gray-300 mx-2"></div>
                                <div class="flex flex-col items-center">
                                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center mb-2">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <span class="text-xs text-gray-600">Selesai</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('business-registration-form');
            const submitBtn = form.querySelector('button[type="submit"]');
            const fileUpload = document.getElementById('file-upload');
            const useLocationToggle = document.getElementById('use-current-location');
            const countdownTimer = document.getElementById('countdown-timer');
            const timeRemaining = parseInt(countdownTimer?.dataset.remaining || 0);

            // Initialize map
            let map, marker;
            let selectedLat = null, selectedLng = null;

            function initMap() {
                map = L.map('map').setView([-6.2088, 106.8456], 10);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap contributors'
                }).addTo(map);

                map.on('click', function (e) {
                    setMarker(e.latlng.lat, e.latlng.lng);
                });
            }

            function setMarker(lat, lng) {
                if (marker) map.removeLayer(marker);
                marker = L.marker([lat, lng], { draggable: true }).addTo(map);
                updateCoordinates(lat, lng);
                marker.on('dragend', function (e) {
                    const pos = e.target.getLatLng();
                    updateCoordinates(pos.lat, pos.lng);
                });
            }

            function updateCoordinates(lat, lng) {
                selectedLat = lat;
                selectedLng = lng;
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;
                document.getElementById('display-lat').textContent = lat.toFixed(6);
                document.getElementById('display-lng').textContent = lng.toFixed(6);
                document.getElementById('coordinates-display').classList.remove('hidden');
                validateForm();
            }

            document.getElementById('clear-marker').addEventListener('click', function () {
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

            initMap();
            const oldLat = "{{ old('latitude') }}";
            const oldLng = "{{ old('longitude') }}";
            if (oldLat && oldLng) {
                setMarker(parseFloat(oldLat), parseFloat(oldLng));
                map.setView([parseFloat(oldLat), parseFloat(oldLng)], 15);
            }

            // Countdown timer
            if (timeRemaining > 0) {
                let remaining = timeRemaining;
                function updateCountdown() {
                    const hours = Math.floor(remaining / 3600);
                    const minutes = Math.floor((remaining % 3600) / 60);
                    const seconds = remaining % 60;
                    countdownTimer.textContent = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                    if (remaining <= 0) location.reload();
                    remaining--;
                }
                updateCountdown();
                setInterval(updateCountdown, 1000);
            }

            // Logo upload
            document.getElementById('logo')?.addEventListener('change', function (e) {
                const fileName = e.target.files[0]?.name || "Belum ada file dipilih";
                document.getElementById('file-name').textContent = fileName;
            });

            const provinceSelect = document.getElementById('province');
            const citySelect = document.getElementById('city');

            // Fetch provinces
            fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
                .then(res => res.json())
                .then(provinces => {
                    provinces.forEach(prov => {
                        const opt = document.createElement('option');
                        opt.value = prov.name;
                        opt.textContent = prov.name;
                        opt.dataset.id = prov.id;
                        provinceSelect.appendChild(opt);
                    });

                    const oldProvince = "{{ old('province') }}";
                    if (oldProvince) {
                        provinceSelect.value = oldProvince;
                        provinceSelect.dispatchEvent(new Event('change'));
                    }
                });

            // On province change, fetch cities
            provinceSelect.addEventListener('change', function() {
                const selectedOption = provinceSelect.options[provinceSelect.selectedIndex];
                const provinceId = selectedOption.dataset.id;
                citySelect.innerHTML = '<option value="">Pilih kota/kabupaten</option>';
                citySelect.disabled = true;
                if (provinceId) {
                    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`)
                        .then(res => res.json())
                        .then(cities => {
                            cities.forEach(city => {
                                const opt = document.createElement('option');
                                opt.value = city.name;
                                opt.textContent = city.name;
                                citySelect.appendChild(opt);
                            });
                            citySelect.disabled = false;

                            const oldCity = "{{ old('city') }}";
                            if (oldCity) {
                                citySelect.value = oldCity;
                            }
                        });
                }
            });

            //Flatpickr for open_hour and close_hour
            flatpickr("#open_hour", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                allowInput: true,
                placeholder: "08:00"
            });
            flatpickr("#close_hour", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                allowInput: true,
                placeholder: "17:00"
            });

            // Form validation
            function validateForm() {
                const requiredFields = form.querySelectorAll('[required]');
                let isValid = true;
                requiredFields.forEach(field => {
                    if (field.type === 'checkbox') {
                        if (!field.checked) isValid = false;
                    } else {
                        if (!field.value.trim()) isValid = false;
                    }
                });
                if (isValid) {
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('bg-gray-400', 'cursor-not-allowed');
                    submitBtn.classList.add('bg-blue-600', 'hover:bg-blue-700', 'cursor-pointer');
                } else {
                    submitBtn.disabled = true;
                    submitBtn.classList.remove('bg-blue-600', 'hover:bg-blue-700', 'cursor-pointer');
                    submitBtn.classList.add('bg-gray-400', 'cursor-not-allowed');
                }
            }
            form.addEventListener('input', validateForm);
            form.addEventListener('change', validateForm);

            // File upload
            function handleFileUploadChange(e) {
                const files = Array.from(e.target.files);
                const uploadArea = e.target.closest('.border-dashed');
                let info = uploadArea.querySelector('.file-info');
                if (!info) {
                    info = document.createElement('div');
                    info.className = 'file-info mt-2';
                    uploadArea.appendChild(info);
                }
                if (files.length > 5) {
                    info.innerHTML = `<p class="text-red-600 mb-1">Maksimal 5 file saja.</p>`;
                    e.target.value = ""; // reset input
                    return;
                }
                if (files.length > 0) {
                    const fileList = files.map(file => file.name).join(', ');
                    info.innerHTML = `
                        <p class="text-green-600 mb-1">${files.length} file(s) dipilih</p>
                        <p class="text-sm text-gray-500">${fileList}</p>
                    `;
                } else {
                    info.innerHTML = '';
                }
            }
            fileUpload.addEventListener('change', handleFileUploadChange);

            // Location toggle
            useLocationToggle.addEventListener('change', function () {
                if (this.checked) {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function (position) {
                            setMarker(position.coords.latitude, position.coords.longitude);
                            map.setView([position.coords.latitude, position.coords.longitude], 15);
                        }, function () {
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
            form.addEventListener('submit', function (e) {
                submitBtn.innerHTML = `
                    <svg class="animate-spin w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Mengirim...
                `;
                submitBtn.disabled = true;
            });

            validateForm();
        });
    </script>
@endsection