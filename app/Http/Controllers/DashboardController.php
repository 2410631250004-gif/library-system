<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $appTitle = 'Library System';
        $appDescription = 'Aplikasi sederhana untuk mengelola data buku, kategori, dan member perpustakaan.';
        $totalBooks = 5;
        $totalMembers = 5;
        $totalCategories = 5;

        return view('dashboard.index', compact(
            'appTitle',
            'appDescription',
            'totalBooks',
            'totalMembers',
            'totalCategories'
        ));
    }
}