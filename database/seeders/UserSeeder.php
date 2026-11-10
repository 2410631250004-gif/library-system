<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(['email' => 'admin@gmail.com'], [
            'name' => 'Admin Perpustakaan', 'password' => Hash::make('password123'), 'role' => 'admin',
        ]);

        User::updateOrCreate(['email' => 'petugas@gmail.com'], [
            'name' => 'Petugas Perpustakaan', 'password' => Hash::make('password123'), 'role' => 'petugas',
        ]);
    }
}