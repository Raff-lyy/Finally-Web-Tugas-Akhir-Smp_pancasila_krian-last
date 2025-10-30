<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'visi', 'misi', 'values', 'image', 'stats'
    ];

    protected $casts = [
        'misi' => 'array',    // list misi
        'values' => 'array',  // array value (integritas, kolaborasi, dll)
        'stats' => 'array',   // achievement stats
    ];
}
