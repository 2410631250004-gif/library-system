@extends('layouts.app')

@section('title', $title)

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
        <p>Selamat datang, <strong>{{ Auth::user()->name ?? 'Pengguna' }}</strong>!</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    @can('manage-users')
        <p><a href="{{ route('users.index') }}">Kelola Pengguna</a></p>
    @endcan

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
            <th>Kategori</th>
            <th>Tahun</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
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
    </table>
@endsection 