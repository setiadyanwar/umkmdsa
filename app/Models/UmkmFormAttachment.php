<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UmkmFormAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'umkm_form_id',
        'file_path',
    ];

    public function form()
    {
        return $this->belongsTo(UmkmForm::class, 'umkm_form_id');
    }

    protected static function booted()
    {
        static::deleting(function ($attachment) {
            if ($attachment->file_path) {
                Storage::disk('public')->delete($attachment->file_path);
            }
        });
    }
}
