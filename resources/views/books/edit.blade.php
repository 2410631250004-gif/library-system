@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
    <h2>Edit Buku</h2>

    <form action="{{ route('books.update', $book) }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        <div style="margin-bottom:12px">
            <label>Judul Buku</label><br>
            <input type="text" name="title" value="{{ old('title', $book->title) }}">
            @error('title')
                <p style="color:red; margin:4px 0">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom:12px">
            <label>Penulis</label><br>
            <input type="text" name="author" value="{{ old('author', $book->author) }}">
            @error('author')
                <p style="color:red; margin:4px 0">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom:12px">
            <label>Tahun Terbit</label><br>
            <input type="number" name="year" value="{{ old('year', $book->year) }}">
            @error('year')
                <p style="color:red; margin:4px 0">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom:12px">
            <label>Stok</label><br>
            <input type="number" name="stock" value="{{ old('stock', $book->stock) }}">
            @error('stock')
                <p style="color:red; margin:4px 0">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom:12px">
            <label for="category_id">Kategori Buku</label><br>
            <select name="category_id" id="category_id">
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $book->category_id) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p style="color:red; margin:4px 0">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Update</button>
        <a href="{{ route('books.index') }}">Batal</a>
    </form>
@endsection