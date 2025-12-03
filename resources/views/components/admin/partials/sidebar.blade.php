<!-- Sidebar dengan animasi slide -->
<aside id="sidebar" class="fixed left-0 top-16 w-64 h-screen bg-white dark:bg-gray-800 shadow-lg transform -translate-x-full md:translate-x-0 md:relative md:top-0 transition-transform duration-300 ease-in-out z-30">
    <div class="p-6">
        <h2 class="text-lg font-bold text-gray-800 dark:text-white mb-8">Menu</h2>
        <ul class="space-y-4">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('Dashboard') }}" class="flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Buku -->
            <li>
                <a href="{{ route('books.index') }}" class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/>
                    </svg>
                    <span>Manajemen Buku</span>
                </a>
            </li>

            <!-- Anggota -->
            <li>
                <a href="{{ route('user.index') }}" class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm0-13c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5z"/>
                    </svg>
                    <span>Manajemen Member</span>
                </a>
            </li>

            <!-- Peminjaman -->
            <li>
                <a href="{{ route('borrowing.index') }}" class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-5-7h-2v-2h2v2zm0-4h-2v-2h2v2zm0 8h-2v-2h2v2zm-4-4h-2v-2h2v2zm0 4h-2v-2h2v2zm0-8h-2v-2h2v2zm8 4h-2v-2h2v2zm0 4h-2v-2h2v2zm0-8h-2v-2h2v2z"/>
                    </svg>
                    <span>Manajemen Peminjaman</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<!-- Overlay untuk mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden md:hidden z-20"></div>