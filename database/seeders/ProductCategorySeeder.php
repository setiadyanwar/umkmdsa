<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['id' => 1, 'name' => 'Fashion'],
            ['id' => 2, 'name' => 'Kerajinan Kriya'],
            ['id' => 3, 'name' => 'Jasa'],
            ['id' => 4, 'name' => 'Kesehatan dan Kecantikan'],
            ['id' => 5, 'name' => 'Handphone & Aksesoris'],
        ];

        foreach ($categories as $category) {
            ProductCategory::updateOrCreate(
                ['id' => $category['id']],
                [
                    'name' => $category['name'],
                    'slug' => Str::slug($category['name']),
                ]
            );
        }
    }
}
