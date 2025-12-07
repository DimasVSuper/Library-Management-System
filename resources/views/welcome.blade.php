@extends('layouts.landing')

@section('title', 'Library Management System')
@section('hide_header', true)

@section('content')
    <!-- Hero Section -->
    <div class="relative isolate px-6 lg:px-8 min-h-screen flex items-center justify-center">
        <!-- Background Decorations -->
        <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>

        <div class="mx-auto max-w-4xl py-32 sm:py-48 lg:py-56">
            <!-- Announcement Badge -->
            <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                <div class="relative rounded-full px-4 py-2 text-sm leading-6 text-gray-300 ring-1 ring-white/10 hover:ring-white/20 backdrop-blur-sm bg-white/5 transition-all duration-300">
                    🎉 Sistem Manajemen Perpustakaan Modern 
                    <a href="#features" class="font-semibold text-indigo-400 hover:text-indigo-300 ml-1">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        Jelajahi fitur <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </div>

            <!-- Main Hero Content -->
            <div class="text-center">
                <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl lg:text-7xl">
                    <span class="block">Kelola</span>
                    <span class="block bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 bg-clip-text text-transparent">
                        Perpustakaan
                    </span>
                    <span class="block">dengan Mudah</span>
                </h1>
                
                <p class="mt-6 text-lg leading-8 text-gray-300 max-w-3xl mx-auto sm:text-xl">
                    Sistem manajemen perpustakaan modern dengan antarmuka yang intuitif. 
                    Kelola buku, anggota, dan transaksi peminjaman dengan efisien menggunakan teknologi Laravel terdepan.
                </p>
                
                <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-x-6">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="w-full sm:w-auto rounded-xl bg-gradient-to-r from-indigo-500 to-purple-600 px-8 py-4 text-base font-semibold text-white shadow-xl hover:from-indigo-600 hover:to-purple-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-200 transform hover:scale-105">
                                Buka Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="w-full sm:w-auto rounded-xl bg-gradient-to-r from-indigo-500 to-purple-600 px-8 py-4 text-base font-semibold text-white shadow-xl hover:from-indigo-600 hover:to-purple-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 transition-all duration-200 transform hover:scale-105">
                                Mulai Sekarang
                            </a>
                            
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="w-full sm:w-auto rounded-xl border border-white/20 bg-white/5 backdrop-blur-sm px-8 py-4 text-base font-semibold text-white hover:bg-white/10 transition-all duration-200">
                                    Daftar Gratis
                                </a>
                            @endif
                        @endauth
                    @endif
                    
                    <a href="#features" class="text-base font-semibold leading-6 text-gray-300 hover:text-white transition-colors flex items-center gap-2">
                        Pelajari lebih lanjut
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div aria-hidden="true" class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
    </div>

    @include('layouts.feature')

    @include('layouts.technology')
@endsection
