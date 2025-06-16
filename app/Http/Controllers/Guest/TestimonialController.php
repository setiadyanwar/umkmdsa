<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('guest.testimonials.index', compact('testimonials')); // TODO: Sesuaikan path view
    }
}
