@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- Welcome Card -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-2xl shadow-xl p-8 mb-8 relative overflow-hidden">
        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-white/20 rounded-full blur-2xl"></div>
        <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-32 h-32 bg-white/20 rounded-full blur-2xl"></div>
        <div class="relative z-10">
            <h2 class="text-3xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
            <p class="text-blue-100">Kelola perpustakaan Anda dengan mudah dan efisien</p>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Card 1: Total Buku -->
        <div class="bg-white/70 dark:bg-gray-800/80 backdrop-blur-md border border-white/20 dark:border-gray-700/50 rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Total Buku</p>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2 group-hover:text-blue-600 transition-colors">{{ number_format($totalBooks ?? 0) }}</p>
                </div>
                <div class="bg-blue-100/50 dark:bg-blue-900/50 p-3 rounded-xl group-hover:bg-blue-600 group-hover:text-white transition-all duration-300 text-blue-600 dark:text-blue-400">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Card 2: Anggota Aktif -->
        <div class="bg-white/70 dark:bg-gray-800/80 backdrop-blur-md border border-white/20 dark:border-gray-700/50 rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Anggota Aktif</p>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2 group-hover:text-green-600 transition-colors">{{ number_format($totalMembers ?? 0) }}</p>
                </div>
                <div class="bg-green-100/50 dark:bg-green-900/50 p-3 rounded-xl group-hover:bg-green-600 group-hover:text-white transition-all duration-300 text-green-600 dark:text-green-400">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Card 3: Peminjaman Aktif -->
        <div class="bg-white/70 dark:bg-gray-800/80 backdrop-blur-md border border-white/20 dark:border-gray-700/50 rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Peminjaman Aktif</p>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2 group-hover:text-yellow-600 transition-colors">{{ number_format($activeBorrowings ?? 0) }}</p>
                </div>
                <div class="bg-yellow-100/50 dark:bg-yellow-900/50 p-3 rounded-xl group-hover:bg-yellow-500 group-hover:text-white transition-all duration-300 text-yellow-600 dark:text-yellow-400">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Card 4: Total Denda -->
        <div class="bg-white/70 dark:bg-gray-800/80 backdrop-blur-md border border-white/20 dark:border-gray-700/50 rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Total Denda</p>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2 group-hover:text-red-600 transition-colors">Rp {{ number_format($totalFines ?? 0, 0, ',', '.') }}</p>
                </div>
                <div class="bg-red-100/50 dark:bg-red-900/50 p-3 rounded-xl group-hover:bg-red-600 group-hover:text-white transition-all duration-300 text-red-600 dark:text-red-400">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1 1.05.82 1.87 2.65 1.87 1.96 0 2.4-.98 2.4-1.59 0-.83-.44-1.61-2.67-2.14-2.48-.6-4.18-1.62-4.18-3.67 0-1.72 1.39-2.84 3.11-3.21V4h2.67v1.95c1.86.45 2.79 1.86 2.85 3.39H14.3c-.05-1.11-.64-1.87-2.22-1.87-1.5 0-2.4.68-2.4 1.64 0 .84.65 1.39 2.67 1.91s4.18 1.39 4.18 3.91c-.01 1.83-1.38 2.83-3.12 3.16z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white/70 dark:bg-gray-800/80 backdrop-blur-md border border-white/20 dark:border-gray-700/50 rounded-2xl shadow-lg p-6">
        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-6">Aktivitas Terbaru</h3>
        <div class="overflow-x-auto rounded-xl">
            <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
                <thead class="bg-gray-100/50 dark:bg-gray-700/50 text-gray-800 dark:text-white uppercase tracking-wider text-xs">
                    <tr>
                        <th class="px-6 py-4 font-semibold">ID</th>
                        <th class="px-6 py-4 font-semibold">Anggota</th>
                        <th class="px-6 py-4 font-semibold">Buku</th>
                        <th class="px-6 py-4 font-semibold">Status</th>
                        <th class="px-6 py-4 font-semibold">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($recentActivities ?? [] as $activity)
                    <tr class="hover:bg-blue-50/50 dark:hover:bg-gray-700/50 transition-colors duration-200">
                        <td class="px-6 py-4 font-medium">#{{ str_pad($activity->id, 3, '0', STR_PAD_LEFT) }}</td>
                        <td class="px-6 py-4">{{ $activity->member->name ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $activity->book->title ?? '-' }}</td>
                        <td class="px-6 py-4">
                            @if($activity->status === 'borrowed')
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">Dipinjam</span>
                            @elseif($activity->status === 'returned')
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">Dikembalikan</span>
                            @else
                                <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-semibold">Terlambat</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">{{ $activity->created_at->format('d F Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">Belum ada aktivitas peminjaman</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
   