@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
    <h2>Detail Buku</h2>
    <p>ID: {{ $id }}</p>

    @if($book)
        <ul>
            <li>Judul: {{ $book['judul'] }}</li>
            <li>Penulis: {{ $book['penulis'] }}</li>
            <li>Tahun Terbit: {{ $book['tahun'] }}</li>
        </ul>
    @else
        <p>Buku dengan ID tersebut tidak ditemukan.</p>
    @endif

    <p><a href="/books">&larr; Kembali ke Daftar Buku</a></p>
@endsection