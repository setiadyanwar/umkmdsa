<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UmkmForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'description',
        'category_id',
        'started_at',
        'location',
        'address',
        'phone',
        'email',
        'website',
        'instagram',
        'tiktok',
        'facebook',
        'open_hour',
        'close_hour',
        'map_embed_url',
        'status',
    ];

    protected $casts = [
        'started_at' => 'date',
        'open_hour' => 'datetime:H:i',
        'close_hour' => 'datetime:H:i',
    ];

    public function category()
    {
        return $this->belongsTo(UmkmCategory::class, 'category_id');
    }

    public function attachments()
    {
        return $this->hasMany(UmkmFormAttachment::class);
    }

    protected static function booted()
    {
        static::deleting(function ($form) {
            if ($form->logo) {
                Storage::disk('public')->delete($form->logo);
            }

            foreach ($form->attachments as $attachment) {
                Storage::disk('public')->delete($attachment->file_path);
            }
        });
    }
}
