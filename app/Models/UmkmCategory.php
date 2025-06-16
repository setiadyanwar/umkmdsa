<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class UmkmCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function umkms()
    {
        return $this->hasMany(Umkm::class);
    }

    protected static function booted()
    {
        static::creating(function ($category) {
            // Auto create slug
            $category->slug = Str::slug($category->name);
        });
    }

}
