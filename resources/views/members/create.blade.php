@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('content')
    <h2>Tambah Anggota</h2>

    <form action="{{ route('members.store') }}" method="POST" novalidate>
        @csrf

        <div style="margin-bottom:12px">
            <label>Nama Anggota</label><br>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name')
                <p style="color:red; margin:4px 0">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom:12px">
            <label>Kode Anggota</label><br>
            <input type="text" name="member_code" value="{{ old('member_code') }}">
            @error('member_code')
                <p style="color:red; margin:4px 0">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom:12px">
            <label>Nomor Telepon</label><br>
            <input type="text" name="phone" value="{{ old('phone') }}">
            @error('phone')
                <p style="color:red; margin:4px 0">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom:12px">
            <label>Alamat</label><br>
            <textarea name="address" rows="3" cols="30">{{ old('address') }}</textarea>
            @error('address')
                <p style="color:red; margin:4px 0">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Simpan</button>
        <a href="{{ route('members.index') }}">Batal</a>
    </form>
@endsection