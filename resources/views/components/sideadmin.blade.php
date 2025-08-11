<!-- Sidebar -->
<aside class="w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700">
    <div class="p-4">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Admin Panel</h2>
    </div>
    <nav class="mt-5">
        <ul>
            <li class="px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center text-gray-700 dark:text-gray-300">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                <a href="{{ route('admin.users.index') }}" class="flex items-center text-gray-700 dark:text-gray-300">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21a6 6 0 00-9-5.197m0 0A5.995 5.995 0 0112 12.75a5.995 5.995 0 016-5.197M15 21a6 6 0 00-9-5.197"></path></svg>
                    <span>Users</span>
                </a>
            </li>
            <li class="px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                <a href="{{ route('admin.barang') }}" class="flex items-center text-gray-700 dark:text-gray-300">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                    <span>Barang</span>
                </a>
            </li>
            <li class="px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                <a href="#" class="flex items-center text-gray-700 dark:text-gray-300">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <span>Transaksi</span>
                </a>
            </li>
            <li class="px-4 py-2">
                <span class="flex items-center text-gray-500 dark:text-gray-400">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <span>Laporan</span>
                </span>
                <ul class="pl-8 mt-2 space-y-2">
                    <li>
                        <a href="#" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Laporan Bulanan</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">Laporan Tahunan</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>
