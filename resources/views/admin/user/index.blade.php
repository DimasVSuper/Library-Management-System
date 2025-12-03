@extends('main')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 py-8 px-4">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Manajemen Member</h1>
                <p class="text-slate-600 dark:text-slate-400 mt-1">Kelola data anggota perpustakaan</p>
            </div>
            <a href="{{ route('user.create') }}" class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-3 rounded-lg font-semibold transition duration-300 transform hover:scale-105">
                + Tambah Member
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
            <form method="GET" action="{{ route('user.index') }}" class="flex gap-3">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Cari nama atau email member..." 
                    class="flex-1 px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold transition duration-300">
                    Cari
                </button>
            </form>
        </div>

        <!-- Members Table -->
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md overflow-hidden">
            @if ($members->count() > 0)
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-blue-600 to-purple-600 text-white">
                        <th class="px-6 py-4 text-left font-semibold">Nama</th>
                        <th class="px-6 py-4 text-left font-semibold">Email</th>
                        <th class="px-6 py-4 text-left font-semibold">Telepon</th>
                        <th class="px-6 py-4 text-left font-semibold">Kota</th>
                        <th class="px-6 py-4 text-left font-semibold">Tanggal Daftar</th>
                        <th class="px-6 py-4 text-center font-semibold">Status</th>
                        <th class="px-6 py-4 text-center font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                    <tr class="border-b border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition">
                        <td class="px-6 py-4 text-slate-900 dark:text-white font-medium">
                            <a href="{{ route('user.show', $member->id) }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                                {{ $member->name }}
                            </a>
                        </td>
                        <td class="px-6 py-4 text-slate-700 dark:text-slate-300">{{ $member->email }}</td>
                        <td class="px-6 py-4 text-slate-700 dark:text-slate-300">{{ $member->phone ?? '-' }}</td>
                        <td class="px-6 py-4 text-slate-700 dark:text-slate-300">{{ $member->city ?? '-' }}</td>
                        <td class="px-6 py-4 text-slate-700 dark:text-slate-300 text-sm">
                            {{ $member->join_date->format('d M Y') }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if ($member->status === 'active')
                                <span class="inline-block bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 px-3 py-1 rounded-full text-sm font-semibold">Aktif</span>
                            @elseif ($member->status === 'inactive')
                                <span class="inline-block bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 px-3 py-1 rounded-full text-sm font-semibold">Nonaktif</span>
                            @else
                                <span class="inline-block bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 px-3 py-1 rounded-full text-sm font-semibold">Blokir</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex gap-2 justify-center">
                                <a href="{{ route('user.edit', $member->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm font-semibold transition">
                                    Edit
                                </a>
                                <form action="{{ route('user.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')" class="inline">
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
                {{ $members->links() }}
            </div>
            @else
            <div class="text-center py-12">
                <p class="text-slate-600 dark:text-slate-400 text-lg">Belum ada member. <a href="{{ route('user.create') }}" class="text-blue-600 dark:text-blue-400 hover:underline font-semibold">Tambah member sekarang</a></p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
