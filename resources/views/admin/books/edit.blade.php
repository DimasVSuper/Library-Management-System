@extends('main')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 dark:from-slate-900 dark:to-slate-800 py-8 px-4">
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('books.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm font-semibold mb-4 inline-block">
                ← Kembali ke Daftar Buku
            </a>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Edit Buku</h1>
            <p class="text-slate-600 dark:text-slate-400 mt-1">Perbarui informasi buku</p>
        </div>

        <!-- Form -->
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md p-8">
            <form action="{{ route('books.update', $book->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div>
                    <label class="block text-slate-700 dark:text-slate-300 font-semibold mb-2">Judul <span class="text-red-600">*</span></label>
                    <input 
                        type="text" 
                        name="title" 
                        value="{{ old('title', $book->title) }}"
                        placeholder="Masukkan judul buku"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    />
                    @error('title')
                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Author -->
                <div>
                    <label class="block text-slate-700 dark:text-slate-300 font-semibold mb-2">Pengarang <span class="text-red-600">*</span></label>
                    <input 
                        type="text" 
                        name="author" 
                        value="{{ old('author', $book->author) }}"
                        placeholder="Nama pengarang"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    />
                    @error('author')
                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- ISBN -->
                <div>
                    <label class="block text-slate-700 dark:text-slate-300 font-semibold mb-2">ISBN <span class="text-red-600">*</span></label>
                    <input 
                        type="text" 
                        name="isbn" 
                        value="{{ old('isbn', $book->isbn) }}"
                        placeholder="13-digit ISBN"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    />
                    @error('isbn')
                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-slate-700 dark:text-slate-300 font-semibold mb-2">Kategori <span class="text-red-600">*</span></label>
                    <select 
                        name="category"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    >
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Fiksi" {{ old('category', $book->category) == 'Fiksi' ? 'selected' : '' }}>Fiksi</option>
                        <option value="Non-Fiksi" {{ old('category', $book->category) == 'Non-Fiksi' ? 'selected' : '' }}>Non-Fiksi</option>
                        <option value="Referensi" {{ old('category', $book->category) == 'Referensi' ? 'selected' : '' }}>Referensi</option>
                        <option value="Biografi" {{ old('category', $book->category) == 'Biografi' ? 'selected' : '' }}>Biografi</option>
                        <option value="Sains" {{ old('category', $book->category) == 'Sains' ? 'selected' : '' }}>Sains</option>
                        <option value="Teknologi" {{ old('category', $book->category) == 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                        <option value="Seni" {{ old('category', $book->category) == 'Seni' ? 'selected' : '' }}>Seni</option>
                        <option value="Olahraga" {{ old('category', $book->category) == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                    </select>
                    @error('category')
                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-slate-700 dark:text-slate-300 font-semibold mb-2">Deskripsi</label>
                    <textarea 
                        name="description" 
                        rows="4"
                        placeholder="Deskripsi singkat tentang buku"
                        class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                    >{{ old('description', $book->description) }}</textarea>
                    @error('description')
                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <!-- Year -->
                    <div>
                        <label class="block text-slate-700 dark:text-slate-300 font-semibold mb-2">Tahun Terbit</label>
                        <input 
                            type="number" 
                            name="year" 
                            value="{{ old('year', $book->year) }}"
                            placeholder="2024"
                            min="1900"
                            max="{{ date('Y') }}"
                            class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                        />
                        @error('year')
                        <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Publisher -->
                    <div>
                        <label class="block text-slate-700 dark:text-slate-300 font-semibold mb-2">Penerbit</label>
                        <input 
                            type="text" 
                            name="publisher" 
                            value="{{ old('publisher', $book->publisher) }}"
                            placeholder="Nama penerbit"
                            class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                        />
                        @error('publisher')
                        <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <!-- Stock -->
                    <div>
                        <label class="block text-slate-700 dark:text-slate-300 font-semibold mb-2">Stok <span class="text-red-600">*</span></label>
                        <input 
                            type="number" 
                            name="stock" 
                            value="{{ old('stock', $book->stock) }}"
                            min="0"
                            class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                        />
                        @error('stock')
                        <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label class="block text-slate-700 dark:text-slate-300 font-semibold mb-2">Harga</label>
                        <input 
                            type="number" 
                            name="price" 
                            value="{{ old('price', $book->price) }}"
                            placeholder="0"
                            min="0"
                            step="0.01"
                            class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg dark:bg-slate-700 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                        />
                        @error('price')
                        <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex gap-4 pt-6 border-t border-slate-200 dark:border-slate-700">
                    <button 
                        type="submit"
                        class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-3 rounded-lg font-semibold transition duration-300 transform hover:scale-105"
                    >
                        Perbarui Buku
                    </button>
                    <a 
                        href="{{ route('books.index') }}"
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
