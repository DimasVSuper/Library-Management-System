@extends('layouts.admin')

@section('title', 'Edit Member')

@section('content')
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('members.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm font-semibold mb-4 inline-block">
                ← Kembali ke Daftar Member
            </a>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Edit Member</h1>
            <p class="text-slate-600 dark:text-slate-400 mt-1">Perbarui informasi member</p>
        </div>

        <!-- Form -->
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-8">
            <form action="{{ route('members.update', $member->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <label class="block text-slate-700 dark:text-slate-300 font-semibold mb-2">Nama <span class="text-red-600">*</span></label>
                    <input 
                        type="text" 
                        name="name" 
                        value="{{ old('name', $member->name) }}"
                        placeholder="Nama lengkap member"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    />
                    @error('name')
                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-slate-700 dark:text-slate-300 font-semibold mb-2">Email <span class="text-red-600">*</span></label>
                    <input 
                        type="email" 
                        name="email" 
                        value="{{ old('email', $member->email) }}"
                        placeholder="Email member"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    />
                    @error('email')
                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label class="block text-slate-700 dark:text-slate-300 font-semibold mb-2">Telepon</label>
                    <input 
                        type="text" 
                        name="phone" 
                        value="{{ old('phone', $member->phone) }}"
                        placeholder="Nomor telepon"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    />
                    @error('phone')
                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address -->
                <div>
                    <label class="block text-slate-700 dark:text-slate-300 font-semibold mb-2">Alamat</label>
                    <input 
                        type="text" 
                        name="address" 
                        value="{{ old('address', $member->address) }}"
                        placeholder="Alamat lengkap"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    />
                    @error('address')
                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- City -->
                <div>
                    <label class="block text-slate-700 dark:text-slate-300 font-semibold mb-2">Kota</label>
                    <input 
                        type="text" 
                        name="city" 
                        value="{{ old('city', $member->city) }}"
                        placeholder="Nama kota"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    />
                    @error('city')
                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-slate-700 dark:text-slate-300 font-semibold mb-2">Status <span class="text-red-600">*</span></label>
                    <select 
                        name="status"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    >
                        <option value="">-- Pilih Status --</option>
                        <option value="active" {{ old('status', $member->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                        <option value="inactive" {{ old('status', $member->status) == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                        <option value="suspended" {{ old('status', $member->status) == 'suspended' ? 'selected' : '' }}>Blokir</option>
                    </select>
                    @error('status')
                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes -->
                <div>
                    <label class="block text-slate-700 dark:text-slate-300 font-semibold mb-2">Catatan</label>
                    <textarea 
                        name="notes" 
                        rows="4"
                        placeholder="Catatan tambahan tentang member"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    >{{ old('notes', $member->notes) }}</textarea>
                    @error('notes')
                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex gap-4 pt-6 border-t border-slate-200 dark:border-slate-700">
                    <button 
                        type="submit"
                        class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-3 rounded-lg font-semibold transition duration-300 transform hover:scale-105"
                    >
                        Perbarui Member
                    </button>
                    <a 
                        href="{{ route('members.index') }}"
                        class="bg-slate-300 dark:bg-slate-600 hover:bg-slate-400 dark:hover:bg-slate-500 text-slate-800 dark:text-white px-6 py-3 rounded-lg font-semibold transition duration-300"
                    >
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
