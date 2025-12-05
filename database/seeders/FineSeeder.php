<?php

namespace Database\Seeders;

use App\Models\Fine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 random fines
        Fine::factory()->count(10)->create();
    }
}
