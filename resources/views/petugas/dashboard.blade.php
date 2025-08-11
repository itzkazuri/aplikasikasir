@extends('petugas.app')

@section('title', 'Petugas Dashboard')

@section('content')
<div class="flex flex-col md:flex-row h-screen bg-gray-100 dark:bg-gray-900">
    <!-- Sidebar -->
    @include('components.sidepetugas')

    <!-- Main content -->
    <div class="flex-1 p-4 pl-16 md:p-10">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Petugas Dashboard</h1>

        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Total Transaksi Card -->
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-3 bg-yellow-500 rounded-full">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Transaksi Hari Ini</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalTransaksiToday }}</p>
                    </div>
                </div>
            </div>

            <!-- Total Pendapatan Hari Ini Card -->
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-3 bg-green-500 rounded-full">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2-1.343-2-3-2zM12 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2-1.343-2-3-2zM12 20c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2-1.343-2-3-2z"></path></svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Pendapatan Hari Ini</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">Rp {{ number_format($totalPendapatanToday, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Total Barang Card -->
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-500 rounded-full">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Barang Tersedia</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalBarang }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
