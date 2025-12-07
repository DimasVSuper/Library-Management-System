<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') - {{ config('app.name', 'LibSys') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-slate-100 to-slate-200 dark:from-slate-900 dark:to-slate-800 min-h-screen font-sans antialiased">
    <div class="min-h-screen relative">
        <!-- Background Blobs for Glassmorphism Effect -->
        <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-400/20 rounded-full blur-3xl mix-blend-multiply dark:mix-blend-screen filter opacity-50 animate-blob"></div>
            <div class="absolute top-0 right-1/4 w-96 h-96 bg-purple-400/20 rounded-full blur-3xl mix-blend-multiply dark:mix-blend-screen filter opacity-50 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-32 left-1/3 w-96 h-96 bg-pink-400/20 rounded-full blur-3xl mix-blend-multiply dark:mix-blend-screen filter opacity-50 animate-blob animation-delay-4000"></div>
        </div>

        <!-- Navbar -->
        @include('partials.admin.navbar')

        <div class="flex pt-16 md:pt-0">
            <!-- Sidebar -->
            @include('partials.admin.sidebar')

            <!-- Main Content -->
            <main class="flex-1 p-4 md:p-8 w-full md:w-auto transition-all duration-300">
                <div class="max-w-7xl mx-auto">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    @stack('scripts')
    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
</body>
</html>
