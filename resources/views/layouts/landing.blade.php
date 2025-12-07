<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Library Management System')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800,900" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }
        .glass-card:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 text-white antialiased selection:bg-indigo-500 selection:text-white">
    <!-- Background Pattern -->
    <div class="fixed inset-0 z-[-2]">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/10 via-purple-500/5 to-pink-500/10"></div>
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, rgba(139, 92, 246, 0.1) 0%, transparent 50%), radial-gradient(circle at 75% 75%, rgba(236, 72, 153, 0.1) 0%, transparent 50%)"></div>
    </div>

    <!-- Header -->
    @unless(View::hasSection('hide_header'))
    <header class="absolute inset-x-0 top-0 z-50">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="{{ url('/') }}" class="-m-1.5 p-1.5">
                    <span class="sr-only">Library Management System</span>
                    <div class="flex items-center space-x-2">
                        <div class="bg-gradient-to-br from-indigo-500 to-purple-600 p-2 rounded-xl">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <span class="text-xl font-bold bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">LibSys</span>
                    </div>
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="flex lg:hidden">
                <button type="button" id="mobile-menu-btn" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-200 hover:text-white transition-colors">
                    <span class="sr-only">Buka menu utama</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex lg:gap-x-8">
                <a href="{{ url('/') }}#features" class="text-sm font-semibold leading-6 text-gray-200 hover:text-white transition-colors">Fitur</a>
                <a href="{{ url('/') }}#about" class="text-sm font-semibold leading-6 text-gray-200 hover:text-white transition-colors">Tentang</a>
                <a href="{{ url('/') }}#contact" class="text-sm font-semibold leading-6 text-gray-200 hover:text-white transition-colors">Kontak</a>
            </div>

            <div class="hidden lg:flex lg:flex-1 lg:justify-end lg:gap-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm font-semibold leading-6 text-gray-200 hover:text-white transition-colors">
                            Dashboard <span aria-hidden="true">&rarr;</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-200 hover:text-white transition-colors">Masuk</a>
                        
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="rounded-lg bg-gradient-to-r from-indigo-500 to-purple-600 px-4 py-2 text-sm font-semibold text-white shadow-lg hover:from-indigo-600 hover:to-purple-700 transition-all duration-200">
                                Daftar
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="lg:hidden hidden">
            <div class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm"></div>
            <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-slate-900/95 backdrop-blur-xl px-6 py-6 sm:max-w-sm border-l border-white/10">
                <div class="flex items-center justify-between">
                    <a href="{{ url('/') }}" class="-m-1.5 p-1.5">
                        <span class="sr-only">Library Management System</span>
                        <div class="flex items-center space-x-2">
                            <div class="bg-gradient-to-br from-indigo-500 to-purple-600 p-2 rounded-xl">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <span class="text-lg font-bold text-white">LibSys</span>
                        </div>
                    </a>
                    <button type="button" id="mobile-menu-close" class="-m-2.5 rounded-md p-2.5 text-gray-200 hover:text-white">
                        <span class="sr-only">Tutup menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-white/10">
                        <div class="space-y-2 py-6">
                            <a href="{{ url('/') }}#features" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-200 hover:text-white hover:bg-white/5">Fitur</a>
                            <a href="{{ url('/') }}#about" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-200 hover:text-white hover:bg-white/5">Tentang</a>
                            <a href="{{ url('/') }}#contact" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-200 hover:text-white hover:bg-white/5">Kontak</a>
                        </div>
                        <div class="py-6 space-y-2">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-white hover:bg-white/5">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-200 hover:text-white hover:bg-white/5">Masuk</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="-mx-3 block rounded-lg bg-gradient-to-r from-indigo-500 to-purple-600 px-3 py-2.5 text-base font-semibold leading-7 text-white">Daftar</a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @endunless

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 border-t border-white/10 py-12 relative z-10">
        <div class="mx-auto max-w-7xl px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2">
                <div class="bg-gradient-to-br from-indigo-500 to-purple-600 p-1.5 rounded-lg">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <span class="text-lg font-bold text-white">LibSys</span>
            </div>
            <p class="text-gray-400 text-sm">© 2025 Library Management System. All rights reserved.</p>
            <div class="flex gap-4">
                <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Privacy</a>
                <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Terms</a>
            </div>
        </div>
    </footer>

    <!-- JavaScript for Mobile Menu -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenuClose = document.getElementById('mobile-menu-close');
            const mobileMenu = document.getElementById('mobile-menu');

            function showMobileMenu() {
                mobileMenu.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function hideMobileMenu() {
                mobileMenu.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }

            if(mobileMenuBtn) {
                mobileMenuBtn.addEventListener('click', showMobileMenu);
            }
            
            if(mobileMenuClose) {
                mobileMenuClose.addEventListener('click', hideMobileMenu);
            }

            // Close mobile menu when clicking outside
            if(mobileMenu) {
                mobileMenu.addEventListener('click', function(e) {
                    if (e.target === mobileMenu) {
                        hideMobileMenu();
                    }
                });
            }

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    // Only if on the same page
                    const href = this.getAttribute('href');
                    if(href.startsWith('#')) {
                        e.preventDefault();
                        const target = document.querySelector(href);
                        if (target) {
                            target.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                            hideMobileMenu();
                        }
                    }
                });
            });
        });
    </script>
    @stack('scripts')
</body>
</html>