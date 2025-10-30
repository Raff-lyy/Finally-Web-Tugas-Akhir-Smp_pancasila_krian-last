<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;

    protected $fillable = [
    'judul',
    'isi',      // untuk menyimpan teks rich text/HTML
    'penulis',
    'tanggal',
    ];
}
