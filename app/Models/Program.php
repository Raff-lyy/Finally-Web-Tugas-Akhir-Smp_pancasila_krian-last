<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    // Tambahin ini biar bisa mass assignment
    protected $fillable = [
        'title',
        'desc',
        'image',
    ];
}
