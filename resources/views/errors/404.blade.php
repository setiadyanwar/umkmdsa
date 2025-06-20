@extends('layouts.app')

@section('title', '404 - Halaman Tidak Ditemukan | UMKM DSA IPB')

@section('meta')
    <meta name="robots" content="noindex, follow">
    <meta name="description" content="Halaman yang Anda cari tidak ditemukan. Silakan kembali ke halaman utama UMKM DSA IPB.">
    <meta property="og:title" content="404 - Halaman Tidak Ditemukan | UMKM DSA IPB">
    <meta property="og:description" content="Halaman yang Anda cari tidak ditemukan. Silakan kembali ke halaman utama UMKM DSA IPB.">
    <meta property="og:image" content="{{ asset('images/dpma-logo-dark.png') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="UMKM DSA IPB">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="404 - Halaman Tidak Ditemukan | UMKM DSA IPB">
    <meta name="twitter:description" content="Halaman yang Anda cari tidak ditemukan. Silakan kembali ke halaman utama UMKM DSA IPB.">
    <meta name="twitter:image" content="{{ asset('images/dpma-logo-dark.png') }}">
@endsection

@php
    $currentRoute = '404';
@endphp

@section('content')
<div class="min-h-screen bg-white flex items-center justify-center px-4 py-32">
    <div class="max-w-2xl mx-auto text-center">
        <!-- 404 Illustration -->
        <div class="mb-8">
            <img src="{{ asset('images/404-ilustration.png') }}" 
                 alt="404 Error Illustration" 
                 class="w-full max-w-lg mx-auto">
        </div>

        <!-- Error Message -->
        <div class="mb-8">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Oops! halaman tidak ditemukkan
            </h1>
            <p class="text-lg text-gray-600 max-w-md mx-auto leading-relaxed">
                Mohon maaf! periksa kembali tujuan anda atau kembali ke halaman utama 
                yah jangan nyasar lagi!
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ route('homepage') }}" 
               class="inline-flex items-center px-6 py-3 bg-[#113EA1] text-white font-medium rounded-xl hover:bg-blue-700 transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Kembali ke halaman awal
            </a>
        </div>
    </div>
</div>

<style>
/* Add some animation to the illustration */
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.animate-float {
    animation: float 3s ease-in-out infinite;
}

/* Add the animation to the illustration */
img[alt="404 Error Illustration"] {
    animation: float 3s ease-in-out infinite;
}
</style>
@endsection
