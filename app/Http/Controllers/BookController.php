<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    // Data dummy disimpan dalam array (tidak menggunakan database)
    private function getBooks()
    {
        return [
            1 => ['judul' => 'Laut Bercerita', 'penulis' => 'Leila S. Chudori', 'tahun' => 2017],
            2 => ['judul' => 'Bumi Manusia', 'penulis' => 'Pramoedya Ananta Toer', 'tahun' => 1980],
            3 => ['judul' => 'Filosofi Teras', 'penulis' => 'Henry Manampiring', 'tahun' => 2018],
            4 => ['judul' => 'Butterflies', 'penulis' => 'ALE (Alesacakes)', 'tahun' => 2021],
            5 => ['judul' => 'Koala Kumal ', 'penulis' => 'Raditya Dika', 'tahun' => 2015],
        ];
    }

    public function index()
    {
        $title = 'Daftar Buku';
        $description = 'Daftar buku yang tersedia di perpustakaan.';
        $books = $this->getBooks();

        return view('books.index', compact('title', 'description', 'books'));
    }

    public function show($id)
    {
        $books = $this->getBooks();
        $book = $books[$id] ?? null;

        return view('books.show', compact('id', 'book'));
    }
}