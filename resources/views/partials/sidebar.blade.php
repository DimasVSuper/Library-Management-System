<!-- Sidebar dengan animasi slide -->
<aside id="sidebar" class="fixed left-0 top-16 w-64 h-screen bg-white dark:bg-gray-800 shadow-lg transform -translate-x-full md:translate-x-0 md:relative md:top-0 transition-transform duration-300 ease-in-out z-30">
    <div class="p-6">
        <h2 class="text-lg font-bold text-gray-800 dark:text-white mb-8">Menu</h2>
        <ul class="space-y-4">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('Dashboard') }}" class="flex items-center px-4 py-2 {{ request()->routeIs('Dashboard') ? 'bg-blue-500 text-white' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} rounded-lg transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Buku -->
            <li>
                <a href="{{ route('books.index') }}" class="flex items-center px-4 py-2 {{ request()->routeIs('books.*') ? 'bg-blue-500 text-white' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} rounded-lg transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"/>
                    </svg>
                    <span>Manajemen Buku</span>
                </a>
            </li>

            <!-- Anggota -->
            <li>
                <a href="{{ route('members.index') }}" class="flex items-center px-4 py-2 {{ request()->routeIs('members.*') ? 'bg-blue-500 text-white' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} rounded-lg transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                    </svg>
                    <span>Manajemen Member</span>
                </a>
            </li>

            <!-- Peminjaman -->
            <li>
                <a href="{{ route('borrowings.index') }}" class="flex items-center px-4 py-2 {{ request()->routeIs('borrowings.*') ? 'bg-blue-500 text-white' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} rounded-lg transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                    </svg>
                    <span>Manajemen Peminjaman</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<!-- Overlay untuk mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden md:hidden z-20"></div>
