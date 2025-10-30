<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $fillable = [
    'title', 'subtitle', 'description',
    'button_1_text', 'button_1_link',
    'button_2_text', 'button_2_link',
    'students', 'teachers', 'programs', 'experience'
];

}
