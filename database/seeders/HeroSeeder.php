<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hero;

class HeroSeeder extends Seeder
{
    public function run(): void
    {
        Hero::create([
            'slug'        => 'hai',
            'title'       => 'SMP Pancasila',
            'subtitle'    => 'Krian',
            'description' => 'Membentuk generasi berprestasi, berkarakter, dan berakhlak mulia.',
            'button_1_text' => 'Daftar Sekarang',
            'button_1_link' => '/daftar',
            'button_2_text' => 'Lihat Program',
            'button_2_link' => '/programs',
            'students'    => 500,
            'teachers'    => 35,
            'programs'    => 8,
            'experience'  => 20,
        ]);
    }
}
