<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // READ - daftar buku
    public function index()
    {
        $title = 'Daftar Buku';
        $description = 'Daftar buku yang tersedia di perpustakaan.';
        $books = Book::all();

        return view('books.index', compact('title', 'description', 'books'));
    }

    // CREATE - tampilkan form tambah
    public function create()
    {
        return view('books.create');
    }

    // STORE - simpan data baru
    public function store(Request $request)
    {
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'stock' => $request->stock,
        ]);

        return redirect()->route('books.index');
    }

    // READ - detail buku 
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // UPDATE - tampilkan form edit
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // UPDATE - simpan perubahan
    public function update(Request $request, Book $book)
    {
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'stock' => $request->stock,
        ]);

        return redirect()->route('books.index');
    }

    // DELETE - hapus buku
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
}