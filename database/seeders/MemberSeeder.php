<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 30 active members
        Member::factory(30)->active()->create();

        // Create 10 inactive members
        Member::factory(10)->inactive()->create();

        // Create 5 recently joined members
        Member::factory(5)->recentlyJoined()->create();

        // Create some specific members for testing
        Member::create([
            'name' => 'Budi Santoso',
            'email' => 'budi.santoso@email.com',
            'phone' => '081234567890',
            'address' => 'Jl. Merdeka No. 123',
            'city' => 'Jakarta',
            'join_date' => now()->subMonths(6),
            'status' => 'active',
            'notes' => 'Anggota premium',
        ]);

        Member::create([
            'name' => 'Siti Rahayu',
            'email' => 'siti.rahayu@email.com',
            'phone' => '082345678901',
            'address' => 'Jl. Sudirman No. 45',
            'city' => 'Bandung',
            'join_date' => now()->subMonths(3),
            'status' => 'active',
            'notes' => null,
        ]);

        Member::create([
            'name' => 'Ahmad Hidayat',
            'email' => 'ahmad.hidayat@email.com',
            'phone' => '083456789012',
            'address' => 'Jl. Diponegoro No. 78',
            'city' => 'Surabaya',
            'join_date' => now()->subYear(),
            'status' => 'active',
            'notes' => 'Mahasiswa',
        ]);

        Member::create([
            'name' => 'Dewi Lestari',
            'email' => 'dewi.lestari@email.com',
            'phone' => '084567890123',
            'address' => 'Jl. Gatot Subroto No. 90',
            'city' => 'Yogyakarta',
            'join_date' => now()->subMonths(8),
            'status' => 'inactive',
            'notes' => 'Pindah kota',
        ]);

        Member::create([
            'name' => 'Rudi Hermawan',
            'email' => 'rudi.hermawan@email.com',
            'phone' => '085678901234',
            'address' => 'Jl. Ahmad Yani No. 55',
            'city' => 'Semarang',
            'join_date' => now()->subDays(14),
            'status' => 'active',
            'notes' => 'Anggota baru',
        ]);
    }
}
