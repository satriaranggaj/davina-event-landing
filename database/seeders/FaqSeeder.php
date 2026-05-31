<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create([
            'question' => 'Berapa minimal sewa untuk setiap produk?',
            'answer' => 'Minimal sewa berbeda untuk setiap produk. Untuk produk tertentu seperti kursi mulai dari 50 pcs, sementara produk lain mulai dari 1-2 unit. Lihat detail produk untuk informasi lengkap.',
            'category' => 'Umum',
            'sort_order' => 1,
            'active' => true,
        ]);

        Faq::create([
            'question' => 'Apakah harga sudah termasuk instalasi?',
            'answer' => 'Untuk beberapa produk seperti AC, sound system, dan lighting sudah termasuk instalasi oleh teknisi profesional kami. Untuk produk lainnya, instalasi bisa ditambahkan dengan biaya tambahan.',
            'category' => 'Layanan',
            'sort_order' => 2,
            'active' => true,
        ]);

        Faq::create([
            'question' => 'Apakah ada operator/teknisi yang standby?',
            'answer' => 'Ya, kami menyediakan layanan teknisi/operator yang standby selama acara Anda berlangsung untuk memastikan semua peralatan berjalan dengan optimal.',
            'category' => 'Layanan',
            'sort_order' => 3,
            'active' => true,
        ]);

        Faq::create([
            'question' => 'Bagaimana sistem pembayaran dan DP?',
            'answer' => 'Pembayaran dapat dilakukan via transfer bank, e-wallet, atau tunai. DP minimal 30% dari total biaya untuk mengamankan reservasi. Pelunasan dilakukan sebelum barang dikirim.',
            'category' => 'Pembayaran',
            'sort_order' => 4,
            'active' => true,
        ]);

        Faq::create([
            'question' => 'Apakah ada biaya pengiriman?',
            'answer' => 'Biaya pengiriman gratis untuk wilayah Jabodebek dengan minimal pemesanan. Untuk wilayah tertentu, biaya pengiriman akan dikomunikasikan sesuai lokasi Anda.',
            'category' => 'Pengiriman',
            'sort_order' => 5,
            'active' => true,
        ]);

        Faq::create([
            'question' => 'Kapan barang bisa dikirim?',
            'answer' => 'Barang dapat dikirim paling lambat 1-2 hari sebelum acara Anda. Untuk kebutuhan mendesak, silakan hubungi kami langsung melalui WhatsApp untuk penawaran khusus.',
            'category' => 'Pengiriman',
            'sort_order' => 6,
            'active' => true,
        ]);

        Faq::create([
            'question' => 'Apakah semua barang dijamin datang dalam kondisi bersih?',
            'answer' => 'Ya, semua peralatan dicek dan dibersihkan sebelum pengiriman. Kami berkomitmen memberikan barang dalam kondisi bersih dan siap pakai.',
            'category' => 'Kualitas',
            'sort_order' => 7,
            'active' => true,
        ]);

        Faq::create([
            'question' => 'Apa persyaratan listrik untuk peralatan yang membutuhkan?',
            'answer' => 'Untuk AC, sound system, dan lighting membutuhkan sumber listrik yang cukup. Sebaiknya lokasi acara memiliki genset atau listrik 3-5 ampere minimal.',
            'category' => 'Teknis',
            'sort_order' => 8,
            'active' => true,
        ]);
    }
}
