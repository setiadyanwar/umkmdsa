<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // FASHION
            [
                'umkm' => 'batik-nusantara',
                'items' => [
                    [
                        'name' => 'Batik Tulis Motif Parang',
                        'description' => 'Batik tulis dengan motif parang klasik, cocok untuk acara formal.',
                        'price' => 350000,
                        'tags' => ['batik', 'parang', 'tradisional']
                    ],
                    [
                        'name' => 'Kemeja Batik Modern Pria',
                        'description' => 'Kemeja batik slim fit dengan warna navy elegan.',
                        'price' => 275000,
                        'tags' => ['batik', 'kemeja', 'pria']
                    ]
                ]
            ],
            [
                'umkm' => 'hijab-modernku',
                'items' => [
                    [
                        'name' => 'Pashmina Ceruty Premium',
                        'description' => 'Pashmina ceruty ringan, lembut, tidak menerawang.',
                        'price' => 65000,
                        'tags' => ['pashmina', 'ceruty', 'muslimah']
                    ],
                    [
                        'name' => 'Hijab Instan Rempel',
                        'description' => 'Hijab instan dengan aksen rempel dan bahan jersey adem.',
                        'price' => 55000,
                        'tags' => ['hijab', 'instan', 'simple']
                    ]
                ]
            ],

            // KERAJINAN
            [
                'umkm' => 'kriya-kayu-lestari',
                'items' => [
                    [
                        'name' => 'Jam Dinding Kayu Minimalis',
                        'description' => 'Jam dinding handmade dari kayu jati, model minimalis.',
                        'price' => 185000,
                        'tags' => ['jam', 'kayu', 'minimalis']
                    ],
                    [
                        'name' => 'Rak Buku Dinding Kayu',
                        'description' => 'Rak gantung dari kayu mahoni untuk ruang belajar.',
                        'price' => 240000,
                        'tags' => ['rak', 'furniture', 'dekorasi']
                    ]
                ]
            ],
            [
                'umkm' => 'anyaman-bambu-asri',
                'items' => [
                    [
                        'name' => 'Keranjang Anyaman Serbaguna',
                        'description' => 'Keranjang bambu multifungsi untuk laundry atau penyimpanan.',
                        'price' => 75000,
                        'tags' => ['keranjang', 'bambu', 'homemade']
                    ],
                    [
                        'name' => 'Lampu Gantung Anyaman',
                        'description' => 'Lampu gantung unik dari bambu alami, cocok untuk cafe.',
                        'price' => 150000,
                        'tags' => ['lampu', 'dekorasi', 'natural']
                    ]
                ]
            ],

            // JASA
            [
                'umkm' => 'service-laptop-jogja',
                'items' => [
                    [
                        'name' => 'Servis Ganti LCD Laptop',
                        'description' => 'Layanan ganti LCD original semua merek laptop.',
                        'price' => 600000,
                        'tags' => ['servis', 'laptop', 'lcd']
                    ],
                    [
                        'name' => 'Install Ulang Windows',
                        'description' => 'Layanan install ulang Windows + driver + antivirus.',
                        'price' => 150000,
                        'tags' => ['install', 'windows', 'software']
                    ]
                ]
            ],
            [
                'umkm' => 'laundry-express-cuci-bersih',
                'items' => [
                    [
                        'name' => 'Laundry Kiloan Reguler',
                        'description' => 'Paket cuci lipat 3 hari kerja, wangi tahan lama.',
                        'price' => 7000,
                        'tags' => ['laundry', 'kiloan']
                    ],
                    [
                        'name' => 'Laundry Express 24 Jam',
                        'description' => 'Cuci lipat selesai dalam waktu 1 hari (max 5kg).',
                        'price' => 15000,
                        'tags' => ['express', 'laundry']
                    ]
                ]
            ],

            // KESEHATAN
            [
                'umkm' => 'herbal-sehat-alami',
                'items' => [
                    [
                        'name' => 'Madu Hutan Asli 500ml',
                        'description' => 'Madu alami tanpa campuran, diambil langsung dari hutan Sumbawa.',
                        'price' => 95000,
                        'tags' => ['madu', 'herbal', 'alami']
                    ],
                    [
                        'name' => 'Jamu Kunyit Asam Instan',
                        'description' => 'Minuman tradisional kemasan serbuk instan siap seduh.',
                        'price' => 30000,
                        'tags' => ['jamu', 'kunyit', 'tradisional']
                    ]
                ]
            ],
            [
                'umkm' => 'beauty-glow-skincare',
                'items' => [
                    [
                        'name' => 'Facial Wash Gentle Cleanser',
                        'description' => 'Sabun wajah ringan tanpa SLS, cocok untuk kulit sensitif.',
                        'price' => 85000,
                        'tags' => ['skincare', 'cleanser', 'natural']
                    ],
                    [
                        'name' => 'Night Cream Whitening',
                        'description' => 'Krim malam dengan kandungan Niacinamide dan Aloe Vera.',
                        'price' => 120000,
                        'tags' => ['nightcream', 'whitening', 'moist']
                    ]
                ]
            ],

            // GADGET
            [
                'umkm' => 'gadget-mart',
                'items' => [
                    [
                        'name' => 'Charger Fast Charging 20W',
                        'description' => 'Charger 20W USB-C, kompatibel iPhone dan Android.',
                        'price' => 99000,
                        'tags' => ['charger', 'fastcharging']
                    ],
                    [
                        'name' => 'Headset Bluetooth TWS',
                        'description' => 'TWS dengan case magnetik dan kualitas suara jernih.',
                        'price' => 185000,
                        'tags' => ['tws', 'bluetooth', 'audio']
                    ]
                ]
            ],
            [
                'umkm' => 'aksesoris-hp-murah',
                'items' => [
                    [
                        'name' => 'Casing Softcase Samsung A14',
                        'description' => 'Softcase bening anti crack dengan finishing matte.',
                        'price' => 35000,
                        'tags' => ['casing', 'samsung', 'softcase']
                    ],
                    [
                        'name' => 'Kabel Charger Type-C 1.5m',
                        'description' => 'Kabel charger kualitas premium, pengisian cepat.',
                        'price' => 25000,
                        'tags' => ['charger', 'kabel', 'typec']
                    ]
                ]
            ],
        ];

        foreach ($products as $group) {
            $umkm = \App\Models\Umkm::where('slug', $group['umkm'])->first();
            $categoryId = $umkm->category_id;

            foreach ($group['items'] as $item) {
                $discount = fake()->boolean(30); // 30% chance
                $discountPercent = $discount ? rand(5, 30) : 0;
                $finalPrice = $discount ? intval($item['price'] * (1 - $discountPercent / 100)) : $item['price'];

                Product::create([
                    'umkm_id' => $umkm->id,
                    'name' => $item['name'],
                    'slug' => '', // biar auto-generated di model
                    'description' => $item['description'],
                    'category_id' => $categoryId,
                    'price_original' => $item['price'],
                    'price_final' => $finalPrice,
                    'discount_percent' => $discount ? $discountPercent : null,
                    'has_discount' => $discount,
                    'tags' => $item['tags'],
                    'views' => rand(0, 500),
                ]);
            }
        }
    }
}
