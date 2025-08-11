@extends('layouts.app')

@section('title', 'Laporan Penjualan')

@section('content')
<div class="flex flex-col md:flex-row h-screen bg-gray-100 dark:bg-gray-900">
    <!-- Sidebar -->
    @include('components.sideadmin')

    <!-- Main content -->
    <div class="flex-1 p-4 pl-16 md:p-10">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Laporan Penjualan</h1>

        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Laporan Bulanan</h2>
            <form action="{{ route('admin.laporan.monthly') }}" method="GET" class="flex items-end space-x-4">
                <div class="flex-1">
                    <label for="bulan" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Bulan:</label>
                    <select name="bulan" id="bulan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600" required>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ date('n') == $i ? 'selected' : '' }}>{{ date('F', mktime(0, 0, 0, $i, 10)) }}</option>
                        @endfor
                    </select>
                </div>
                <div class="flex-1">
                    <label for="tahun_monthly" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Tahun:</label>
                    <input type="number" name="tahun" id="tahun_monthly" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600" value="{{ date('Y') }}" required>
                </div>
                <div class="flex-1">
                    <label for="format_monthly" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Format:</label>
                    <select name="format" id="format_monthly" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600" required>
                        <option value="excel">Excel</option>
                        <option value="pdf">PDF</option>
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline dark:bg-blue-600 dark:hover:bg-blue-800">
                    Download
                </button>
            </form>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Laporan Tahunan</h2>
            <form action="{{ route('admin.laporan.annual') }}" method="GET" class="flex items-end space-x-4">
                <div class="flex-1">
                    <label for="tahun_annual" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Tahun:</label>
                    <input type="number" name="tahun" id="tahun_annual" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600" value="{{ date('Y') }}" required>
                </div>
                <div class="flex-1">
                    <label for="format_annual" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Format:</label>
                    <select name="format" id="format_annual" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600" required>
                        <option value="excel">Excel</option>
                        <option value="pdf">PDF</option>
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline dark:bg-blue-600 dark:hover:bg-blue-800">
                    Download
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
