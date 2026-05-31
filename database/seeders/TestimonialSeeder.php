<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::create([
            'content' => 'Layanan cepat dan peralatan berkualitas. Tim profesional dan sangat membantu!',
            'client_name' => 'Rina',
            'client_role' => 'Wedding Client',
            'rating' => 5,
            'sort_order' => 1,
            'active' => true,
        ]);

        Testimonial::create([
            'content' => 'Komunikasi lancar, pengiriman tepat waktu, dan instalasi rapi. Sangat recommended!',
            'client_name' => 'Budi',
            'client_role' => 'Event Organizer',
            'rating' => 5,
            'sort_order' => 2,
            'active' => true,
        ]);

        Testimonial::create([
            'content' => 'Sound system memuaskan dengan suara kuat dan jernih. Terima kasih timnya!',
            'client_name' => 'Sari',
            'client_role' => 'Konser Lokal',
            'rating' => 5,
            'sort_order' => 3,
            'active' => true,
        ]);

        Testimonial::create([
            'content' => 'AC dan lighting bekerja sempurna, membuat acara perusahaan kami lancar.',
            'client_name' => 'Ahmad',
            'client_role' => 'Corporate Event',
            'rating' => 5,
            'sort_order' => 4,
            'active' => true,
        ]);

        Testimonial::create([
            'content' => 'Tim sangat ramah dan profesional. Semua perlengkapan datang tepat waktu.',
            'client_name' => 'Dewi',
            'client_role' => 'Birthday Party',
            'rating' => 5,
            'sort_order' => 5,
            'active' => true,
        ]);

        Testimonial::create([
            'content' => 'Sound system luar biasa dengan bass dan treble seimbang. Puas sekali!',
            'client_name' => 'Fajar',
            'client_role' => 'Festival Musik',
            'rating' => 5,
            'sort_order' => 6,
            'active' => true,
        ]);
    }
}
