<?php

use App\Http\Controllers\Guest\ProductController;
use App\Http\Controllers\Guest\UmkmController;
use App\Http\Controllers\Guest\UmkmFormController;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\Umkm;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

Route::get('/', function () {
    $featuredProducts = Product::orderByDesc('views')->take(5)->get();
    $testimonials = Testimonial::where('is_published', true)->get();

    return view('homepage', compact('featuredProducts', 'testimonials'));
})->name('homepage');

Route::get('/etalase', [ProductController::class, 'index'])->name('etalase');

Route::get('/etalase/{product:slug}', [ProductController::class, 'show'])->name('etalase.show');

Route::get('/umkm-binaan', [UmkmController::class, 'index'])->name('umkm-binaan');

Route::get('/umkm-binaan/{umkm:slug}', [UmkmController::class, 'show'])->name('umkm-binaan.show');

Route::get('/daftar-usaha', [UmkmFormController::class, 'create'])->name('daftar-usaha');
Route::post('/daftar-usaha', [UmkmFormController::class, 'store'])->name('daftar-usaha.store');

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

Route::get('/sitemap.xml', function () {
    return Cache::remember('sitemap.xml', now()->addHours(12), function () {
        $sitemap = Sitemap::create();

        $sitemap->add(Url::create('/'));
        $sitemap->add(Url::create('/etalase'));
        $sitemap->add(Url::create('/umkm-binaan'));
        $sitemap->add(Url::create('/daftar-usaha'));

        Product::all()->each(fn($p) => $sitemap->add(Url::create("/etalase/{$p->slug}")));
        Umkm::all()->each(fn($u) => $sitemap->add(Url::create("/umkm-binaan/{$u->slug}")));

        return $sitemap->toResponse(request());
    });
});