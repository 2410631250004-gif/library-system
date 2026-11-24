@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h2>Dashboard</h2>
    <p>Ringkasan informasi Sistem Informasi Perpustakaan.</p>

    <table border="1" cellpadding="6" cellspacing="0">
        <tr><th align="left">Jumlah kategori</th><td>{{ $totalCategories }}</td></tr>
        <tr><th align="left">Jumlah buku</th><td>{{ $totalBooks }}</td></tr>
        <tr><th align="left">Jumlah anggota</th><td>{{ $totalMembers }}</td></tr>
        <tr><th align="left">Jumlah transaksi peminjaman</th><td>{{ $totalBorrowings }}</td></tr>
        <tr><th align="left">Transaksi yang masih berjalan</th><td>{{ $activeBorrowings }}</td></tr>
    </table>

    <h3>5 Transaksi Terbaru</h3>

    @if($recentBorrowings->isEmpty())
        <p>Belum ada transaksi peminjaman.</p>
    @else
        <table border="1" cellpadding="6" cellspacing="0">
            <tr>
                <th>Anggota</th>
                <th>Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Status</th>
            </tr>
            @foreach($recentBorrowings as $borrowing)
                <tr>
                    <td>{{ $borrowing->member->name }}</td>
                    <td>
                        @foreach($borrowing->details as $detail)
                            {{ $detail->book->title }} (x{{ $detail->quantity }})<br>
                        @endforeach
                    </td>
                    <td>{{ $borrowing->borrowing_date->format('d-m-Y') }}</td>
                    <td>{{ $borrowing->status === 'borrowed' ? 'Dipinjam' : 'Dikembalikan' }}</td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection