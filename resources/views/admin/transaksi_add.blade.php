@extends('layouts.app')

@section('title', 'Tambah Transaksi')

@section('content')
<div class="flex flex-col md:flex-row h-screen bg-gray-100 dark:bg-gray-900">
    <!-- Sidebar -->
    @include('components.sideadmin')

    <!-- Main content -->
    <div class="flex-1 p-4 pl-16 md:p-10">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Tambah Transaksi</h1>

        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <form action="{{ route('admin.transaksi.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="tanggal_transaksi" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Tanggal Transaksi:</label>
                    <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600" required value="{{ old('tanggal_transaksi', date('Y-m-d')) }}">
                    @error('tanggal_transaksi')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Detail Transaksi</h2>
                <div id="detail-transaksi-container">
                    <!-- Dynamic rows for items will be added here -->
                    <div class="flex items-center mb-4 detail-row">
                        <div class="w-1/2 mr-2">
                            <label for="barang_id_0" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Barang:</label>
                            <select name="items[0][barang_id]" id="barang_id_0" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 barang-select" required>
                                <option value="">Pilih Barang</option>
                                @foreach ($barangs as $barang)
                                    <option value="{{ $barang->id }}" data-harga="{{ $barang->harga }}">{{ $barang->nama_barang }} (Stok: {{ $barang->stok }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-1/4 mr-2">
                            <label for="jumlah_0" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Jumlah:</label>
                            <input type="number" name="items[0][jumlah]" id="jumlah_0" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 jumlah-input" required min="1">
                        </div>
                        <div class="w-1/4">
                            <label for="subtotal_0" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Subtotal:</label>
                            <input type="text" id="subtotal_0" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 subtotal-display" readonly>
                        </div>
                        <button type="button" class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded remove-item-btn">Hapus</button>
                    </div>
                </div>
                <button type="button" id="addItemBtn" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">Tambah Item</button>

                <div class="mt-6">
                    <label for="total_bayar" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Total Bayar:</label>
                    <input type="text" name="total_bayar" id="total_bayar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600" readonly>
                    @error('total_bayar')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mt-6">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline dark:bg-blue-600 dark:hover:bg-blue-800">
                        Simpan Transaksi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let itemIndex = 0;
        const detailContainer = document.getElementById('detail-transaksi-container');
        const addItemBtn = document.getElementById('addItemBtn');
        const totalBayarInput = document.getElementById('total_bayar');

        function calculateTotal() {
            let total = 0;
            document.querySelectorAll('.detail-row').forEach(row => {
                const subtotalDisplay = row.querySelector('.subtotal-display');
                if (subtotalDisplay && !isNaN(parseFloat(subtotalDisplay.value))) {
                    total += parseFloat(subtotalDisplay.value);
                }
            });
            totalBayarInput.value = total.toFixed(0); // Format as integer
        }

        function updateSubtotal(row) {
            const barangSelect = row.querySelector('.barang-select');
            const jumlahInput = row.querySelector('.jumlah-input');
            const subtotalDisplay = row.querySelector('.subtotal-display');

            const selectedOption = barangSelect.options[barangSelect.selectedIndex];
            const harga = parseFloat(selectedOption.dataset.harga || 0);
            const jumlah = parseInt(jumlahInput.value || 0);

            const subtotal = harga * jumlah;
            subtotalDisplay.value = subtotal.toFixed(0); // Format as integer
            calculateTotal();
        }

        function addEventListenersToRow(row) {
            const barangSelect = row.querySelector('.barang-select');
            const jumlahInput = row.querySelector('.jumlah-input');
            const removeItemBtn = row.querySelector('.remove-item-btn');

            barangSelect.addEventListener('change', () => updateSubtotal(row));
            jumlahInput.addEventListener('input', () => updateSubtotal(row));
            removeItemBtn.addEventListener('click', () => {
                row.remove();
                calculateTotal();
            });
        }

        addItemBtn.addEventListener('click', function () {
            itemIndex++;
            const newRowHtml = `
                <div class="flex items-center mb-4 detail-row">
                    <div class="w-1/2 mr-2">
                        <label for="barang_id_${itemIndex}" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Barang:</label>
                        <select name="items[${itemIndex}][barang_id]" id="barang_id_${itemIndex}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 barang-select" required>
                            <option value="">Pilih Barang</option>
                            @foreach ($barangs as $barang)
                                <option value="{{ $barang->id }}" data-harga="{{ $barang->harga }}">{{ $barang->nama_barang }} (Stok: {{ $barang->stok }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-1/4 mr-2">
                        <label for="jumlah_${itemIndex}" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Jumlah:</label>
                        <input type="number" name="items[${itemIndex}][jumlah]" id="jumlah_${itemIndex}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 jumlah-input" required min="1">
                    </div>
                    <div class="w-1/4">
                        <label for="subtotal_${itemIndex}" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Subtotal:</label>
                        <input type="text" id="subtotal_${itemIndex}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 subtotal-display" readonly>
                    </div>
                    <button type="button" class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded remove-item-btn">Hapus</button>
                </div>
            `;
            detailContainer.insertAdjacentHTML('beforeend', newRowHtml);
            const newRow = detailContainer.lastElementChild;
            addEventListenersToRow(newRow);
        });

        // Add event listeners to the initial row
        document.querySelectorAll('.detail-row').forEach(row => addEventListenersToRow(row));

        // Initial calculation
        calculateTotal();
    });
</script>
