<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrowing>
 */
class BorrowingFactory extends Factory
{
    protected $model = Borrowing::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $borrowDate = fake()->dateTimeBetween('-3 months', 'now');
        $dueDate = (clone $borrowDate)->modify('+14 days');
        
        return [
            'member_id' => Member::factory(),
            'book_id' => Book::factory(),
            'borrow_date' => $borrowDate,
            'due_date' => $dueDate,
            'returned_date' => null,
            'status' => 'borrowed',
            'fine_amount' => 0,
            'notes' => fake()->optional(0.2)->sentence(),
        ];
    }

    /**
     * Indicate that the borrowing is currently active (borrowed).
     */
    public function borrowed(): static
    {
        return $this->state(function (array $attributes) {
            $borrowDate = fake()->dateTimeBetween('-2 weeks', 'now');
            $dueDate = (clone $borrowDate)->modify('+14 days');
            
            return [
                'borrow_date' => $borrowDate,
                'due_date' => $dueDate,
                'returned_date' => null,
                'status' => 'borrowed',
                'fine_amount' => 0,
            ];
        });
    }

    /**
     * Indicate that the borrowing has been returned on time.
     */
    public function returned(): static
    {
        return $this->state(function (array $attributes) {
            $borrowDate = fake()->dateTimeBetween('-2 months', '-2 weeks');
            $dueDate = (clone $borrowDate)->modify('+14 days');
            $returnedDate = fake()->dateTimeBetween($borrowDate, $dueDate);
            
            return [
                'borrow_date' => $borrowDate,
                'due_date' => $dueDate,
                'returned_date' => $returnedDate,
                'status' => 'returned',
                'fine_amount' => 0,
            ];
        });
    }

    /**
     * Indicate that the borrowing is overdue.
     */
    public function overdue(): static
    {
        return $this->state(function (array $attributes) {
            $borrowDate = fake()->dateTimeBetween('-2 months', '-3 weeks');
            $dueDate = (clone $borrowDate)->modify('+14 days');
            
            return [
                'borrow_date' => $borrowDate,
                'due_date' => $dueDate,
                'returned_date' => null,
                'status' => 'overdue',
                'fine_amount' => 0,
            ];
        });
    }

    /**
     * Indicate that the borrowing was returned late with fine.
     */
    public function returnedLate(): static
    {
        return $this->state(function (array $attributes) {
            $borrowDate = fake()->dateTimeBetween('-3 months', '-1 month');
            $dueDate = (clone $borrowDate)->modify('+14 days');
            $daysLate = fake()->numberBetween(1, 14);
            $returnedDate = (clone $dueDate)->modify("+{$daysLate} days");
            $fineAmount = $daysLate * 1000; // Rp 1.000 per hari
            
            return [
                'borrow_date' => $borrowDate,
                'due_date' => $dueDate,
                'returned_date' => $returnedDate,
                'status' => 'returned',
                'fine_amount' => $fineAmount,
            ];
        });
    }

    /**
     * Use existing member.
     */
    public function forMember(Member $member): static
    {
        return $this->state(fn (array $attributes) => [
            'member_id' => $member->id,
        ]);
    }

    /**
     * Use existing book.
     */
    public function forBook(Book $book): static
    {
        return $this->state(fn (array $attributes) => [
            'book_id' => $book->id,
        ]);
    }
}
