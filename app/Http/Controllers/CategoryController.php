<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class CategoryController extends Controller
{
    public function index()
    {
        $title = 'Daftar Kategori';
        $categories = [
            'Fiksi',
            'Non-Fiksi',
            'Sains & Teknologi',
            'Biografi',
            'Romance & Komedi',
        ];
 
        return view('categories.index', compact('title', 'categories'));
    }
}
 
