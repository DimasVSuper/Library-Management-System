@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="w-full max-w-5xl mx-auto px-4">
    <!-- Back to Home Link -->
    <a href="{{ url('/') }}" class="inline-flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 mb-6 transition">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Kembali ke Beranda
    </a>

    <div class="flex flex-col lg:flex-row rounded-2xl shadow-2xl overflow-hidden">
        <!-- Left Side - Branding -->
        <div class="lg:w-5/12 bg-gradient-to-br from-blue-500 via-blue-600 to-purple-600 p-8 lg:p-12 flex flex-col justify-center items-center text-white">
            <div class="text-center">
                <svg class="w-20 h-20 mx-auto mb-6 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <h2 class="text-3xl lg:text-4xl font-bold mb-4">Selamat Datang!</h2>
                <p class="text-blue-100 text-lg mb-6">Masuk ke akun Anda untuk mengakses sistem manajemen perpustakaan.</p>
                <div class="hidden lg:block">
                    <div class="bg-white/10 backdrop-blur rounded-xl p-4 mt-6">
                        <p class="text-sm text-blue-100">"Perpustakaan adalah tempat di mana semua mimpi dimulai."</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="lg:w-7/12 bg-white dark:bg-gray-800 p-8 lg:p-12">
            <div class="max-w-md mx-auto">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Masuk</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-8">Masukkan kredensial Anda untuk melanjutkan</p>
                
                <!-- Error Messages -->
                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-400 rounded-lg">
                        <ul class="list-disc list-inside text-sm">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    
                    <!-- Email -->
                    <div class="mb-5">
                        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300" for="email">
                            Email
                        </label>
                        <input
                            class="w-full px-4 py-3 text-gray-700 dark:text-white bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            id="email"
                            name="email"
                            type="email"
                            placeholder="nama@email.com"
                            value="{{ old('email') }}"
                            required
                            autofocus
                        />
                    </div>

                    <!-- Password -->
                    <div class="mb-5">
                        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300" for="password">
                            Kata Sandi
                        </label>
                        <input
                            class="w-full px-4 py-3 text-gray-700 dark:text-white bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            id="password"
                            name="password"
                            type="password"
                            placeholder="••••••••"
                            required
                        />
                    </div>

                    <!-- Remember Me -->
                    <div class="mb-6 flex items-center justify-between">
                        <label class="flex items-center">
                            <input
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                id="remember"
                                name="remember"
                                type="checkbox"
                            />
                            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Ingat saya</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button
                        class="w-full px-4 py-3 font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200"
                        type="submit"
                    >
                        Masuk
                    </button>
                </form>

                <!-- Register Link -->
                <div class="mt-8 text-center">
                    <p class="text-gray-600 dark:text-gray-400">
                        Belum punya akun?
                        <a class="text-blue-600 hover:text-blue-700 font-semibold ml-1" href="{{ route('register') }}">
                            Daftar sekarang
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection