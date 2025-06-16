<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/etalase', function () {
    return view('etalase');
})->name('etalase');


Route::get('/umkm-binaan', function () {
    return view('umkmbinaan');
})->name('umkmbinaan');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

Route::get('/daftar-usaha', function () {
    return view('daftar-usaha');
})->name('daftarusaha');
// Route::get('/daftar-usaha/{token}', 'DaftarUsahaController@showForm')->name('daftar-usaha.form');
// Route::post('/daftar-usaha/{token}', 'DaftarUsahaController@submitForm')->name('daftar-usaha.submit');

Route::get('/product', function () {
    return view('single-product');
})->name('singleview');

Route::get('/profile', function () {
    return view('profile-store.main-profile');
})->name('main-profile');
