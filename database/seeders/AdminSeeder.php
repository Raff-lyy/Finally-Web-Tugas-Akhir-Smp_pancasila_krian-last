<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'pancasila@gmail.com'], // cek kalau sudah ada
            [
                'name' => 'Administrator',
                'password' => Hash::make('pancasila12'), // password: 123456
            ]
        );
    }
}
