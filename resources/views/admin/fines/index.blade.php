@extends('layouts.admin')

@section('title', 'Manajemen Denda')

@section('content')
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Manajemen Denda</h1>
            <p class="text-slate-600 dark:text-slate-400 mt-1">Kelola denda keterlambatan pengembalian buku</p>
        </div>
    </div>

    <!-- Alert Messages -->
    @if ($message = Session::get('success'))
    <div class="mb-6 p-4 bg-green-100/80 border border-green-400/50 text-green-800 rounded-xl dark:bg-green-900/80 dark:border-green-700/50 dark:text-green-200 backdrop-blur-sm shadow-sm">
        {{ $message }}
    </div>
    @endif
    
    @if ($message = Session::get('error'))
    <div class="mb-6 p-4 bg-red-100/80 border border-red-400/50 text-red-800 rounded-xl dark:bg-red-900/80 dark:border-red-700/50 dark:text-red-200 backdrop-blur-sm shadow-sm">
        {{ $message }}
    </div>
    @endif

    <!-- Search and Filter -->
    <div class="mb-6 bg-white/70 dark:bg-gray-800/80 backdrop-blur-md border border-white/20 dark:border-gray-700/50 rounded-2xl shadow-lg p-6">
        <form method="GET" action="{{ route('fines.index') }}" class="flex gap-3">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}"
                placeholder="Cari nama anggota atau judul buku..." 
                class="flex-1 px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-xl dark:bg-slate-700/50 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all"
            />
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl font-semibold transition duration-300 shadow-md">
                Cari
            </button>
        </form>
    </div>

    <!-- Fines Table -->
    <div class="bg-white/70 dark:bg-gray-800/80 backdrop-blur-md border border-white/20 dark:border-gray-700/50 rounded-2xl shadow-lg overflow-hidden">
        @if ($fines->count() > 0)
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50/50 dark:bg-gray-700/50 text-gray-800 dark:text-white uppercase tracking-wider text-xs">
                    <th class="px-6 py-4 text-left font-semibold">ID</th>
                    <th class="px-6 py-4 text-left font-semibold">Anggota</th>
                    <th class="px-6 py-4 text-left font-semibold">Buku</th>
                    <th class="px-6 py-4 text-center font-semibold">Jumlah Denda</th>
                    <th class="px-6 py-4 text-center font-semibold">Status</th>
                    <th class="px-6 py-4 text-center font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($fines as $fine)
                <tr class="hover:bg-blue-50/50 dark:hover:bg-gray-700/50 transition-colors duration-200">
                    <td class="px-6 py-4 text-slate-900 dark:text-white font-medium">
                        #{{ $fine->id }}
                    </td>
                    <td class="px-6 py-4 text-slate-700 dark:text-slate-300">
                        {{ $fine->borrowing->member->name }}
                    </td>
                    <td class="px-6 py-4 text-slate-700 dark:text-slate-300">
                        {{ $fine->borrowing->book->title }}
                    </td>
                    <td class="px-6 py-4 text-center text-slate-700 dark:text-slate-300 font-semibold">
                        Rp {{ number_format($fine->amount, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($fine->status === 'paid')
                            <span class="inline-block bg-green-100/80 dark:bg-green-900/80 text-green-800 dark:text-green-200 px-3 py-1 rounded-full text-xs font-semibold">
                                Lunas
                            </span>
                        @else
                            <span class="inline-block bg-red-100/80 dark:bg-red-900/80 text-red-800 dark:text-red-200 px-3 py-1 rounded-full text-xs font-semibold">
                                Belum Lunas
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex gap-2 justify-center">
                            @if($fine->status === 'unpaid')
                            <form action="{{ route('fines.pay', $fine->id) }}" method="POST" onsubmit="return confirm('Konfirmasi pembayaran denda?')" class="inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-lg text-xs font-semibold transition shadow-sm">
                                    Bayar
                                </button>
                            </form>
                            @endif
                            <a href="{{ route('fines.show', $fine->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-lg text-xs font-semibold transition shadow-sm">
                                Detail
                            </a>
                            <a href="{{ route('fines.edit', $fine->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg text-xs font-semibold transition shadow-sm">
                                Edit
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="px-6 py-4 bg-gray-50/50 dark:bg-gray-700/50 border-t border-gray-200 dark:border-gray-700">
            {{ $fines->links() }}
        </div>
        @else
        <div class="text-center py-12">
            <p class="text-slate-600 dark:text-slate-400 text-lg">Belum ada data denda.</p>
        </div>
        @endif
    </div>
@endsection
