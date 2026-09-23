@extends('layouts.app')

@section('title', $title)

@section('content')
    <h2>{{ $title }}</h2>
    <p>{{ $description }}</p>

    <ul>
        @foreach($books as $book)
            <li>
                <strong>ID: {{ $book->id }}</strong> -
                <a href="/books/{{ $book->id }}">{{ $book->title }}</a>
                - {{ $book->author }} ({{ $book->year }}) | Stok: {{ $book->stock }}
            </li>
        @endforeach
    </ul>
@endsection