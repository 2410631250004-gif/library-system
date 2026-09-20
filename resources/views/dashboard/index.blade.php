@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2>{{ $appTitle }}</h2>
    <p>{{ $appDescription }}</p>

    <ul>
        <li>Jumlah buku: {{ $totalBooks }}</li>
        <li>Jumlah member: {{ $totalMembers }}</li>
        <li>Jumlah kategori: {{ $totalCategories }}</li>
    </ul>
@endsection