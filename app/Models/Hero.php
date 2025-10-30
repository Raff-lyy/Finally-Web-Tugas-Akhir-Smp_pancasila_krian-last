<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = [
        'slug', 'title', 'subtitle', 'button_1_text', 'button_1_url',
        'button_2_text', 'button_2_url', 'background_image', 'stats'
    ];

    protected $casts = [
        'stats' => 'array',
    ];
}

