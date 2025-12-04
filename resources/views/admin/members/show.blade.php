@extends('layouts.admin')

@section('title', 'Detail Member')

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('members.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm font-semibold mb-4 inline-block">
                ← Kembali ke Daftar Member
            </a>
        </div>

        <!-- Member Details -->
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 p-8">
                <!-- Left Section - Member Info -->
                <div class="md:col-span-2">
                    <h1 class="text-4xl font-bold text-slate-900 dark:text-white mb-2">{{ $member->name }}</h1>
                    <p class="text-lg text-slate-600 dark:text-slate-400 mb-6">Member sejak <span class="font-semibold text-slate-800 dark:text-slate-200">{{ $member->join_date->format('d M Y') }}</span></p>

                    <!-- Status Badge -->
                    <div class="mb-6">
                        @if ($member->status === 'active')
                            <span class="inline-block bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 px-4 py-2 rounded-full font-semibold">Aktif</span>
                        @elseif ($member->status === 'inactive')
                            <span class="inline-block bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 px-4 py-2 rounded-full font-semibold">Nonaktif</span>
                        @else
                            <span class="inline-block bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 px-4 py-2 rounded-full font-semibold">Blokir</span>
                        @endif
                    </div>

                    <!-- Details Grid -->
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between border-b border-slate-200 dark:border-slate-700 pb-3">
                            <span class="text-slate-600 dark:text-slate-400 font-semibold">Email:</span>
                            <span class="text-slate-900 dark:text-white">{{ $member->email }}</span>
                        </div>

                        @if ($member->phone)
                        <div class="flex justify-between border-b border-slate-200 dark:border-slate-700 pb-3">
                            <span class="text-slate-600 dark:text-slate-400 font-semibold">Telepon:</span>
                            <span class="text-slate-900 dark:text-white">{{ $member->phone }}</span>
                        </div>
                        @endif

                        @if ($member->address)
                        <div class="flex justify-between border-b border-slate-200 dark:border-slate-700 pb-3">
                            <span class="text-slate-600 dark:text-slate-400 font-semibold">Alamat:</span>
                            <span class="text-slate-900 dark:text-white">{{ $member->address }}</span>
                        </div>
                        @endif

                        @if ($member->city)
                        <div class="flex justify-between border-b border-slate-200 dark:border-slate-700 pb-3">
                            <span class="text-slate-600 dark:text-slate-400 font-semibold">Kota:</span>
                            <span class="text-slate-900 dark:text-white">{{ $member->city }}</span>
                        </div>
                        @endif
                    </div>

                    <!-- Notes -->
                    @if ($member->notes)
                    <div class="mb-8">
                        <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-3">Catatan</h3>
                        <p class="text-slate-700 dark:text-slate-300 leading-relaxed">{{ $member->notes }}</p>
                    </div>
                    @endif
                </div>

                <!-- Right Section - Membership Info -->
                <div>
                    <div class="bg-gradient-to-br from-blue-50 to-purple-50 dark:from-blue-900 dark:to-purple-900 rounded-lg p-6">
                        <!-- Member Status -->
                        <div class="mb-6">
                            <p class="text-slate-600 dark:text-slate-400 text-sm font-semibold mb-2">STATUS KEANGGOTAAN</p>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-3xl font-bold text-slate-900 dark:text-white">{{ strtoupper($member->status[0]) }}</p>
                                    <p class="text-sm text-slate-600 dark:text-slate-400">{{ ucfirst($member->status) }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Member Info Card -->
                        <div class="bg-white dark:bg-slate-700 rounded p-4 space-y-3">
                            <div class="text-center">
                                <p class="text-slate-600 dark:text-slate-400 text-sm mb-1">Terdaftar Sejak</p>
                                <p class="text-lg font-bold text-slate-900 dark:text-white">{{ $member->join_date->format('d M Y') }}</p>
                            </div>
                            <hr class="border-slate-200 dark:border-slate-600">
                            <div class="text-center">
                                <p class="text-slate-600 dark:text-slate-400 text-sm mb-1">Member ID</p>
                                <p class="text-sm font-mono font-bold text-slate-900 dark:text-white">#{{ str_pad($member->id, 5, '0', STR_PAD_LEFT) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="border-t border-slate-200 dark:border-slate-700 px-8 py-6 bg-slate-50 dark:bg-slate-700 flex gap-4">
                <a 
                    href="{{ route('members.edit', $member->id) }}"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg font-semibold transition duration-300"
                >
                    Edit Member
                </a>
                <form action="{{ route('members.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus member ini?')" class="inline">
                    @csrf
                    @method('DELETE')
                    <button 
                        type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg font-semibold transition duration-300"
                    >
                        Hapus Member
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
