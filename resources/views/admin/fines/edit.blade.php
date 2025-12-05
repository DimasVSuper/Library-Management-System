@extends('layouts.admin')

@section('title', 'Edit Denda')

@section('content')
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('fines.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm font-semibold mb-4 inline-block">
                ← Kembali ke Daftar Denda
            </a>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Edit Data Denda</h1>
        </div>

        <!-- Form -->
        <div class="bg-white/70 dark:bg-gray-800/80 backdrop-blur-md border border-white/20 dark:border-gray-700/50 rounded-2xl shadow-lg p-8">
            <form action="{{ route('fines.update', $fine->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Info Readonly -->
                <div class="grid grid-cols-2 gap-4 mb-6 p-4 bg-blue-50/50 dark:bg-blue-900/20 rounded-xl border border-blue-100 dark:border-blue-800">
                    <div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 uppercase">Anggota</p>
                        <p class="font-semibold text-slate-900 dark:text-white">{{ $fine->borrowing->member->name }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 uppercase">Buku</p>
                        <p class="font-semibold text-slate-900 dark:text-white">{{ $fine->borrowing->book->title }}</p>
                    </div>
                </div>

                <!-- Amount -->
                <div>
                    <label for="amount" class="block text-sm font-semibold text-slate-900 dark:text-white mb-2">Jumlah Denda (Rp)</label>
                    <input 
                        type="number" 
                        name="amount" 
                        id="amount" 
                        value="{{ old('amount', $fine->amount) }}" 
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-xl dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all"
                        required
                    >
                    @error('amount')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-semibold text-slate-900 dark:text-white mb-2">Status Pembayaran</label>
                    <select 
                        name="status" 
                        id="status" 
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-xl dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all"
                    >
                        <option value="unpaid" {{ old('status', $fine->status) == 'unpaid' ? 'selected' : '' }}>Belum Lunas</option>
                        <option value="paid" {{ old('status', $fine->status) == 'paid' ? 'selected' : '' }}>Lunas</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes -->
                <div>
                    <label for="notes" class="block text-sm font-semibold text-slate-900 dark:text-white mb-2">Catatan</label>
                    <textarea 
                        name="notes" 
                        id="notes" 
                        rows="3" 
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-xl dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all"
                    >{{ old('notes', $fine->notes) }}</textarea>
                    @error('notes')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-bold transition shadow-lg shadow-blue-500/30">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('fines.index') }}" class="px-6 py-3 border border-slate-300 dark:border-slate-600 text-slate-700 dark:text-slate-300 rounded-xl font-semibold hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
