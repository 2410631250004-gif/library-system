@extends('layouts.app')

@section('title', $title)

@section('content')
    <h2>{{ $title }}</h2>
    <p>{{ $description }}</p>

    <ul>
        @foreach($books as $id => $book)
            <li>
                <a href="/books/{{ $id }}">{{ $book['judul'] }}</a>
                — {{ $book['penulis'] }} ({{ $book['tahun'] }})
            </li>
        @endforeach
    </ul>
@endsection