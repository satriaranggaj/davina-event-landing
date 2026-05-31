<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Tenda',
                'slug' => 'tenda',
                'description' => 'Berbagai jenis tenda untuk acara indoor dan outdoor',
                'icon' => 'Home',
                'sort_order' => 1,
            ],
            [
                'name' => 'Kursi & Meja',
                'slug' => 'kursi-meja',
                'description' => 'Kursi dan meja dengan berbagai ukuran dan warna',
                'icon' => 'Armchair',
                'sort_order' => 2,
            ],
            [
                'name' => 'AC & Pendingin',
                'slug' => 'ac-pendingin',
                'description' => 'AC standing, cooling fan, dan sistem pendingin lainnya',
                'icon' => 'Wind',
                'sort_order' => 3,
            ],
            [
                'name' => 'Dekorasi',
                'slug' => 'dekorasi',
                'description' => 'Dekorasi, backdrop, dan hiasan untuk memperindah acara',
                'icon' => 'Sparkles',
                'sort_order' => 4,
            ],
            [
                'name' => 'Perlengkapan Makan',
                'slug' => 'perlengkapan-makan',
                'description' => 'Piring, gelas, sendok, garpu, dan peralatan makan lainnya',
                'icon' => 'UtensilsCrossed',
                'sort_order' => 5,
            ],
            [
                'name' => 'Sound System',
                'slug' => 'sound-system',
                'description' => 'Speaker, microphone, mixer, dan sistem audio profesional',
                'icon' => 'Music',
                'sort_order' => 6,
            ],
            [
                'name' => 'Lighting',
                'slug' => 'lighting',
                'description' => 'Lampu, lighting truss, dan sistem pencahayaan event',
                'icon' => 'Lightbulb',
                'sort_order' => 7,
            ],
            [
                'name' => 'Panggung & Backdrop',
                'slug' => 'panggung-backdrop',
                'description' => 'Panggung, podium, dan backdrop profesional',
                'icon' => 'Stage',
                'sort_order' => 8,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
