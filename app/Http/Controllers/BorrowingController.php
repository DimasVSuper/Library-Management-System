<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Book;
use App\Models\Member;
use App\Models\Fine;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = $request->get('page', 1);
        $search = $request->get('search', '');

        $borrowings = Cache::tags(['borrowings'])->remember("borrowings_index_page_{$page}_search_{$search}", 600, function () use ($request) {
            $query = Borrowing::with(['member', 'book']);

            if ($request->has('search')) {
                $search = $request->search;
                $query->whereHas('member', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })->orWhereHas('book', function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%");
                });
            }

            return $query->latest()->paginate(10);
        });

        return view('admin.borrowings.index', compact('borrowings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = Member::where('status', 'active')->get();
        $books = Book::where('available_stock', '>', 0)->get();
        return view('admin.borrowings.create', compact('members', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date|after_or_equal:today',
            'due_date' => 'required|date|after:borrow_date',
            'notes' => 'nullable|string',
        ]);

        // Check if book is available
        $book = Book::find($validated['book_id']);
        if ($book->available_stock <= 0) {
            return back()->with('error', 'Buku tidak tersedia untuk dipinjam!');
        }

        // Check if member has active borrowing for same book
        $activeBorrowing = Borrowing::where('member_id', $validated['member_id'])
            ->where('book_id', $validated['book_id'])
            ->where('status', '!=', 'returned')
            ->first();

        if ($activeBorrowing) {
            return back()->with('error', 'Member masih memiliki peminjaman buku yang sama yang belum dikembalikan!');
        }

        $validated['borrow_date'] = Carbon::parse($validated['borrow_date'])->startOfDay();
        $validated['due_date'] = Carbon::parse($validated['due_date'])->startOfDay();
        $validated['status'] = 'borrowed';
        $validated['fine_amount'] = 0;

        // Create borrowing record
        Borrowing::create($validated);

        // Decrease available stock
        $book->decrement('available_stock');

        Cache::tags(['borrowings', 'books'])->flush();

        return redirect()->route('borrowings.index')->with('success', 'Peminjaman buku berhasil dicatat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Borrowing $borrowing)
    {
        $borrowing->load(['member', 'book']);
        return view('admin.borrowings.show', compact('borrowing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Borrowing $borrowing)
    {
        $members = Member::where('status', 'active')->get();
        $books = Book::all();
        return view('admin.borrowings.edit', compact('borrowing', 'members', 'books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrowing $borrowing)
    {
        $validated = $request->validate([
            'borrow_date' => 'required|date',
            'due_date' => 'required|date|after:borrow_date',
            'notes' => 'nullable|string',
        ]);

        $validated['borrow_date'] = Carbon::parse($validated['borrow_date'])->startOfDay();
        $validated['due_date'] = Carbon::parse($validated['due_date'])->startOfDay();

        $borrowing->update($validated);

        Cache::tags(['borrowings'])->flush();

        return redirect()->route('borrowings.index')->with('success', 'Data peminjaman berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Borrowing $borrowing)
    {
        // Restore book stock if still borrowed
        if ($borrowing->status === 'borrowed' || $borrowing->status === 'overdue') {
            $borrowing->book->increment('available_stock');
        }

        $borrowing->delete();
        Cache::tags(['borrowings', 'books'])->flush();
        return redirect()->route('borrowings.index')->with('success', 'Data peminjaman berhasil dihapus!');
    }

    /**
     * Return a borrowed book
     */
    public function return(Borrowing $borrowing)
    {
        // Check if already returned
        if ($borrowing->status === 'returned') {
            return back()->with('error', 'Buku ini sudah dikembalikan sebelumnya!');
        }

        $today = Carbon::today();
        $returned_date = $today;

        // Calculate fine if overdue
        $fine_amount = 0;
        $days_overdue = 0;
        
        if ($today > $borrowing->due_date) {
            $days_overdue = $today->diffInDays($borrowing->due_date);
            $fine_amount = $days_overdue * 5000; // Rp 5000 per hari
        }

        // Update borrowing record
        $borrowing->update([
            'returned_date' => $returned_date,
            'status' => 'returned',
            'fine_amount' => $fine_amount,
        ]);

        // Create Fine record if there is a fine
        if ($fine_amount > 0) {
            Fine::create([
                'borrowing_id' => $borrowing->id,
                'amount' => $fine_amount,
                'days_overdue' => $days_overdue,
                'status' => 'unpaid',
                'notes' => 'Denda keterlambatan ' . $days_overdue . ' hari.',
            ]);
        }

        // Increase available stock
        $borrowing->book->increment('available_stock');

        Cache::tags(['borrowings', 'books', 'fines'])->flush();

        return redirect()->route('borrowings.index')->with('success', 'Pengembalian buku berhasil dicatat!' . ($fine_amount > 0 ? ' (Denda: Rp ' . number_format($fine_amount, 0, ',', '.') . ')' : ''));
    }
}

