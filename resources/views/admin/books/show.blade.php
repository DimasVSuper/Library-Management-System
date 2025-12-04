@extends('layouts.admin')

@section('title', 'Detail Buku')

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('books.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm font-semibold mb-4 inline-block">
                ← Kembali ke Daftar Buku
            </a>
        </div>

        <!-- Book Details -->
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 p-8">
                <!-- Left Section - Book Info -->
                <div class="md:col-span-2">
                    <h1 class="text-4xl font-bold text-slate-900 dark:text-white mb-2">{{ $book->title }}</h1>
                    <p class="text-lg text-slate-600 dark:text-slate-400 mb-6">oleh <span class="font-semibold text-slate-800 dark:text-slate-200">{{ $book->author }}</span></p>

                    <!-- Category Badge -->
                    <div class="mb-6">
                        <span class="inline-block bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-4 py-2 rounded-full font-semibold">
                            {{ $book->category }}
                        </span>
                    </div>

                    <!-- Details Grid -->
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between border-b border-slate-200 dark:border-slate-700 pb-3">
                            <span class="text-slate-600 dark:text-slate-400 font-semibold">ISBN:</span>
                            <span class="text-slate-900 dark:text-white font-mono">{{ $book->isbn }}</span>
                        </div>

                        @if ($book->publisher)
                        <div class="flex justify-between border-b border-slate-200 dark:border-slate-700 pb-3">
                            <span class="text-slate-600 dark:text-slate-400 font-semibold">Penerbit:</span>
                            <span class="text-slate-900 dark:text-white">{{ $book->publisher }}</span>
                        </div>
                        @endif

                        @if ($book->year)
                        <div class="flex justify-between border-b border-slate-200 dark:border-slate-700 pb-3">
                            <span class="text-slate-600 dark:text-slate-400 font-semibold">Tahun Terbit:</span>
                            <span class="text-slate-900 dark:text-white">{{ $book->year }}</span>
                        </div>
                        @endif

                        @if ($book->price)
                        <div class="flex justify-between border-b border-slate-200 dark:border-slate-700 pb-3">
                            <span class="text-slate-600 dark:text-slate-400 font-semibold">Harga:</span>
                            <span class="text-slate-900 dark:text-white font-semibold">Rp {{ number_format($book->price, 0, ',', '.') }}</span>
                        </div>
                        @endif
                    </div>

                    <!-- Description -->
                    @if ($book->description)
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-3">Deskripsi</h3>
                        <p class="text-slate-700 dark:text-slate-300 leading-relaxed">{{ $book->description }}</p>
                    </div>
                    @endif
                </div>

                <!-- Right Section - Stock Info -->
                <div>
                    <div class="bg-gradient-to-br from-blue-50 to-purple-50 dark:from-blue-900 dark:to-purple-900 rounded-lg p-6">
                        <!-- Stock Status -->
                        <div class="mb-6">
                            <p class="text-slate-600 dark:text-slate-400 text-sm font-semibold mb-2">STATUS STOK</p>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-3xl font-bold text-slate-900 dark:text-white">{{ $book->available_stock }}</p>
                                    <p class="text-sm text-slate-600 dark:text-slate-400">Tersedia</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-2xl font-bold text-slate-600 dark:text-slate-300">{{ $book->stock }}</p>
                                    <p class="text-sm text-slate-600 dark:text-slate-400">Total Stok</p>
                                </div>
                            </div>
                        </div>

                        <!-- Stock Indicator -->
                        <div class="mb-6">
                            @if ($book->available_stock > 0)
                            <div class="w-full bg-slate-300 dark:bg-slate-600 rounded-full h-3 overflow-hidden">
                                <div class="bg-gradient-to-r from-green-500 to-emerald-500 h-full" style="width: {{ ($book->available_stock / $book->stock * 100) }}%"></div>
                            </div>
                            <p class="text-green-600 dark:text-green-400 text-sm font-semibold mt-2">Buku tersedia untuk dipinjam</p>
                            @else
                            <div class="w-full bg-slate-300 dark:bg-slate-600 rounded-full h-3 overflow-hidden">
                                <div class="bg-gradient-to-r from-red-500 to-pink-500 h-full" style="width: 100%"></div>
                            </div>
                            <p class="text-red-600 dark:text-red-400 text-sm font-semibold mt-2">Sedang tidak tersedia</p>
                            @endif
                        </div>

                        <!-- Borrowed Count -->
                        <div class="bg-white dark:bg-slate-700 rounded p-3 text-center">
                            <p class="text-slate-600 dark:text-slate-400 text-sm mb-1">Sedang Dipinjam</p>
                            <p class="text-2xl font-bold text-slate-900 dark:text-white">{{ $book->stock - $book->available_stock }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="border-t border-slate-200 dark:border-slate-700 px-8 py-6 bg-slate-50 dark:bg-slate-700 flex gap-4">
                <a 
                    href="{{ route('books.edit', $book->id) }}"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg font-semibold transition duration-300"
                >
                    Edit Buku
                </a>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button 
                        type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-semibold transition duration-300"
                    >
                        Hapus Buku
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
