<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title' => 'Laut Bercerita',
            'author' => 'Leila S. Chudori',
            'year' => 2017,
            'stock' => 4,
        ]);

        Book::create([
            'title' => 'Bumi Manusia',
            'author' => 'Pramoedya Ananta Toer',
            'year' => 1980,
            'stock' => 3,
        ]);

        Book::create([
            'title' => 'Filosofi Teras',
            'author' => 'Henry Manampiring',
            'year' => 2018,
            'stock' => 6,
        ]);

        Book::create([
            'title' => 'Butterflies',
            'author' => 'ALE (Alesacakes)',
            'year' => 2021,
            'stock' => 5,
        ]);

        Book::create([
            'title' => 'Koala Kumal',
            'author' => 'Raditya Dika',
            'year' => 2015,
            'stock' => 2,
        ]);
    }
}