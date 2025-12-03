@extends('main')

@section('content')
<div class="min-h-screen bg-linear-to-br from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 py-8 px-4">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('borrowing.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm font-semibold mb-4 inline-block">
                ← Kembali ke Daftar Peminjaman
            </a>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Edit Peminjaman</h1>
            <p class="text-slate-600 dark:text-slate-400 mt-2">{{ $borrowing->member->name }} - {{ $borrowing->book->title }}</p>
        </div>

        <!-- Form -->
        <form action="{{ route('borrowing.update', $borrowing->id) }}" method="POST" class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-8">
            @csrf
            @method('PUT')

            <!-- Borrow Date -->
            <div class="mb-6">
                <label for="borrow_date" class="block text-sm font-semibold text-slate-900 dark:text-white mb-2">
                    Tanggal Pinjam
                </label>
                <input 
                    type="date" 
                    id="borrow_date" 
                    name="borrow_date"
                    value="{{ old('borrow_date', $borrowing->borrow_date->format('Y-m-d')) }}"
                    class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
                @error('borrow_date')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Due Date -->
            <div class="mb-6">
                <label for="due_date" class="block text-sm font-semibold text-slate-900 dark:text-white mb-2">
                    Tanggal Kembali
                </label>
                <input 
                    type="date" 
                    id="due_date" 
                    name="due_date"
                    value="{{ old('due_date', $borrowing->due_date->format('Y-m-d')) }}"
                    class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
                @error('due_date')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Notes -->
            <div class="mb-8">
                <label for="notes" class="block text-sm font-semibold text-slate-900 dark:text-white mb-2">
                    Catatan
                </label>
                <textarea 
                    id="notes" 
                    name="notes"
                    rows="4"
                    class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                >{{ old('notes', $borrowing->notes) }}</textarea>
                @error('notes')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Info Box -->
            <div class="bg-blue-50 dark:bg-blue-900 border border-blue-200 dark:border-blue-700 rounded-lg p-4 mb-8">
                <p class="text-sm text-blue-900 dark:text-blue-200">
                    <span class="font-semibold">Member:</span> {{ $borrowing->member->name }} ({{ $borrowing->member->email }})<br>
                    <span class="font-semibold">Buku:</span> {{ $borrowing->book->title }} - {{ $borrowing->book->author }}<br>
                    <span class="font-semibold">Status:</span> 
                    @if ($borrowing->status === 'borrowed')
                        <span class="text-blue-600 dark:text-blue-300">Sedang Dipinjam</span>
                    @elseif ($borrowing->status === 'returned')
                        <span class="text-green-600 dark:text-green-300">Sudah Dikembalikan</span>
                    @else
                        <span class="text-red-600 dark:text-red-300">Terlambat</span>
                    @endif
                </p>
            </div>

            <!-- Buttons -->
            <div class="flex gap-4">
                <button 
                    type="submit" 
                    class="bg-linear-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-8 py-3 rounded-lg font-semibold transition duration-300"
                >
                    Simpan Perubahan
                </button>
                <a 
                    href="{{ route('borrowing.show', $borrowing->id) }}" 
                    class="bg-slate-300 dark:bg-slate-600 hover:bg-slate-400 dark:hover:bg-slate-700 text-slate-900 dark:text-white px-8 py-3 rounded-lg font-semibold transition duration-300 text-center"
                >
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
