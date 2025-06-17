<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Umkm;
use App\Models\UmkmCategory;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function index(Request $request)
    {
        $query = Umkm::query()->with('category');

        // Search
        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%{$search}%");
        }

        // Filter by category
        if ($categorySlug = $request->input('category')) {
            $category = UmkmCategory::where('slug', $categorySlug)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // Filter by first letter
        if ($startsWith = $request->input('starts_with')) {
            $query->where('name', 'like', "{$startsWith}%");
        }

        // Pagination
        $umkms = $query->orderBy('name')->paginate(12)->withQueryString();
        $categories = UmkmCategory::all();

        return view('umkmbinaan', compact('umkms', 'categories'));
    }

    public function show(Request $request, Umkm $umkm)
    {
        // Featured Products (Top 4 by views)
        $featuredProducts = $umkm->products()
            ->orderByDesc('views')
            ->take(4)
            ->get();

        // Query dasar: produk milik UMKM ini
        $query = $umkm->products()->with(['category', 'primaryImage']);

        // Search
        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%{$search}%");
        }

        // Filter by category (khusus produk)
        if ($categorySlug = $request->input('category')) {
            $category = ProductCategory::where('slug', $categorySlug)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // Filter by price
        $priceMin = $request->input('price_min');
        $priceMax = $request->input('price_max');

        if ($priceMin && $priceMax && $priceMin > $priceMax) {
            [$priceMin, $priceMax] = [$priceMax, $priceMin];
        }

        if ($priceMin) {
            $query->where('price_final', '>=', $priceMin);
        }
        if ($priceMax) {
            $query->where('price_final', '<=', $priceMax);
        }

        // Sorting
        switch ($request->input('sort')) {
            case 'termurah':
                $query->orderBy('price_final', 'asc');
                break;
            case 'termahal':
                $query->orderBy('price_final', 'desc');
                break;
            case 'terbaru':
                $query->orderBy('created_at', 'desc');
                break;
            case 'terlama':
                $query->orderBy('created_at', 'asc');
                break;
            case 'paling_dicari':
                $query->orderBy('views', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        // Paginate
        $products = $query->paginate(12)->withQueryString();

        // Semua kategori produk
        $categories = ProductCategory::all();

        return view('profile-store.main-profile', compact(
            'umkm',
            'featuredProducts',
            'categories',
            'products'
        ));
    }

}
