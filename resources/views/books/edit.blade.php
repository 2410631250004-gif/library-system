@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
    <h2>Edit Buku</h2>

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label>Judul</label><br>
            <input type="text" name="title" value="{{ $book->title }}" required>
        </p>
        <p>
            <label>Penulis</label><br>
            <input type="text" name="author" value="{{ $book->author }}" required>
        </p>
        <p>
            <label>Tahun Terbit</label><br>
            <input type="number" name="year" value="{{ $book->year }}" required>
        </p>
        <p>
            <label>Stok</label><br>
            <input type="number" name="stock" value="{{ $book->stock }}" required>
        </p>

        <button type="submit">Update</button>
        <a href="{{ route('books.index') }}">Batal</a>
    </form>
@endsection