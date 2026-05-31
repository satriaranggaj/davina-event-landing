<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tenda
        $tendasCategory = Category::where('slug', 'tenda')->first();
        if ($tendasCategory) {
            Product::create([
                'category_id' => $tendasCategory->id,
                'name' => 'Tenda 4x6m',
                'slug' => 'tenda-4x6m',
                'description' => 'Tenda standar ukuran 4x6 meter cocok untuk acara kecil hingga menengah',
                'image' => '/images/products/tenda-4x6.jpg',
                'price_per_unit' => 350000,
                'price_unit' => 'hari',
                'minimum_order' => 1,
                'specifications' => 'Ukuran: 4m x 6m\nKapasitas: 50-80 orang\nBahan: Canvas berkualitas tinggi\nWarna: Putih standar',
                'stock' => 10,
                'sort_order' => 1,
            ]);
            Product::create([
                'category_id' => $tendasCategory->id,
                'name' => 'Tenda 6x10m',
                'slug' => 'tenda-6x10m',
                'description' => 'Tenda besar untuk acara dengan jumlah tamu banyak',
                'image' => '/images/products/tenda-6x10.jpg',
                'price_per_unit' => 650000,
                'price_unit' => 'hari',
                'minimum_order' => 1,
                'specifications' => 'Ukuran: 6m x 10m\nKapasitas: 150-200 orang\nBahan: Canvas premium\nWarna: Putih standar',
                'stock' => 8,
                'sort_order' => 2,
            ]);
            Product::create([
                'category_id' => $tendasCategory->id,
                'name' => 'Tenda Dekorasi 3x3m',
                'slug' => 'tenda-dekorasi-3x3m',
                'description' => 'Tenda kecil untuk dekorasi, photo booth, atau tempat istirahat',
                'image' => '/images/products/tenda-dekorasi.jpg',
                'price_per_unit' => 150000,
                'price_unit' => 'hari',
                'minimum_order' => 1,
                'specifications' => 'Ukuran: 3m x 3m\nKapasitas: 20-30 orang\nBahan: Canvas\nWarna: Putih/Warna pilot',
                'stock' => 15,
                'sort_order' => 3,
            ]);
        }

        // Kursi & Meja
        $mebelsCategory = Category::where('slug', 'kursi-meja')->first();
        if ($mebelsCategory) {
            Product::create([
                'category_id' => $mebelsCategory->id,
                'name' => 'Kursi Futura',
                'slug' => 'kursi-futura',
                'description' => 'Kursi futura dengan cover pilihan untuk acara resmi',
                'image' => '/images/products/kursi-futura.jpg',
                'price_per_unit' => 8000,
                'price_unit' => 'pcs',
                'minimum_order' => 50,
                'specifications' => 'Material: Plastik berkualitas\nWarna: Putih/Hitam\nTersedia dengan cover dan pita\nDimensi: 37x58x81 cm',
                'stock' => 500,
                'sort_order' => 1,
            ]);
            Product::create([
                'category_id' => $mebelsCategory->id,
                'name' => 'Meja Prasmanan 1.5m',
                'slug' => 'meja-prasmanan',
                'description' => 'Meja prasmanan dengan ukuran standar untuk buffet',
                'image' => '/images/products/meja-prasmanan.jpg',
                'price_per_unit' => 75000,
                'price_unit' => 'hari',
                'minimum_order' => 1,
                'specifications' => 'Ukuran: 1.5m x 0.8m\nMaterial: Kayu berkualitas\nDilengkapi kaki yang kokoh',
                'stock' => 20,
                'sort_order' => 2,
            ]);
            Product::create([
                'category_id' => $mebelsCategory->id,
                'name' => 'Meja Bundar Diameter 1.2m',
                'slug' => 'meja-bundar-1.2m',
                'description' => 'Meja bundar cocok untuk santai dan makan bersama',
                'image' => '/images/products/meja-bundar.jpg',
                'price_per_unit' => 60000,
                'price_unit' => 'hari',
                'minimum_order' => 1,
                'specifications' => 'Diameter: 1.2m\nKapasitas: 6-8 orang\nMaterial: Kayu/Fiberglass\nAlas putar: Ada',
                'stock' => 25,
                'sort_order' => 3,
            ]);
        }

        // AC & Pendingin
        $acCategory = Category::where('slug', 'ac-pendingin')->first();
        if ($acCategory) {
            Product::create([
                'category_id' => $acCategory->id,
                'name' => 'AC Standing 5 PK',
                'slug' => 'ac-standing-5pk',
                'description' => 'AC standing 5 PK untuk ruangan besar',
                'image' => '/images/products/ac-5pk.jpg',
                'price_per_unit' => 750000,
                'price_unit' => 'hari',
                'minimum_order' => 2,
                'specifications' => 'Kapasitas: 5 PK\nTipe: Standing\nKonsumsi listrik: ~3000W\nRuang: 40-50m²\nInclude: Instalasi dan operator',
                'stock' => 5,
                'sort_order' => 1,
            ]);
            Product::create([
                'category_id' => $acCategory->id,
                'name' => 'Kipas Blower Embun',
                'slug' => 'kipas-blower',
                'description' => 'Kipas blower dengan sistem embun untuk pendinginan outdoor',
                'image' => '/images/products/kipas-blower.jpg',
                'price_per_unit' => 250000,
                'price_unit' => 'hari',
                'minimum_order' => 2,
                'specifications' => 'Tipe: Kipas evaporatif\nTenaga: 0.75 HP\nArea jangkauan: 15-20m²\nSistem embun otomatis',
                'stock' => 15,
                'sort_order' => 2,
            ]);
        }

        // Dekorasi
        $dekorasiCategory = Category::where('slug', 'dekorasi')->first();
        if ($dekorasiCategory) {
            Product::create([
                'category_id' => $dekorasiCategory->id,
                'name' => 'Backdrop Stainless 3x2m',
                'slug' => 'backdrop-stainless',
                'description' => 'Backdrop stainless untuk foto booth dan dekorasi',
                'image' => '/images/products/backdrop.jpg',
                'price_per_unit' => 300000,
                'price_unit' => 'hari',
                'minimum_order' => 1,
                'specifications' => 'Ukuran: 3m x 2m\nMaterial: Stainless steel\nFleksibel dan mudah diatur\nInclude: Bantuan pemasangan',
                'stock' => 8,
                'sort_order' => 1,
            ]);
            Product::create([
                'category_id' => $dekorasiCategory->id,
                'name' => 'Rangkaian Bunga Dekorasi',
                'slug' => 'rangkaian-bunga',
                'description' => 'Rangkaian bunga artifisial untuk dekorasi panggung',
                'image' => '/images/products/rangkaian-bunga.jpg',
                'price_per_unit' => 75000,
                'price_unit' => 'set',
                'minimum_order' => 2,
                'specifications' => 'Material: Bunga artifisial berkualitas\nUkuran: ~50cm\nWarna: Pilihan (Merah, Pink, Putih, Kuning)',
                'stock' => 50,
                'sort_order' => 2,
            ]);
        }

        // Perlengkapan Makan
        $makananCategory = Category::where('slug', 'perlengkapan-makan')->first();
        if ($makananCategory) {
            Product::create([
                'category_id' => $makananCategory->id,
                'name' => 'Piring Makan Set',
                'slug' => 'piring-makan-set',
                'description' => 'Piring, sendok, garpu untuk acara catering',
                'image' => '/images/products/piring-set.jpg',
                'price_per_unit' => 2500,
                'price_unit' => 'set',
                'minimum_order' => 100,
                'specifications' => 'Isi: 1 Piring + 1 Sendok + 1 Garpu\nMaterial: Plastik food grade\nWarna putih standar\nRingan dan mudah dicuci',
                'stock' => 3000,
                'sort_order' => 1,
            ]);
            Product::create([
                'category_id' => $makananCategory->id,
                'name' => 'Gelas Minum',
                'slug' => 'gelas-minum',
                'description' => 'Gelas plastik untuk minuman acara',
                'image' => '/images/products/gelas.jpg',
                'price_per_unit' => 1000,
                'price_unit' => 'pcs',
                'minimum_order' => 100,
                'specifications' => 'Kapasitas: 250ml\nMaterial: Plastik transparan\nDapat digunakan sekali pakai atau multiple use',
                'stock' => 5000,
                'sort_order' => 2,
            ]);
        }

        // Sound System
        $soundCategory = Category::where('slug', 'sound-system')->first();
        if ($soundCategory) {
            Product::create([
                'category_id' => $soundCategory->id,
                'name' => 'Paket Sound System Standar',
                'slug' => 'sound-system-standar',
                'description' => 'Paket sound system lengkap untuk acara menengah',
                'image' => '/images/products/sound-system.jpg',
                'price_per_unit' => 1500000,
                'price_unit' => 'hari',
                'minimum_order' => 1,
                'specifications' => '2x Speaker 15 inch\n1x Mixer\n2x Microphone\nKabel dan aksesori lengkap\nInclude: Operator profesional',
                'stock' => 3,
                'sort_order' => 1,
            ]);
        }

        // Lighting
        $lightingCategory = Category::where('slug', 'lighting')->first();
        if ($lightingCategory) {
            Product::create([
                'category_id' => $lightingCategory->id,
                'name' => 'Lighting Truss + Tarik',
                'slug' => 'lighting-truss',
                'description' => 'Sistem lighting dengan truss untuk acara profesional',
                'image' => '/images/products/lighting-truss.jpg',
                'price_per_unit' => 1200000,
                'price_unit' => 'hari',
                'minimum_order' => 1,
                'specifications' => 'Truss stainless 4x4m\n20x LED Par64\nTrack system profesional\nInclude: Mekanik dan electrician',
                'stock' => 2,
                'sort_order' => 1,
            ]);
        }

        // Panggung & Backdrop
        $panggungCategory = Category::where('slug', 'panggung-backdrop')->first();
        if ($panggungCategory) {
            Product::create([
                'category_id' => $panggungCategory->id,
                'name' => 'Panggung 4x3m',
                'slug' => 'panggung-4x3m',
                'description' => 'Panggung tinggi untuk moderator, MC, dan penampil',
                'image' => '/images/products/panggung.jpg',
                'price_per_unit' => 800000,
                'price_unit' => 'hari',
                'minimum_order' => 1,
                'specifications' => 'Ukuran: 4m x 3m\nTinggi: 0.8m\nMaterial: Stainless + lantai kayu\nKapasitas: 10-15 orang\nInclude: Pemasangan',
                'stock' => 4,
                'sort_order' => 1,
            ]);
        }
    }
}
