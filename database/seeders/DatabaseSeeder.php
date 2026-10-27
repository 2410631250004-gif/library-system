<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Kosongkan tabel categories terlebih dahulu
        Category::query()->delete();

        // Daftar kategori sesuai kebutuhan kamu
        $categories = [
            'Fiksi',
            'Non-Fiksi',
            'Sains & Teknologi',
            'Biografi',
            'Romance & Komedi',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}