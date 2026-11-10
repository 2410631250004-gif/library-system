@extends('layouts.app')

@section('title', $title)

@section('content')
    <div style="margin-bottom: 15px;">
        <p>Selamat datang, <strong>{{ Auth::user()->name ?? 'Pengguna' }}</strong>!</p>
    </div>

    <h2>{{ $title }}</h2>
    <p>{{ $description }}</p>

    <p><a href="{{ route('books.create') }}">+ Tambah Buku</a></p>

    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Tahun</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->category?->name ?? 'Belum ada kategori' }}</td>
                    <td>{{ $book->year }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book) }}">Edit</a>

                        @can('delete', $book)
                            <form action="{{ route('books.destroy', $book) }}"
                                  method="POST"
                                  style="display:inline"
                                  onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection