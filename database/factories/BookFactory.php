<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Fiksi',
            'Non-Fiksi',
            'Sains',
            'Teknologi',
            'Sejarah',
            'Biografi',
            'Pendidikan',
            'Agama',
            'Komik',
            'Novel',
            'Ensiklopedia',
            'Kamus',
        ];

        $publishers = [
            'Gramedia Pustaka Utama',
            'Erlangga',
            'Mizan',
            'Kompas',
            'Bentang Pustaka',
            'Republika',
            'Penerbit Buku Kompas',
            'Pustaka Jaya',
            'Balai Pustaka',
            'Deepublish',
        ];

        $stock = fake('id_ID')->numberBetween(5, 50);

        return [
            'title' => fake('id_ID')->sentence(fake('id_ID')->numberBetween(2, 6)),
            'author' => fake('id_ID')->name(),
            'isbn' => fake('id_ID')->unique()->isbn13(),
            'description' => fake('id_ID')->paragraphs(2, true),
            'category' => fake('id_ID')->randomElement($categories),
            'year' => fake('id_ID')->numberBetween(1990, 2024),
            'publisher' => fake('id_ID')->randomElement($publishers),
            'stock' => $stock,
            'available_stock' => $stock,
            'price' => fake('id_ID')->numberBetween(25000, 250000),
        ];
    }

    /**
     * Indicate that the book has limited stock.
     */
    public function limitedStock(): static
    {
        return $this->state(fn (array $attributes) => [
            'stock' => fake()->numberBetween(1, 5),
            'available_stock' => fake()->numberBetween(0, 3),
        ]);
    }

    /**
     * Indicate that the book is out of stock.
     */
    public function outOfStock(): static
    {
        return $this->state(fn (array $attributes) => [
            'available_stock' => 0,
        ]);
    }
}
