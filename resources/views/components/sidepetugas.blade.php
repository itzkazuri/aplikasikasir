<!-- Sidebar -->
<aside class="fixed inset-y-0 left-0 w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 transform -translate-x-full md:relative md:translate-x-0 transition-transform duration-200 ease-in-out z-40 overflow-y-auto">
    <div class="p-4 pl-16">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Petugas Panel</h2>
    </div>
    <nav class="mt-5 pl-10">
        <ul>
            <li class="px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                <a href="{{ route('petugas.dashboard') }}" class="flex items-center text-gray-700 dark:text-gray-300">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                <a href="{{ route('petugas.transaksi.create') }}" class="flex items-center text-gray-700 dark:text-gray-300">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <span>Tambah Transaksi</span>
                </a>
            </li>
            <li class="px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                <a href="{{ route('petugas.barang.index') }}" class="flex items-center text-gray-700 dark:text-gray-300">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                    <span>Lihat Barang</span>
                </a>
            </li>
            <li class="px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="flex items-center text-gray-700 dark:text-gray-300 w-full text-left">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        <span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</aside>
