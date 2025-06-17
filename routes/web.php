<?php

use App\Http\Controllers\Guest\ProductController;
use App\Http\Controllers\Guest\UmkmController;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $featuredProducts = Product::orderByDesc('views')->take(5)->get();
    $testimonials = Testimonial::where('is_published', true)->get();

    return view('homepage', compact('featuredProducts', 'testimonials'));
})->name('homepage');

// Route::get('/etalase', function () {
//     return view('etalase');
// })->name('etalase');

Route::get('/etalase', [ProductController::class, 'index'])->name('etalase');


// Route::get('/umkm-binaan', function () {
//     return view('umkmbinaan');
// })->name('umkmbinaan');

Route::get('/umkm-binaan', [UmkmController::class, 'index'])->name('umkmbinaan');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

Route::get('/daftar-usaha', function () {
    return view('daftar-usaha');
})->name('daftarusaha');
// Route::get('/daftar-usaha/{token}', 'DaftarUsahaController@showForm')->name('daftar-usaha.form');
// Route::post('/daftar-usaha/{token}', 'DaftarUsahaController@submitForm')->name('daftar-usaha.submit');

// Route::get('/product', function () {
//     return view('single-product');
// })->name('singleview');

Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('singleview');

// Route::get('/umkm-binaan/{umkm:slug}', function () {
//     return view('profile-store.main-profile');
// })->name('umkm-binaan');

Route::get('/umkm-binaan/{umkm:slug}', [UmkmController::class, 'show'])->name('umkm-binaan');
