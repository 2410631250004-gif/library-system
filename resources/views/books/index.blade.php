@extends('layouts.app')

@section('title', $title)

@section('content')
    <h2>{{ $title }}</h2>
    <p>{{ $description }}</p>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <p><a href="{{ route('books.create') }}">+ Tambah Buku</a></p>

    <table border="1" cellpadding="6" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->stock }}</td>
                <td>
                    <a href="{{ route('books.edit', $book) }}">Edit</a>

                    <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline"
                          onsubmit="return confirm('Yakin hapus buku ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection