<!-- Sidebar dengan animasi slide -->
<aside id="sidebar" class="fixed left-0 top-16 w-64 h-screen bg-white/70 dark:bg-gray-900/80 backdrop-blur-md border-r border-white/20 dark:border-gray-700/50 shadow-xl transform -translate-x-full md:translate-x-0 md:relative md:top-0 transition-transform duration-300 ease-in-out z-30">
    <div class="p-6">
        <h2 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-6">Menu Utama</h2>
        <ul class="space-y-3">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('Dashboard') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('Dashboard') ? 'bg-blue-600/90 text-white shadow-lg shadow-blue-500/30' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100/50 dark:hover:bg-gray-700/50 hover:text-blue-600 dark:hover:text-blue-400' }} rounded-xl transition-all duration-300 group">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('Dashboard') ? 'text-white' : 'text-gray-400 group-hover:text-blue-500' }} transition-colors" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>
            </li>

            <!-- Buku -->
            <li>
                <a href="{{ route('books.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('books.*') ? 'bg-blue-600/90 text-white shadow-lg shadow-blue-500/30' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100/50 dark:hover:bg-gray-700/50 hover:text-blue-600 dark:hover:text-blue-400' }} rounded-xl transition-all duration-300 group">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('books.*') ? 'text-white' : 'text-gray-400 group-hover:text-blue-500' }} transition-colors" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"/>
                    </svg>
                    <span class="font-medium">Manajemen Buku</span>
                </a>
            </li>

            <!-- Anggota -->
            <li>
                <a href="{{ route('members.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('members.*') ? 'bg-blue-600/90 text-white shadow-lg shadow-blue-500/30' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100/50 dark:hover:bg-gray-700/50 hover:text-blue-600 dark:hover:text-blue-400' }} rounded-xl transition-all duration-300 group">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('members.*') ? 'text-white' : 'text-gray-400 group-hover:text-blue-500' }} transition-colors" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                    </svg>
                    <span class="font-medium">Manajemen Member</span>
                </a>
            </li>

            <!-- Peminjaman -->
            <li>
                <a href="{{ route('borrowings.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('borrowings.*') ? 'bg-blue-600/90 text-white shadow-lg shadow-blue-500/30' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100/50 dark:hover:bg-gray-700/50 hover:text-blue-600 dark:hover:text-blue-400' }} rounded-xl transition-all duration-300 group">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('borrowings.*') ? 'text-white' : 'text-gray-400 group-hover:text-blue-500' }} transition-colors" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                    </svg>
                    <span class="font-medium">Manajemen Peminjaman</span>
                </a>
            </li>

            <!-- Denda -->
            <li>
                <a href="{{ route('fines.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('fines.*') ? 'bg-blue-600/90 text-white shadow-lg shadow-blue-500/30' : 'text-gray-600 dark:text-gray-300 hover:bg-gray-100/50 dark:hover:bg-gray-700/50 hover:text-blue-600 dark:hover:text-blue-400' }} rounded-xl transition-all duration-300 group">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('fines.*') ? 'text-white' : 'text-gray-400 group-hover:text-blue-500' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="font-medium">Manajemen Denda</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<!-- Overlay untuk mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden md:hidden z-20"></div>
