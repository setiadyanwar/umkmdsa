<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/etalase', function () {
    return view('etalase');
})->name('etalase');
