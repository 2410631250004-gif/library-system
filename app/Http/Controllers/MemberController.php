<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $title = 'Daftar Anggota';
        $members = Member::orderBy('member_code', 'asc')->get();

        return view('members.index', compact('title', 'members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'member_code' => ['required', 'string', 'max:50', 'unique:members,member_code'],
            'phone'       => ['nullable', 'string', 'max:20', 'regex:/^[0-9+\-\s]+$/'],
            'address'     => ['nullable', 'string', 'max:500'],
        ], [
            'required' => ':attribute wajib diisi.',
            'max'      => ':attribute terlalu panjang (maksimal :max karakter).',
            'unique'   => ':attribute sudah terdaftar.',
            'regex'    => ':attribute hanya boleh berisi angka, spasi, tanda + dan -.',
        ], [
            'name'        => 'Nama anggota',
            'member_code' => 'Kode anggota',
            'phone'       => 'Nomor telepon',
            'address'     => 'Alamat',
        ]);

        Member::create($validated);

        return redirect()
            ->route('members.index')
            ->with('success', 'Anggota berhasil ditambahkan.');
    }
}