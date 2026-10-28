<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'tasya@gmail.com'],
            [
                'name' => 'Admin Tasya',
                'password' => Hash::make('tasya123'),
            ]
        );
    }
}