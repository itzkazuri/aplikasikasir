@extends('layouts.app')

@section('title', 'Edit Transaksi')

@section('content')
<div class="flex flex-col md:flex-row h-screen bg-gray-100 dark:bg-gray-900">
    <!-- Sidebar -->
    @include('components.sideadmin')

    <!-- Main content -->
    <div class="flex-1 p-4 pl-16 md:p-10">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Edit Transaksi #{{ $transaksi->kode_transaksi }}</h1>

        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <form action="{{ route('admin.transaksi.update', $transaksi->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="user_id" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">User:</label>
                    <select name="user_id" id="user_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600" required>
                        <option value="">Pilih User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $transaksi->user_id) == $user->id ? 'selected' : '' }}>{{ $user->nama_lengkap }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="tanggal_transaksi" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Tanggal Transaksi:</label>
                    <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600" required value="{{ old('tanggal_transaksi', \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('Y-m-d')) }}">
                    @error('tanggal_transaksi')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Detail Transaksi</h2>
                <div id="detail-transaksi-container">
                    @foreach ($transaksi->detailTransaksi as $index => $detail)
                    <div class="flex items-center mb-4 detail-row">
                        <div class="w-1/2 mr-2">
                            <label for="barang_id_{{ $index }}" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Barang:</label>
                            <select name="items[{{ $index }}][barang_id]" id="barang_id_{{ $index }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 barang-select" required>
                                <option value="">Pilih Barang</option>
                                @foreach ($barangs as $barang)
                                    <option value="{{ $barang->id }}" data-harga="{{ $barang->harga }}" {{ $detail->barang_id == $barang->id ? 'selected' : '' }}>{{ $barang->nama_barang }} (Stok: {{ $barang->stok }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-1/4 mr-2">
                            <label for="jumlah_{{ $index }}" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Jumlah:</label>
                            <input type="number" name="items[{{ $index }}][jumlah]" id="jumlah_{{ $index }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 jumlah-input" required min="1" value="{{ old('items.' . $index . '.jumlah', $detail->jumlah) }}">
                        </div>
                        <div class="w-1/4">
                            <label for="subtotal_{{ $index }}" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Subtotal:</label>
                            <input type="text" id="subtotal_{{ $index }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600 subtotal-display" readonly value="{{ number_format($detail->subtotal, 0, ',', '.') }}">
                        </div>
                        <button type="button" class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded remove-item-btn">Hapus</button>
                    </div>
                    @endforeach
                </div>
                <button type="button" id="addItemBtn" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">Tambah Item</button>

                <div class="mt-6">
                    <label for="total_bayar" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Total Bayar:</label>
                    <input type="text" name="total_bayar" id="total_bayar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600" readonly value="{{ old('total_bayar', $transaksi->total_bayar) }}">
                    @error('total_bayar')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mt-6">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline dark:bg-blue-600 dark:hover:bg-blue-800">
                        Update Transaksi
                    </button>
                    <a href="{{ route('admin.transaksi.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-600">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let itemIndex = {{ count($transaksi->detailTransaksi) > 0 ? count($transaksi->detailTransaksi) -1 : 0 }};
        const detailContainer = document.getElementById('detail-transaksi-container');
        const addItemBtn = document.getElementById('addItemBtn');
        const totalBayarInput = document.getElementById('total_bayar');

        function calculateTotal() {
            let total = 0;
            document.querySelectorAll('.detail-row').forEach(row => {
                const subtotalDisplay = row.querySelector('.subtotal-display');
                // Ensure subtotalDisplay exists and its value is a valid number
                if (subtotalDisplay && !isNaN(parseFloat(subtotalDisplay.value.replace(/[^0-9,-]+/g,'').replace(',', '.')))) {
                    total += parseFloat(subtotalDisplay.value.replace(/[^0-9,-]+/g,'').replace(',', '.'));
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

        // Add event listeners to existing rows (for pre-filled data)
        document.querySelectorAll('.detail-row').forEach(row => addEventListenersToRow(row));

        // Initial calculation
        calculateTotal();
    });
</script>
