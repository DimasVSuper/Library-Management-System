@extends('main')

@section('content')
<div class="min-h-screen bg-linear-to-br from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 py-8 px-4">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('borrowing.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm font-semibold mb-4 inline-block">
                ← Kembali ke Daftar Peminjaman
            </a>
        </div>

        <!-- Borrowing Details -->
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 p-8">
                <!-- Left Section - Borrowing Info -->
                <div class="md:col-span-2">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">{{ $borrowing->book->title }}</h2>
                        <p class="text-lg text-slate-600 dark:text-slate-400">Dipinjam oleh: <span class="font-semibold text-slate-800 dark:text-slate-200">{{ $borrowing->member->name }}</span></p>
                    </div>

                    <!-- Status Badge -->
                    <div class="mb-6">
                        @if ($borrowing->status === 'borrowed')
                            <span class="inline-block bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-4 py-2 rounded-full font-semibold">Sedang Dipinjam</span>
                        @elseif ($borrowing->status === 'returned')
                            <span class="inline-block bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 px-4 py-2 rounded-full font-semibold">Sudah Dikembalikan</span>
                        @else
                            <span class="inline-block bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 px-4 py-2 rounded-full font-semibold">Terlambat</span>
                        @endif
                    </div>

                    <!-- Details Grid -->
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between border-b border-slate-200 dark:border-slate-700 pb-3">
                            <span class="text-slate-600 dark:text-slate-400 font-semibold">Pengarang:</span>
                            <span class="text-slate-900 dark:text-white">{{ $borrowing->book->author }}</span>
                        </div>

                        <div class="flex justify-between border-b border-slate-200 dark:border-slate-700 pb-3">
                            <span class="text-slate-600 dark:text-slate-400 font-semibold">Tanggal Pinjam:</span>
                            <span class="text-slate-900 dark:text-white">{{ $borrowing->borrow_date->format('d M Y') }}</span>
                        </div>

                        <div class="flex justify-between border-b border-slate-200 dark:border-slate-700 pb-3">
                            <span class="text-slate-600 dark:text-slate-400 font-semibold">Tanggal Kembali:</span>
                            <span class="text-slate-900 dark:text-white">{{ $borrowing->due_date->format('d M Y') }}</span>
                        </div>

                        @if ($borrowing->returned_date)
                        <div class="flex justify-between border-b border-slate-200 dark:border-slate-700 pb-3">
                            <span class="text-slate-600 dark:text-slate-400 font-semibold">Tanggal Dikembalikan:</span>
                            <span class="text-slate-900 dark:text-white">{{ $borrowing->returned_date->format('d M Y') }}</span>
                        </div>
                        @endif

                        <div class="flex justify-between border-b border-slate-200 dark:border-slate-700 pb-3">
                            <span class="text-slate-600 dark:text-slate-400 font-semibold">Email Member:</span>
                            <span class="text-slate-900 dark:text-white">{{ $borrowing->member->email }}</span>
                        </div>
                    </div>

                    <!-- Notes -->
                    @if ($borrowing->notes)
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-3">Catatan</h3>
                        <p class="text-slate-700 dark:text-slate-300 leading-relaxed">{{ $borrowing->notes }}</p>
                    </div>
                    @endif
                </div>

                <!-- Right Section - Fine & Status -->
                <div>
                    <div class="bg-linear-to-br from-blue-50 to-purple-50 dark:from-blue-900 dark:to-purple-900 rounded-lg p-6">
                        <!-- Fine Status -->
                        <div class="mb-6">
                            <p class="text-slate-600 dark:text-slate-400 text-sm font-semibold mb-2">DENDA</p>
                            @if ($borrowing->fine_amount > 0)
                                <p class="text-4xl font-bold text-red-600 dark:text-red-400">Rp {{ number_format($borrowing->fine_amount, 0, ',', '.') }}</p>
                                <p class="text-sm text-slate-600 dark:text-slate-400 mt-2">Terlambat {{ \Carbon\Carbon::parse($borrowing->due_date)->diffInDays(now()) }} hari</p>
                            @else
                                <p class="text-4xl font-bold text-green-600 dark:text-green-400">Rp 0</p>
                                <p class="text-sm text-slate-600 dark:text-slate-400 mt-2">Tidak ada denda</p>
                            @endif
                        </div>

                        <!-- Borrowing Duration -->
                        <div class="bg-white dark:bg-slate-700 rounded p-4">
                            <p class="text-slate-600 dark:text-slate-400 text-sm mb-2 font-semibold">DURASI PEMINJAMAN</p>
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-sm">Mulai:</span>
                                    <span class="font-semibold">{{ $borrowing->borrow_date->format('d M') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-sm">Berakhir:</span>
                                    <span class="font-semibold">{{ $borrowing->due_date->format('d M Y') }}</span>
                                </div>
                                <hr class="border-slate-200 dark:border-slate-600 my-2">
                                <div class="flex justify-between">
                                    <span class="text-sm">Total Hari:</span>
                                    <span class="font-bold">{{ $borrowing->borrow_date->diffInDays($borrowing->due_date) }} hari</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="border-t border-slate-200 dark:border-slate-700 px-8 py-6 bg-slate-50 dark:bg-slate-700 flex gap-4">
                @if ($borrowing->status !== 'returned')
                <form action="{{ route('borrowing.return', $borrowing->id) }}" method="POST" class="inline">
                    @csrf
                    @method('PUT')
                    <button 
                        type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg font-semibold transition duration-300"
                    >
                        Kembalikan Buku
                    </button>
                </form>
                @endif
                <form action="{{ route('borrowing.destroy', $borrowing->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button 
                        type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-semibold transition duration-300"
                    >
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
