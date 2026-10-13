@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
    <h2>Detail Buku</h2>

    <ul>
        <li>ID: {{ $book->id }}</li>
        <li>Judul: {{ $book->title }}</li>
        <li>Penulis: {{ $book->author }}</li>
        <li>Tahun Terbit: {{ $book->year }}</li>
        <li>Stok: {{ $book->stock }}</li>
    </ul>

    <p>
        <a href="{{ route('books.edit', $book) }}">Edit</a> |
        <a href="{{ route('books.index') }}">&larr; Kembali ke Daftar Buku</a>
    </p>
@endsection