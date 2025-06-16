<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
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
        if ($categoryId = $request->input('category')) {
            $query->where('category_id', $categoryId);
        }

        // Filter by first letter
        if ($startsWith = $request->input('starts_with')) {
            $query->where('name', 'like', "{$startsWith}$");
        }

        // Pagination
        $umkms = $query->orderBy('name')->paginate(10)->withQueryString();

        return view('guest.umkms.index', compact('umkms')); // TODO: Sesuaikan path view
    }

    public function show(Umkm $umkm)
    {
        return view('guest.umkms.show', compact('umkm')); // TODO: Sesuaikan path view
    }
}
