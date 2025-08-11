@extends('layouts.app')

@section('title', 'Detail Transaksi')

@section('content')
<div class="flex flex-col md:flex-row h-screen bg-gray-100 dark:bg-gray-900">
    <!-- Sidebar -->
    @include('components.sideadmin')

    <!-- Main content -->
    <div class="flex-1 p-4 pl-16 md:p-10">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Detail Transaksi #{{ $transaksi->kode_transaksi }}</h1>

        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Informasi Transaksi</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700 dark:text-gray-300">
                <div>
                    <p><strong>Kode Transaksi:</strong> {{ $transaksi->kode_transaksi }}</p>
                    <p><strong>User:</strong> {{ $transaksi->user->nama_lengkap ?? 'N/A' }}</p>
                    <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d-m-Y') }}</p>
                </div>
                <div>
                    <p><strong>Waktu:</strong> {{ \Carbon\Carbon::parse($transaksi->waktu_transaksi)->format('H:i') }}</p>
                    <p><strong>Total Bayar:</strong> Rp {{ number_format($transaksi->total_bayar, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Detail Barang</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Barang
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Jumlah
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 dark:border-gray-700 bg-gray-100 dark:bg-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                                Subtotal
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi->detailTransaksi as $detail)
                        <tr class="text-gray-700 dark:text-gray-200">
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                {{ $detail->barang->nama_barang ?? 'N/A' }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                {{ $detail->jumlah }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-sm">
                                Rp {{ number_format($detail->subtotal, 0, ',', '.') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
