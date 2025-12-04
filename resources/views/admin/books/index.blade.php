@extends('layouts.admin')

@section('title', 'Manajemen Buku')

@section('content')
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Manajemen Buku</h1>
            <p class="text-slate-600 dark:text-slate-400 mt-1">Kelola koleksi buku perpustakaan Anda</p>
        </div>
        <a href="{{ route('books.create') }}" class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-3 rounded-lg font-semibold transition duration-300 transform hover:scale-105">
            + Tambah Buku
        </a>
    </div>

    <!-- Alert Messages -->
    @if ($message = Session::get('success'))
    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg dark:bg-green-900 dark:border-green-700 dark:text-green-200">
        {{ $message }}
    </div>
    @endif

    <!-- Search and Filter -->
    <div class="mb-6 bg-white dark:bg-slate-800 rounded-lg shadow-md p-6">
        <form method="GET" action="{{ route('books.index') }}" class="flex gap-3">
            <input 
                type="text" 
                name="search" 
                placeholder="Cari judul atau pengarang..." 
                class="flex-1 px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold transition duration-300">
                Cari
            </button>
        </form>
    </div>

    <!-- Books Table -->
    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md overflow-hidden">
        @if ($books->count() > 0)
        <table class="w-full">
            <thead>
                <tr class="bg-gradient-to-r from-blue-600 to-purple-600 text-white">
                    <th class="px-6 py-4 text-left font-semibold">Judul</th>
                    <th class="px-6 py-4 text-left font-semibold">Pengarang</th>
                    <th class="px-6 py-4 text-left font-semibold">ISBN</th>
                    <th class="px-6 py-4 text-left font-semibold">Kategori</th>
                    <th class="px-6 py-4 text-center font-semibold">Stok</th>
                    <th class="px-6 py-4 text-center font-semibold">Tersedia</th>
                    <th class="px-6 py-4 text-center font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr class="border-b border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                    <td class="px-6 py-4 text-slate-900 dark:text-white font-medium">
                        <a href="{{ route('books.show', $book->id) }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                            {{ $book->title }}
                        </a>
                    </td>
                    <td class="px-6 py-4 text-slate-700 dark:text-slate-300">{{ $book->author }}</td>
                    <td class="px-6 py-4 text-slate-700 dark:text-slate-300 font-mono text-sm">{{ $book->isbn }}</td>
                    <td class="px-6 py-4 text-slate-700 dark:text-slate-300">
                        <span class="inline-block bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-3 py-1 rounded-full text-sm">
                            {{ $book->category }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center text-slate-700 dark:text-slate-300">
                        <span class="font-semibold">{{ $book->stock }}</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-block font-semibold {{ $book->available_stock > 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                            {{ $book->available_stock }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex gap-2 justify-center">
                            <a href="{{ route('books.edit', $book->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm font-semibold transition">
                                Edit
                            </a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" class="inline">
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
            {{ $books->links() }}
        </div>
        @else
        <div class="text-center py-12">
            <p class="text-slate-600 dark:text-slate-400 text-lg">Belum ada buku. <a href="{{ route('books.create') }}" class="text-blue-600 dark:text-blue-400 hover:underline font-semibold">Tambah buku sekarang</a></p>
        </div>
        @endif
    </div>
@endsection
