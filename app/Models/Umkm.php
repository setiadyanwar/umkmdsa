<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Umkm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'description',
        'category_id',
        'province',
        'city',
        'address',
        'latitude',
        'longitude',
        'phone',
        'email',
        'website',
        'instagram',
        'tiktok',
        'facebook',
        'registered_at',
        'open_hour',
        'close_hour',
    ];

    protected $casts = [
        'registered_at' => 'datetime',
        'latitude' => 'float',
        'longitude' => 'float',
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
