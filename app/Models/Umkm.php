<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Str;

class Umkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'description',
        'category_id',
        'location',
        'address',
        'phone',
        'email',
        'website',
        'instagram',
        'tiktok',
        'facebook',
        'registered_at',
        'open_hour',
        'close_hour',
        'map_embed_url'
    ];

    protected $casts = [
        'registered_at' => 'datetime',
        'open_hour' => 'datetime:H:i',
        'close_hour' => 'datetime:H:i',
    ];


    protected $with = [
        'category'
    ];

    public function category()
    {
        return $this->belongsTo(UmkmCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getTotalProductsAttribute()
    {
        return $this->products()->count();
    }

    protected static function booted()
    {
        static::saving(function ($umkm) {
            // Auto create or update slug
            if (!$umkm->slug || $umkm->isDirty('name')) {
                $baseSlug = Str::slug($umkm->name);
                $slug = $baseSlug;
                $i = 1;
                while (Umkm::where('slug', $slug)->where('id', '!=', $umkm->id)->exists()) {
                    $slug = $baseSlug . '-' . $i++;
                }
                $umkm->slug = $slug;
            }
        });

        static::deleting(function ($umkm) {
            // Delete UMKM logo when data got deleted
            if ($umkm->logo) {
                Storage::disk('public')->delete($umkm->logo);
            }

            // Delete all product images from this UMKM
            foreach ($umkm->products as $product) {
                foreach ($product->images as $image) {
                    Storage::disk('public')->delete($image->image_url);
                }
            }
        });

    }

}
