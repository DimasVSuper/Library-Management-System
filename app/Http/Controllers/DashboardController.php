<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Borrowing;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();
        $totalMembers = Member::where('status', 'active')->count();
        $activeBorrowings = Borrowing::where('status', 'borrowed')->count();
        $totalFines = Borrowing::sum('fine_amount');
        $recentActivities = Borrowing::with(['member', 'book'])
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('admin.dashboard', compact(
            'totalBooks',
            'totalMembers',
            'activeBorrowings',
            'totalFines',
            'recentActivities'
        ));
    }
}
