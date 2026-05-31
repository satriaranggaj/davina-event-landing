<?php

namespace Database\Seeders;

use App\Models\BusinessInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BusinessInfo::updateOrCreate(
            ['id' => 1],
            [
                'business_name' => 'Davina Blower',
                'owner_name' => 'Davina Blower',
                'email' => 'contact@davinablower.com',
                'phone' => '0212345678',
                'whatsapp_number' => '6281234567890',
                'instagram' => 'https://instagram.com/davinablower',
                'tiktok' => 'https://tiktok.com/@davinablower',
                'facebook' => 'https://facebook.com/davinablower',
                'owner_bank_name' => 'BCA',
                'owner_bank_account' => '1234567890',
                'location_link' => 'https://maps.google.com',
                'map_embed_code' => '',
                'service' => 'Sewa Blower, AC, Lighting, Catering Gear',
            ]
        );
    }
}

