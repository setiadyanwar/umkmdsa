<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'message',
        'rating',
        'image_url',
        'is_published'
    ];

    protected static function booted()
    {
        static::deleting(function ($testimonial) {
            // Delete avatar image when data got deleted
            if ($testimonial->image_url) {
                Storage::disk('public')->delete($testimonial->image_url);
            }
        });
    }
}
