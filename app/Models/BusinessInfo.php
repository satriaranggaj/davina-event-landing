<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessInfo extends Model
{
    protected $table = 'business_info';

    protected $fillable = [
        'business_name',
        'owner_name',
        'email',
        'phone',
        'whatsapp_number',
        'instagram',
        'tiktok',
        'facebook',
        'owner_bank_name',
        'owner_bank_account',
        'location_link',
        'map_embed_code',
        'service',
    ];
}
