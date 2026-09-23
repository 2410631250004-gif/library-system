<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $title = 'Daftar Buku';
        $description = 'Daftar buku yang tersedia di perpustakaan.';
        $books = Book::all();

        return view('books.index', compact('title', 'description', 'books'));
    }

    public function show($id)
    {
        $book = Book::find($id);

        return view('books.show', compact('id', 'book'));
    }
}