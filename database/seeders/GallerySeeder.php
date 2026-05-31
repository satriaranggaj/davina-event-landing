<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gallery::create([
            'title' => 'Pernikahan Adat Jawa',
            'image' => '/api/placeholder/400/300',
            'description' => 'Dekorasi tenda dan panggung untuk pernikahan adat Jawa',
            'category' => 'Pernikahan',
            'sort_order' => 1,
            'active' => true,
        ]);

        Gallery::create([
            'title' => 'Gathering Perusahaan',
            'image' => '/api/placeholder/400/300',
            'description' => 'Setup sound system dan lighting untuk gathering karyawan',
            'category' => 'Gathering',
            'sort_order' => 2,
            'active' => true,
        ]);

        Gallery::create([
            'title' => 'Acara Pernikahan Modern',
            'image' => '/api/placeholder/400/300',
            'description' => 'Tenda transparan dengan dekorasi modern',
            'category' => 'Pernikahan',
            'sort_order' => 3,
            'active' => true,
        ]);

        Gallery::create([
            'title' => 'Festival Musik',
            'image' => '/api/placeholder/400/300',
            'description' => 'Panggung dan sound system profesional untuk festival musik',
            'category' => 'Festival',
            'sort_order' => 4,
            'active' => true,
        ]);

        Gallery::create([
            'title' => 'Acara Ulang Tahun',
            'image' => '/api/placeholder/400/300',
            'description' => 'Dekorasi dan kursi meja untuk acara ulang tahun anak',
            'category' => 'Ulang Tahun',
            'sort_order' => 5,
            'active' => true,
        ]);

        Gallery::create([
            'title' => 'Hajatan Keluarga',
            'image' => '/api/placeholder/400/300',
            'description' => 'Setup lengkap tenda, kursi, meja, dan perlengkapan makan',
            'category' => 'Hajatan',
            'sort_order' => 6,
            'active' => true,
        ]);
    }
}
