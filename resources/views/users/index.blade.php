@extends('layouts.app')

@section('title', 'Kelola Pengguna')

@section('content')
    <h2>Kelola Pengguna</h2>

    <p><a href="{{ route('users.create') }}">+ Tambah Pengguna Baru</a></p>

    <table border="1" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user) }}">Edit</a>

                        @if(Auth::id() !== $user->id)
                            <form action="{{ route('users.destroy', $user) }}" 
                                  method="POST" 
                                  style="display:inline"
                                  onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
