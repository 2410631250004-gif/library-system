@extends('layouts.app')

@section('title', $title)

@section('content')
    <h2>{{ $title }}</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <p><a href="{{ route('members.create') }}">+ Tambah Anggota</a></p>

    <table border="1" cellpadding="6" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Telepon</th>
            <th>Alamat</th>
        </tr>
        @foreach($members as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->member_code }}</td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->phone ?? '-' }}</td>
                <td>{{ $member->address ?? '-' }}</td>
            </tr>
        @endforeach
    </table>
@endsection