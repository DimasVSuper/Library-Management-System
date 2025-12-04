<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Member;
use Illuminate\Database\Seeder;

class BorrowingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get existing members and books
        $members = Member::where('status', 'active')->get();
        $books = Book::where('available_stock', '>', 0)->get();

        if ($members->isEmpty() || $books->isEmpty()) {
            $this->command->warn('Please run BookSeeder and MemberSeeder first!');
            return;
        }

        // Create active borrowings (currently borrowed)
        foreach ($members->random(min(10, $members->count())) as $member) {
            $book = $books->random();
            
            Borrowing::factory()
                ->borrowed()
                ->forMember($member)
                ->forBook($book)
                ->create();

            // Decrease available stock
            $book->decrement('available_stock');
        }

        // Create returned borrowings (on time)
        foreach ($members->random(min(15, $members->count())) as $member) {
            $book = $books->random();
            
            Borrowing::factory()
                ->returned()
                ->forMember($member)
                ->forBook($book)
                ->create();
        }

        // Create overdue borrowings
        foreach ($members->random(min(5, $members->count())) as $member) {
            $book = $books->random();
            
            Borrowing::factory()
                ->overdue()
                ->forMember($member)
                ->forBook($book)
                ->create();

            // Decrease available stock for overdue
            if ($book->available_stock > 0) {
                $book->decrement('available_stock');
            }
        }

        // Create returned late borrowings (with fine)
        foreach ($members->random(min(8, $members->count())) as $member) {
            $book = $books->random();
            
            Borrowing::factory()
                ->returnedLate()
                ->forMember($member)
                ->forBook($book)
                ->create();
        }

        // Create some specific borrowings for testing
        $testMember = Member::where('email', 'budi.santoso@email.com')->first();
        $testBook = Book::where('title', 'Laskar Pelangi')->first();

        if ($testMember && $testBook) {
            Borrowing::create([
                'member_id' => $testMember->id,
                'book_id' => $testBook->id,
                'borrow_date' => now()->subDays(7),
                'due_date' => now()->addDays(7),
                'returned_date' => null,
                'status' => 'borrowed',
                'fine_amount' => 0,
                'notes' => 'Peminjaman rutin',
            ]);
        }
    }
}
