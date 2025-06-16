<?php

namespace App\Rules;

use Closure;
use DB;
use Illuminate\Contracts\Validation\ValidationRule;
use Str;

class UniqueUmkmCategorySlug implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $slug = Str::slug($value ?? '');

        $exists = DB::table('umkm_categories')
            ->where('slug', $slug)
            ->exists();

        if ($exists) {
            $fail('Kategori dengan nama serupa sudah ada. Silakan gunakan nama yang berbeda.');
        }
    }
}
