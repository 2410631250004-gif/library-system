@extends('layouts.app')

@section('title', 'Peminjaman')

@section('content')
    <h2>Transaksi Peminjaman</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p style="color:red">{{ $error }}</p>
        @endforeach
    @endif

    <p><a href="{{ route('borrowings.create') }}">+ Catat Peminjaman</a></p>

    <table border="1" cellpadding="6" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Anggota</th>
            <th>Buku</th>
            <th>Tgl Pinjam</th>
            <th>Jatuh Tempo</th>
            <th>Tgl Kembali</th>
            <th>Status</th>
            <th>Petugas</th>
            <th>Aksi</th>
        </tr>
        @foreach($borrowings as $borrowing)
            <tr>
                <td>{{ $borrowing->id }}</td>
                <td>{{ $borrowing->member->name }}</td>
                <td>
                    @foreach($borrowing->details as $detail)
                        {{ $detail->book->title }} (x{{ $detail->quantity }})<br>
                    @endforeach
                </td>
                <td>{{ $borrowing->borrowing_date->format('d-m-Y') }}</td>
                <td>{{ $borrowing->due_date->format('d-m-Y') }}</td>
                <td>{{ $borrowing->return_date?->format('d-m-Y') ?? '-' }}</td>
                <td>{{ $borrowing->status === 'borrowed' ? 'Dipinjam' : 'Dikembalikan' }}</td>
                <td>{{ $borrowing->user->name }}</td>
                <td>
                    @if($borrowing->status === 'borrowed')
                        <form action="{{ route('borrowings.return', $borrowing) }}" method="POST" style="display:inline"
                              onsubmit="return confirm('Proses pengembalian buku ini?')">
                            @csrf
                            @method('PATCH')
                            <button type="submit">Kembalikan</button>
                        </form>
                    @else
                        -
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
@endsection