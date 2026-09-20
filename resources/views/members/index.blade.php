@extends('layouts.app')

@section('title', $title)

@section('content')
    <h2>{{ $title }}</h2>

    <ul>
        @foreach($members as $member)
            <li>{{ $member['nama'] }} ({{ $member['id'] }})</li>
        @endforeach
    </ul>
@endsection