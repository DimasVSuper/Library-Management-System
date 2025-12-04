@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- Welcome Card -->
    <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg shadow-lg p-8 mb-8">
        <h2 class="text-3xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
        <p class="text-blue-100">Kelola perpustakaan Anda dengan mudah dan efisien</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Card 1: Total Buku -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 hover:shadow-lg transition duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Total Buku</p>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2">{{ number_format($totalBooks ?? 0) }}</p>
                </div>
                <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-full">
                    <svg class="w-8 h-8 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Card 2: Anggota Aktif -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 hover:shadow-lg transition duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Anggota Aktif</p>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2">{{ number_format($totalMembers ?? 0) }}</p>
                </div>
                <div class="bg-green-100 dark:bg-green-900 p-3 rounded-full">
                    <svg class="w-8 h-8 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Card 3: Peminjaman Aktif -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 hover:shadow-lg transition duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Peminjaman Aktif</p>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2">{{ number_format($activeBorrowings ?? 0) }}</p>
                </div>
                <div class="bg-yellow-100 dark:bg-yellow-900 p-3 rounded-full">
                    <svg class="w-8 h-8 text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Card 4: Total Denda -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 hover:shadow-lg transition duration-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Total Denda</p>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2">Rp {{ number_format($totalFines ?? 0, 0, ',', '.') }}</p>
                </div>
                <div class="bg-red-100 dark:bg-red-900 p-3 rounded-full">
                    <svg class="w-8 h-8 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1 1.05.82 1.87 2.65 1.87 1.96 0 2.4-.98 2.4-1.59 0-.83-.44-1.61-2.67-2.14-2.48-.6-4.18-1.62-4.18-3.67 0-1.72 1.39-2.84 3.11-3.21V4h2.67v1.95c1.86.45 2.79 1.86 2.85 3.39H14.3c-.05-1.11-.64-1.87-2.22-1.87-1.5 0-2.4.68-2.4 1.64 0 .84.65 1.39 2.67 1.91s4.18 1.39 4.18 3.91c-.01 1.83-1.38 2.83-3.12 3.16z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Aktivitas Terbaru</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-white">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Anggota</th>
                        <th class="px-4 py-2">Buku</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentActivities ?? [] as $activity)
                    <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-4 py-2">#{{ str_pad($activity->id, 3, '0', STR_PAD_LEFT) }}</td>
                        <td class="px-4 py-2">{{ $activity->member->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $activity->book->title ?? '-' }}</td>
                        <td class="px-4 py-2">
                            @if($activity->status === 'borrowed')
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">Dipinjam</span>
                            @elseif($activity->status === 'returned')
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Dikembalikan</span>
                            @else
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-xs">Terlambat</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $activity->created_at->format('d F Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-4 py-8 text-center text-gray-500">Belum ada aktivitas peminjaman</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
   