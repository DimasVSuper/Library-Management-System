@extends('layouts.admin')

@section('title', 'Manajemen Peminjaman')

@section('content')
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Manajemen Peminjaman</h1>
            <p class="text-slate-600 dark:text-slate-400 mt-1">Kelola transaksi peminjaman buku</p>
        </div>
        <a href="{{ route('borrowings.create') }}" class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-3 rounded-lg font-semibold transition duration-300 transform hover:scale-105">
            + Pinjam Buku
        </a>
    </div>

    <!-- Alert Messages -->
    @if ($message = Session::get('success'))
    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg dark:bg-green-900 dark:border-green-700 dark:text-green-200">
        {{ $message }}
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg dark:bg-red-900 dark:border-red-700 dark:text-red-200">
        {{ $message }}
    </div>
    @endif

    <!-- Search and Filter -->
    <div class="mb-6 bg-white/70 dark:bg-gray-800/80 backdrop-blur-md border border-white/20 dark:border-gray-700/50 rounded-2xl shadow-lg p-6">
        <form method="GET" action="{{ route('borrowings.index') }}" class="flex gap-3">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}"
                placeholder="Cari nama peminjam atau judul buku..." 
                class="flex-1 px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-xl dark:bg-slate-700/50 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all"
            />
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl font-semibold transition duration-300 shadow-md">
                Cari
            </button>
        </form>
    </div>

    <!-- Borrowings Table -->
    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md overflow-hidden">
        @if ($borrowings->count() > 0)
        <table class="w-full">
            <thead>
                <tr class="bg-gradient-to-r from-blue-600 to-purple-600 text-white">
                    <th class="px-6 py-4 text-left font-semibold">Member</th>
                    <th class="px-6 py-4 text-left font-semibold">Buku</th>
                    <th class="px-6 py-4 text-left font-semibold">Tgl Pinjam</th>
                    <th class="px-6 py-4 text-left font-semibold">Tgl Kembali</th>
                    <th class="px-6 py-4 text-center font-semibold">Status</th>
                    <th class="px-6 py-4 text-center font-semibold">Denda</th>
                    <th class="px-6 py-4 text-center font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrowings as $borrowing)
                <tr class="border-b border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                    <td class="px-6 py-4 text-slate-900 dark:text-white font-medium">{{ $borrowing->member->name }}</td>
                    <td class="px-6 py-4 text-slate-700 dark:text-slate-300">{{ $borrowing->book->title }}</td>
                    <td class="px-6 py-4 text-slate-700 dark:text-slate-300 text-sm">{{ $borrowing->borrow_date->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-slate-700 dark:text-slate-300 text-sm">{{ $borrowing->due_date->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-center">
                        @if ($borrowing->status === 'borrowed')
                            <span class="inline-block bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-3 py-1 rounded-full text-sm font-semibold">Dipinjam</span>
                        @elseif ($borrowing->status === 'returned')
                            <span class="inline-block bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 px-3 py-1 rounded-full text-sm font-semibold">Dikembalikan</span>
                        @else
                            <span class="inline-block bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 px-3 py-1 rounded-full text-sm font-semibold">Terlambat</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center font-semibold">
                        @if ($borrowing->fine_amount > 0)
                            <span class="text-red-600 dark:text-red-400">Rp {{ number_format($borrowing->fine_amount, 0, ',', '.') }}</span>
                        @else
                            <span class="text-green-600 dark:text-green-400">-</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex gap-2 justify-center">
                            <a href="{{ route('borrowings.show', $borrowing->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm font-semibold transition">
                                Lihat
                            </a>
                            @if ($borrowing->status !== 'returned')
                            <form action="{{ route('borrowings.return', $borrowing->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm font-semibold transition">
                                    Kembalikan
                                </button>
                            </form>
                            @endif
                            <form action="{{ route('borrowings.destroy', $borrowing->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm font-semibold transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="px-6 py-4 bg-slate-50 dark:bg-slate-700 border-t border-slate-200 dark:border-slate-600">
            {{ $borrowings->links() }}
        </div>
        @else
        <div class="text-center py-12">
            <p class="text-slate-600 dark:text-slate-400 text-lg">Belum ada peminjaman. <a href="{{ route('borrowings.create') }}" class="text-blue-600 dark:text-blue-400 hover:underline font-semibold">Buat peminjaman baru</a></p>
        </div>
        @endif
    </div>
@endsection
