<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $title = 'Daftar Member';
        $members = [
            ['nama' => 'Tasya', 'id' => 'ID001'],
            ['nama' => 'Anas', 'id' => 'ID002'],
            ['nama' => 'Tania', 'id' => 'ID003'],
            ['nama' => 'Aulia', 'id' => 'ID004'],
            ['nama' => 'Citra', 'id' => 'ID005'],
        ];

        return view('members.index', compact('title', 'members'));
    }
}