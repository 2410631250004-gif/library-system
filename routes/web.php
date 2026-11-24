<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BorrowingController;

// Redirect halaman utama ke dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Route khusus pengguna yang belum login (guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

// Route untuk Admin dan Petugas (bisa diakses bersama setelah login)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Fitur bersama Admin & Petugas
    Route::resource('books', BookController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('members', MemberController::class);

    // Peminjaman dan pengembalian
    Route::resource('borrowings', BorrowingController::class)->only(['index', 'create', 'store']);
    Route::patch('/borrowings/{borrowing}/return', [BorrowingController::class, 'returnBook'])
        ->name('borrowings.return');
});

// Route khusus Admin
Route::middleware(['auth', 'can:manage-users'])->group(function () {
    Route::resource('users', UserController::class);
});