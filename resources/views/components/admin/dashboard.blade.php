<!-- Dashboard Component - untuk konten dashboard -->
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    <!-- Navbar -->
    @include('components.admin.partials.navbar')

    <div class="flex pt-16 md:pt-0">
        <!-- Sidebar -->
        @include('components.admin.partials.sidebar')

        <!-- Main Content -->
        <main class="flex-1 p-4 md:p-8 w-full md:w-auto">
            <div class="max-w-7xl mx-auto">
                <!-- Welcome Card -->
                <div class="bg-linear-to-r from-blue-500 to-purple-600 text-white rounded-lg shadow-lg p-8 mb-8 animate-fade-in">
                    <h2 class="text-3xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
                    <p class="text-blue-100">Kelola perpustakaan Anda dengan mudah dan efisien</p>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Card 1: Total Buku -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 hover:shadow-lg transition duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Total Buku</p>
                                <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2">1,245</p>
                            </div>
                            <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-full">
                                <svg class="w-8 h-8 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Anggota Aktif -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 hover:shadow-lg transition duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Anggota Aktif</p>
                                <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2">542</p>
                            </div>
                            <div class="bg-green-100 dark:bg-green-900 p-3 rounded-full">
                                <svg class="w-8 h-8 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Peminjaman Aktif -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 hover:shadow-lg transition duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Peminjaman Aktif</p>
                                <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2">89</p>
                            </div>
                            <div class="bg-yellow-100 dark:bg-yellow-900 p-3 rounded-full">
                                <svg class="w-8 h-8 text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm0-13c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Card 4: Denda -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 hover:shadow-lg transition duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Total Denda</p>
                                <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2">Rp 450K</p>
                            </div>
                            <div class="bg-red-100 dark:bg-red-900 p-3 rounded-full">
                                <svg class="w-8 h-8 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Aktivitas Terbaru</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
                            <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-white">
                                <tr>
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Anggota</th>
                                    <th class="px-4 py-2">Buku</th>
                                    <th class="px-4 py-2">Aksi</th>
                                    <th class="px-4 py-2">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-4 py-2">#001</td>
                                    <td class="px-4 py-2">Ahmad Rizki</td>
                                    <td class="px-4 py-2">Clean Code</td>
                                    <td class="px-4 py-2"><span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs">Peminjaman</span></td>
                                    <td class="px-4 py-2">3 Desember 2025</td>
                                </tr>
                                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-4 py-2">#002</td>
                                    <td class="px-4 py-2">Siti Nurhaliza</td>
                                    <td class="px-4 py-2">Design Patterns</td>
                                    <td class="px-4 py-2"><span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs">Pengembalian</span></td>
                                    <td class="px-4 py-2">2 Desember 2025</td>
                                </tr>
                                <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-4 py-2">#003</td>
                                    <td class="px-4 py-2">Budi Santoso</td>
                                    <td class="px-4 py-2">Refactoring</td>
                                    <td class="px-4 py-2"><span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs">Denda</span></td>
                                    <td class="px-4 py-2">1 Desember 2025</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
