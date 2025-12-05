@extends('layouts.admin')

@section('title', 'Detail Denda')

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('fines.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm font-semibold mb-4 inline-block">
                ← Kembali ke Daftar Denda
            </a>
        </div>

        <!-- Fine Details -->
        <div class="bg-white/70 dark:bg-gray-800/80 backdrop-blur-md border border-white/20 dark:border-gray-700/50 rounded-2xl shadow-lg overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-8">
                <!-- Left Section - Info -->
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">Informasi Denda #{{ $fine->id }}</h2>
                    
                    <div class="space-y-4">
                        <div>
                            <p class="text-sm text-slate-500 dark:text-slate-400">Anggota</p>
                            <p class="text-lg font-semibold text-slate-900 dark:text-white">{{ $fine->borrowing->member->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500 dark:text-slate-400">Buku</p>
                            <p class="text-lg font-semibold text-slate-900 dark:text-white">{{ $fine->borrowing->book->title }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500 dark:text-slate-400">Tanggal Peminjaman</p>
                            <p class="text-slate-900 dark:text-white">{{ $fine->borrowing->borrow_date->format('d F Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500 dark:text-slate-400">Tenggat Waktu</p>
                            <p class="text-slate-900 dark:text-white">{{ $fine->borrowing->due_date->format('d F Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-slate-500 dark:text-slate-400">Tanggal Pengembalian</p>
                            <p class="text-slate-900 dark:text-white">{{ $fine->borrowing->returned_date ? $fine->borrowing->returned_date->format('d F Y') : '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Right Section - Status & Payment -->
                <div class="bg-gray-50/50 dark:bg-gray-700/50 rounded-xl p-6 border border-gray-200 dark:border-gray-600">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-4">Status Pembayaran</h3>
                    
                    <div class="mb-6">
                        <p class="text-sm text-slate-500 dark:text-slate-400 mb-1">Total Denda</p>
                        <p class="text-3xl font-bold text-red-600 dark:text-red-400">Rp {{ number_format($fine->amount, 0, ',', '.') }}</p>
                        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Keterlambatan: {{ $fine->days_overdue }} hari</p>
                    </div>

                    <div class="mb-6">
                        <p class="text-sm text-slate-500 dark:text-slate-400 mb-2">Status</p>
                        @if($fine->status === 'paid')
                            <div class="flex items-center text-green-600 dark:text-green-400 bg-green-100/50 dark:bg-green-900/50 p-3 rounded-lg">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <div>
                                    <span class="font-bold block">Lunas</span>
                                    <span class="text-xs">Dibayar pada: {{ $fine->paid_at ? $fine->paid_at->format('d F Y H:i') : '-' }}</span>
                                </div>
                            </div>
                        @else
                            <div class="flex items-center text-red-600 dark:text-red-400 bg-red-100/50 dark:bg-red-900/50 p-3 rounded-lg">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="font-bold">Belum Lunas</span>
                            </div>
                        @endif
                    </div>

                    @if($fine->notes)
                    <div class="mb-6">
                        <p class="text-sm text-slate-500 dark:text-slate-400 mb-1">Catatan</p>
                        <p class="text-slate-700 dark:text-slate-300 italic">"{{ $fine->notes }}"</p>
                    </div>
                    @endif

                    @if($fine->status === 'unpaid')
                    <form action="{{ route('fines.pay', $fine->id) }}" method="POST" onsubmit="return confirm('Konfirmasi pembayaran denda?')">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-xl font-bold transition shadow-lg shadow-green-500/30">
                            Bayar Sekarang
                        </button>
                    </form>
                    @endif
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="border-t border-gray-200 dark:border-gray-700 px-8 py-6 bg-gray-50/50 dark:bg-gray-700/50 flex gap-4">
                <a href="{{ route('fines.edit', $fine->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-xl font-semibold transition shadow-sm">
                    Edit Data
                </a>
                <form action="{{ route('fines.destroy', $fine->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data denda ini?')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-xl font-semibold transition shadow-sm">
                        Hapus Data
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
