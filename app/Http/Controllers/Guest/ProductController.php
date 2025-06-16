<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Product;
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
        if ($categoryId = $request->input('category')) {
            $query->where('category_id', $categoryId);
        }

        // Filter by UMKM
        if ($umkmId = $request->input('umkm_id')) {
            $query->where('umkm_id', $umkmId);
        }

        // Filter by price
        if ($request->filled('price_min')) {
            $query->where('price_final', '>=', $request->input('price_min'));
        }
        if ($request->filled('price_max')) {
            $query->where('price_final', '<=', $request->input('price_max'));
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

        $products = $query->paginate(10)->withQueryString();

        return view('guest.products.index', compact('products')); // TODO: Sesuaikan path view
    }

    public function show(Product $product)
    {
        $product->increment('views'); // Increment views untuk terpopuler atau paling banyak dicari
        return view('guest.products.show', compact('product')); // TODO: Sesuaikan path view
    }
}
