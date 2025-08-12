<!-- Sidebar -->
<aside class="fixed inset-y-0 left-0 w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 transform -translate-x-full md:relative md:translate-x-0 transition-transform duration-300 ease-in-out z-40 overflow-y-auto shadow-lg">
    <!-- Header Section -->
    <div class="p-6 pl-16 border-b border-gray-100 dark:border-gray-700">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white tracking-tight">Admin Panel</h2>
        <div class="w-12 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full mt-2"></div>
    </div>
    
    <!-- Navigation -->
    <nav class="mt-6 pl-10 pr-4">
        <ul class="space-y-1">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('admin.dashboard') }}" 
                   class="group flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 rounded-lg transition-all duration-200 hover:bg-gray-100 dark:hover:bg-gray-700 hover:translate-x-1 hover:shadow-sm">
                    <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-md bg-gray-100 dark:bg-gray-700 group-hover:bg-blue-100 dark:group-hover:bg-blue-900/30 transition-colors duration-200">
                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </div>
                    <span class="font-medium">Dashboard</span>
                    <div class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </a>
            </li>
            
            <!-- Users -->
            <li>
                <a href="{{ route('admin.users.index') }}" 
                   class="group flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 rounded-lg transition-all duration-200 hover:bg-gray-100 dark:hover:bg-gray-700 hover:translate-x-1 hover:shadow-sm">
                    <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-md bg-gray-100 dark:bg-gray-700 group-hover:bg-green-100 dark:group-hover:bg-green-900/30 transition-colors duration-200">
                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-400 group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21a6 6 0 00-9-5.197m0 0A5.995 5.995 0 0112 12.75a5.995 5.995 0 016-5.197M15 21a6 6 0 00-9-5.197"></path>
                        </svg>
                    </div>
                    <span class="font-medium">Users</span>
                    <div class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </a>
            </li>
            
            <!-- Barang -->
            <li>
                <a href="{{ route('admin.barang') }}" 
                   class="group flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 rounded-lg transition-all duration-200 hover:bg-gray-100 dark:hover:bg-gray-700 hover:translate-x-1 hover:shadow-sm">
                    <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-md bg-gray-100 dark:bg-gray-700 group-hover:bg-orange-100 dark:group-hover:bg-orange-900/30 transition-colors duration-200">
                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-400 group-hover:text-orange-600 dark:group-hover:text-orange-400 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                        </svg>
                    </div>
                    <span class="font-medium">Barang</span>
                    <div class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </a>
            </li>
            
            <!-- Transaksi -->
            <li>
                <a href="{{ route('admin.transaksi.index') }}" 
                   class="group flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 rounded-lg transition-all duration-200 hover:bg-gray-100 dark:hover:bg-gray-700 hover:translate-x-1 hover:shadow-sm">
                    <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-md bg-gray-100 dark:bg-gray-700 group-hover:bg-purple-100 dark:group-hover:bg-purple-900/30 transition-colors duration-200">
                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-400 group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <span class="font-medium">Transaksi</span>
                    <div class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </a>
            </li>
            
            <!-- Laporan Section -->
            <li class="pt-2">
                <div class="px-4 py-2">
                    <div class="flex items-center text-gray-500 dark:text-gray-400">
                        <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-md bg-gray-100 dark:bg-gray-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <span class="font-medium">Laporan</span>
                    </div>
                </div>
                
                <!-- Submenu -->
                <ul class="ml-8 mt-2 space-y-1">
                    <li>
                        <a href="{{ route('admin.laporan.index') }}" 
                           class="group flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 rounded-md transition-all duration-200 hover:bg-gray-100 dark:hover:bg-gray-700 hover:translate-x-1">
                            <div class="w-2 h-2 bg-gray-400 rounded-full mr-3 group-hover:bg-indigo-500 transition-colors duration-200"></div>
                            <span>Laporan Penjualan</span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <!-- Divider -->
            <li class="pt-6">
                <div class="border-t border-gray-200 dark:border-gray-700 mx-4"></div>
            </li>
            
            <!-- Logout -->
            <li class="pt-4">
                <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" 
                            class="group flex items-center w-full px-4 py-3 text-gray-700 dark:text-gray-300 rounded-lg transition-all duration-200 hover:bg-red-50 dark:hover:bg-red-900/20 hover:translate-x-1 hover:shadow-sm text-left">
                        <div class="flex items-center justify-center w-8 h-8 mr-3 rounded-md bg-gray-100 dark:bg-gray-700 group-hover:bg-red-100 dark:group-hover:bg-red-900/30 transition-colors duration-200">
                            <svg class="w-5 h-5 text-gray-600 dark:text-gray-400 group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                        </div>
                        <span class="font-medium">Logout</span>
                        <div class="ml-auto opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </button>
                </form>
            </li>
        </ul>
    </nav>
    
    <!-- Footer Space -->
    <div class="h-6"></div>
</aside>