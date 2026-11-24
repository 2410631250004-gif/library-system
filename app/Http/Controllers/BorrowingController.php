<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowingController extends Controller
{
    // Daftar transaksi (peminjaman dan pengembalian)
    public function index()
    {
        $borrowings = Borrowing::with(['member', 'user', 'details.book'])
            ->latest()
            ->get();

        return view('borrowings.index', compact('borrowings'));
    }

    // Form peminjaman
    public function create()
    {
        $members = Member::orderBy('name')->get();
        $books = Book::orderBy('title')->get();

        return view('borrowings.create', compact('members', 'books'));
    }

    public function store(Request $request)
    {
        // 1. Validasi input
        $validated = $request->validate([
            'member_id' => ['required', 'exists:members,id'],
            'book_id'   => ['required', 'exists:books,id'],
            'quantity'  => ['required', 'integer', 'min:1'],
        ], [
            'member_id.required' => 'Anggota belum dipilih.',
            'member_id.exists'   => 'Anggota yang dipilih tidak ditemukan.',
            'book_id.required'   => 'Buku belum dipilih.',
            'book_id.exists'     => 'Buku yang dipilih tidak ditemukan.',
            'quantity.required'  => 'Jumlah pinjaman wajib diisi.',
            'quantity.integer'   => 'Jumlah pinjaman harus berupa bilangan bulat.',
            'quantity.min'       => 'Jumlah pinjaman minimal 1.',
        ]);

        // cek stok
        $book = Book::findOrFail($validated['book_id']);

        if ($book->stock < 1) {
            return back()
                ->withErrors(['book_id' => 'Stok buku "' . $book->title . '" kosong, tidak dapat dipinjam.'])
                ->withInput();
        }

        if ($book->stock < $validated['quantity']) {
            return back()
                ->withErrors(['quantity' => 'Stok buku tidak mencukupi. Stok tersedia: ' . $book->stock . '.'])
                ->withInput();
        }

        // Catat, detail, dan kurangi stok 
        DB::transaction(function () use ($validated, $book) {
            $borrowing = Borrowing::create([
                'user_id'        => auth()->id(),
                'member_id'      => $validated['member_id'],
                'borrowing_date' => now()->toDateString(),
                'due_date'       => now()->addDays(7)->toDateString(),
                'status'         => 'borrowed',
            ]);

            $borrowing->details()->create([
                'book_id'  => $book->id,
                'quantity' => $validated['quantity'],
            ]);

            $book->decrement('stock', $validated['quantity']);
        });

        return redirect()
            ->route('borrowings.index')
            ->with('success', 'Peminjaman berhasil dicatat dan stok buku berkurang.');
    }

    // Proses pengembalian buku
    public function returnBook(Borrowing $borrowing)
    {
        if ($borrowing->status === 'returned') {
            return back()->withErrors(['borrowing' => 'Transaksi ini sudah dikembalikan sebelumnya.']);
        }

        DB::transaction(function () use ($borrowing) {
            $borrowing->update([
                'return_date' => now()->toDateString(),
                'status'      => 'returned',
            ]);

            foreach ($borrowing->details as $detail) {
                $detail->book->increment('stock', $detail->quantity);
            }
        });

        return redirect()
            ->route('borrowings.index')
            ->with('success', 'Buku berhasil dikembalikan dan stok bertambah.');
    }
}