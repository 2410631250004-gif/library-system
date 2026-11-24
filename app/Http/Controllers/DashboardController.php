<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Category;
use App\Models\Member;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCategories = Category::count();
        $totalBooks = Book::count();
        $totalMembers = Member::count();
        $totalBorrowings = Borrowing::count();
        $activeBorrowings = Borrowing::where('status', 'borrowed')->count();

        $recentBorrowings = Borrowing::with(['member', 'details.book'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'totalCategories',
            'totalBooks',
            'totalMembers',
            'totalBorrowings',
            'activeBorrowings',
            'recentBorrowings'
        ));
    }
}