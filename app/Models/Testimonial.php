<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'content',
        'client_name',
        'client_role',
        'rating',
        'client_image',
        'sort_order',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
        'rating' => 'integer',
    ];
}
