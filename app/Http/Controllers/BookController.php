<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Book;

class BookController extends Controller
{
    // Aturan validasi store() dan update()
    private function rules(?Book $book = null): array
    {
        return [
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('books', 'title')->ignore($book),
            ],
            'author' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[\pL\s\.\,\'\-]+$/u',
            ],
            'year' => [
                'required',
                'integer',
                'digits:4',
                'min:1901',
                'max:' . date('Y'),
            ],
            'stock' => [
                'required',
                'integer',
                'min:0',
                'max:1000',
            ],
        ];
    }

    // Pesan kesalahan 
    private function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'string'   => ':attribute harus berupa teks.',
            'integer'  => ':attribute harus berupa bilangan bulat.',
            'digits'   => ':attribute harus terdiri dari :digits digit.',
            'unique'   => ':attribute sudah ada di database.',
            'regex'    => ':attribute hanya boleh berisi huruf, spasi, titik, koma, apostrof, dan tanda hubung.',

        // Pemisahan aturan min & max berdasarkan tipe data
            'min' => [
                'numeric' => ':attribute minimal :min.',
                'string'  => ':attribute minimal :min karakter.',
            ],
            'max' => [
                'numeric' => ':attribute maksimal :max.',
                'string'  => ':attribute maksimal :max karakter.',
        ],
    ];
}

    private function attributes(): array
    {
        return [
            'title'  => 'Judul buku',
            'author' => 'Nama penulis',
            'year'   => 'Tahun terbit',
            'stock'  => 'Stok',
        ];
    }

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

    // STORE - validasi lalu simpan data baru
    public function store(Request $request)
    {
        $validated = $request->validate(
            $this->rules(),
            $this->messages(),
            $this->attributes()
        );

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Data buku berhasil ditambahkan.');
    }

    // READ - detail buku (Route Model Binding)
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // UPDATE - tampilkan form edit
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // UPDATE - validasi lalu simpan perubahan
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate(
            $this->rules($book),
            $this->messages(),
            $this->attributes()
        );

        $book->update($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Data buku berhasil diperbarui.');
    }

    // DELETE - hapus buku
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Data buku berhasil dihapus.');
    }
}