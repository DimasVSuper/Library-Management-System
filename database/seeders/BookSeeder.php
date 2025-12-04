<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 50 random books
        Book::factory(50)->create();

        // Create some books with limited stock
        Book::factory(5)->limitedStock()->create();

        // Create some specific books for testing
        Book::create([
            'title' => 'Laskar Pelangi',
            'author' => 'Andrea Hirata',
            'isbn' => '9789793062792',
            'description' => 'Novel inspiratif tentang perjuangan anak-anak Belitung dalam mengejar pendidikan.',
            'category' => 'Novel',
            'year' => 2005,
            'publisher' => 'Bentang Pustaka',
            'stock' => 20,
            'available_stock' => 18,
            'price' => 79000,
        ]);

        Book::create([
            'title' => 'Bumi Manusia',
            'author' => 'Pramoedya Ananta Toer',
            'isbn' => '9789799731234',
            'description' => 'Novel sejarah tentang perjuangan bangsa Indonesia di era kolonial.',
            'category' => 'Novel',
            'year' => 1980,
            'publisher' => 'Hasta Mitra',
            'stock' => 15,
            'available_stock' => 12,
            'price' => 95000,
        ]);

        Book::create([
            'title' => 'Filosofi Teras',
            'author' => 'Henry Manampiring',
            'isbn' => '9786024246945',
            'description' => 'Buku tentang filosofi Stoa untuk menjalani hidup yang lebih tenang.',
            'category' => 'Non-Fiksi',
            'year' => 2018,
            'publisher' => 'Kompas',
            'stock' => 25,
            'available_stock' => 20,
            'price' => 85000,
        ]);

        Book::create([
            'title' => 'Sapiens: A Brief History of Humankind',
            'author' => 'Yuval Noah Harari',
            'isbn' => '9780062316097',
            'description' => 'Sejarah singkat umat manusia dari zaman purba hingga modern.',
            'category' => 'Sejarah',
            'year' => 2011,
            'publisher' => 'Harper',
            'stock' => 10,
            'available_stock' => 8,
            'price' => 150000,
        ]);

        Book::create([
            'title' => 'Atomic Habits',
            'author' => 'James Clear',
            'isbn' => '9780735211292',
            'description' => 'Panduan praktis untuk membangun kebiasaan baik dan menghilangkan kebiasaan buruk.',
            'category' => 'Non-Fiksi',
            'year' => 2018,
            'publisher' => 'Avery',
            'stock' => 30,
            'available_stock' => 25,
            'price' => 120000,
        ]);
    }
}
