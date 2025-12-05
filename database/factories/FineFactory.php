<?php

namespace Database\Factories;

use App\Models\Borrowing;
use App\Models\Fine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fine>
 */
class FineFactory extends Factory
{
    protected $model = Fine::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Create a borrowing that was returned late
        $borrowing = Borrowing::factory()->returnedLate()->create();
        
        // Calculate days overdue based on borrowing dates
        $daysOverdue = $borrowing->due_date->diffInDays($borrowing->returned_date);
        $amount = $daysOverdue * 5000;

        $status = fake()->randomElement(['paid', 'unpaid']);
        $paidAt = $status === 'paid' ? fake()->dateTimeBetween($borrowing->returned_date, 'now') : null;

        return [
            'borrowing_id' => $borrowing->id,
            'amount' => $amount,
            'days_overdue' => $daysOverdue,
            'status' => $status,
            'paid_at' => $paidAt,
            'notes' => fake()->optional(0.3)->sentence(),
        ];
    }
}
