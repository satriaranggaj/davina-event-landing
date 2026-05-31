<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'title' => 'Produk Berkualitas',
            'description' => 'Semua perlengkapan terjamin kualitasnya dengan harga terjangkau',
            'icon' => 'Gem',
            'sort_order' => 1,
            'active' => true,
        ]);

        Service::create([
            'title' => 'Layanan Profesional',
            'description' => 'Tim berpengalaman siap membantu dan melayani kebutuhan Anda',
            'icon' => 'Users',
            'sort_order' => 2,
            'active' => true,
        ]);

        Service::create([
            'title' => 'Pengiriman Cepat',
            'description' => 'Pengiriman tepat waktu dan aman ke seluruh area Jabodebek',
            'icon' => 'Truck',
            'sort_order' => 3,
            'active' => true,
        ]);
    }
}
