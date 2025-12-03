@extends('main')

@section('content')
<div class="min-h-screen bg-linear-to-br from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 py-8 px-4">
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('borrowing.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm font-semibold mb-4 inline-block">
                ← Kembali ke Daftar Peminjaman
            </a>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Pinjam Buku Baru</h1>
            <p class="text-slate-600 dark:text-slate-400 mt-1">Ciptakan transaksi peminjaman buku baru</p>
        </div>

        <!-- Alert Messages -->
        @if ($message = Session::get('error'))
        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg dark:bg-red-900 dark:border-red-700 dark:text-red-200">
            {{ $message }}
        </div>
        @endif

        <!-- Form -->
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-8">
            <form action="{{ route('borrowing.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Member -->
                <div>
                    <label class="block text-slate-700 dark:text-slate-300 font-semibold mb-2">Member <span class="text-red-600">*</span></label>
                    <select 
                        name="member_id"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    >
                        <option value="">-- Pilih Member --</option>
                        @foreach ($members as $member)
                        <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                            {{ $member->name }} ({{ $member->email }})
                        </option>
                        @endforeach
                    </select>
                    @error('member_id')
                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Book -->
                <div>
                    <label class="block text-slate-700 dark:text-slate-300 font-semibold mb-2">Buku <span class="text-red-600">*</span></label>
                    <select 
                        name="book_id"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    >
                        <option value="">-- Pilih Buku --</option>
                        @foreach ($books as $book)
                        <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                            {{ $book->title }} (Stok: {{ $book->available_stock }})
                        </option>
                        @endforeach
                    </select>
                    @error('book_id')
                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Borrow Date -->
                <div>
                    <label class="block text-slate-700 dark:text-slate-300 font-semibold mb-2">Tanggal Pinjam <span class="text-red-600">*</span></label>
                    <input 
                        type="date" 
                        name="borrow_date" 
                        value="{{ old('borrow_date', now()->format('Y-m-d')) }}"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    />
                    @error('borrow_date')
                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Due Date -->
                <div>
                    <label class="block text-slate-700 dark:text-slate-300 font-semibold mb-2">Tanggal Kembali <span class="text-red-600">*</span></label>
                    <input 
                        type="date" 
                        name="due_date" 
                        value="{{ old('due_date', now()->addDays(7)->format('Y-m-d')) }}"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    />
                    @error('due_date')
                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes -->
                <div>
                    <label class="block text-slate-700 dark:text-slate-300 font-semibold mb-2">Catatan</label>
                    <textarea 
                        name="notes" 
                        rows="4"
                        placeholder="Catatan tambahan tentang peminjaman"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    >{{ old('notes') }}</textarea>
                    @error('notes')
                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex gap-4 pt-6 border-t border-slate-200 dark:border-slate-700">
                    <button 
                        type="submit"
                        class="bg-linear-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-3 rounded-lg font-semibold transition duration-300 transform hover:scale-105"
                    >
                        Simpan Peminjaman
                    </button>
                    <a 
                        href="{{ route('borrowing.index') }}"
                        class="bg-slate-300 dark:bg-slate-600 hover:bg-slate-400 dark:hover:bg-slate-500 text-slate-800 dark:text-white px-6 py-3 rounded-lg font-semibold transition duration-300"
                    >
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
