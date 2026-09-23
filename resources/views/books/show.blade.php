@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
    <h2>Detail Buku</h2>
    <p>ID: {{ $id }}</p>

    @if($book)
        <ul>
            <li>Judul: {{ $book->title }}</li>
            <li>Penulis: {{ $book->author }}</li>
            <li>Tahun Terbit: {{ $book->year }}</li>
            <li>Stok: {{ $book->stock }}</li>
        </ul>
    @else
        <p>Buku dengan ID tersebut tidak ditemukan.</p>
    @endif

    <p><a href="/books">&larr; Kembali ke Daftar Buku</a></p>
@endsection