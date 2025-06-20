<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'umkm_id',
        'name',
        'slug',
        'description',
        'category_id',
        'price_original',
        'price_final',
        'discount_percent',
        'has_discount',
        'category',
        'tags',
        'views'
    ];

    protected $casts = [
        'tags' => 'array'
    ];

    protected $with = [
        'images',
        'category',
        'primaryImage'
    ];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('order', 'asc');
    }

    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }

    protected static function booted()
    {
        static::saving(function ($product) {
            // Auto create or update slug
            if (!$product->slug || $product->isDirty('name') || $product->isDirty('umkm_id')) {
                $umkm = Umkm::find($product->umkm_id);
                $baseSlug = Str::slug(($umkm?->slug ?? 'umkm') . '-' . $product->name);
                $slug = $baseSlug;
                $i = 1;

                while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                    $slug = $baseSlug . '-' . $i++;
                }

                $product->slug = $slug;
            }
        });

        static::deleting(function ($product) {
            // Delete all product images when data got deleted
            foreach ($product->images as $image) {
                Storage::disk('public')->delete($image->image_url);
            }
        });
    }
}
