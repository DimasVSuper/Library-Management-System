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
        <p class="text-gray-400 text-sm">© <span id="footer-year"></span> Library Management System. All rights reserved.</p>
    </div>
</footer>
<script>
    document.getElementById('footer-year').textContent = new Date().getFullYear();
</script>