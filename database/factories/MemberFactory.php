<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cities = [
            'Jakarta',
            'Surabaya',
            'Bandung',
            'Medan',
            'Semarang',
            'Makassar',
            'Palembang',
            'Tangerang',
            'Depok',
            'Bekasi',
            'Yogyakarta',
            'Malang',
            'Solo',
            'Bogor',
            'Cirebon',
        ];

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->streetAddress(),
            'city' => fake()->randomElement($cities),
            'join_date' => fake()->dateTimeBetween('-2 years', 'now'),
            'status' => fake()->randomElement(['active', 'active', 'active', 'inactive']), // 75% active
            'notes' => fake()->optional(0.3)->sentence(),
        ];
    }

    /**
     * Indicate that the member is active.
     */
    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'active',
        ]);
    }

    /**
     * Indicate that the member is inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'inactive',
        ]);
    }

    /**
     * Indicate that the member joined recently.
     */
    public function recentlyJoined(): static
    {
        return $this->state(fn (array $attributes) => [
            'join_date' => fake()->dateTimeBetween('-1 month', 'now'),
        ]);
    }
}
