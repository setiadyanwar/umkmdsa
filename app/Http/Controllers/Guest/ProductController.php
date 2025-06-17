<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Umkm;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'primaryImage', 'umkm']);

        // Search
        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%{$search}%");
        }

        // Filter by category
        if ($categorySlug = $request->input('category')) {
            $category = ProductCategory::where('slug', $categorySlug)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // Filter by UMKM
        if ($umkmId = $request->input('umkm_id')) {
            $query->where('umkm_id', $umkmId);
        }

        // Filter by price
        $priceMin = $request->input('price_min');
        $priceMax = $request->input('price_max');

        if ($priceMin && $priceMax && $priceMin > $priceMax) {
            // Swap nilainya
            [$priceMin, $priceMax] = [$priceMax, $priceMin];
        }
        if ($priceMin) {
            $query->where('price_final', '>=', $priceMin);
        }
        if ($priceMax) {
            $query->where('price_final', '<=', $priceMax);
        }

        // Sort
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

        $products = $query->paginate(12)->withQueryString();
        $categories = ProductCategory::all();

        return view('etalase.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        $product->increment('views'); // Increment views untuk terpopuler atau paling banyak dicari
        return view('etalase.show', compact('product'));
    }
}
