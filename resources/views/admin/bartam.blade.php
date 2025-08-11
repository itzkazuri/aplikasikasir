@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')
<div class="flex flex-col md:flex-row h-screen bg-gray-100 dark:bg-gray-900">
    <!-- Sidebar -->
    @include('components.sideadmin')

    <!-- Main content -->
    <div class="flex-1 p-4 pl-16 md:p-10">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Tambah Barang</h1>

        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <form action="{{ route('admin.barang.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="kode_barang" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Kode Barang:</label>
                    <input type="text" name="kode_barang" id="kode_barang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600" required value="{{ old('kode_barang') }}">
                    @error('kode_barang')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="nama_barang" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Nama Barang:</label>
                    <input type="text" name="nama_barang" id="nama_barang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600" required value="{{ old('nama_barang') }}">
                    @error('nama_barang')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="harga" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Harga:</label>
                    <input type="number" name="harga" id="harga" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600" required value="{{ old('harga') }}">
                    @error('harga')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="stok" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Stok:</label>
                    <input type="number" name="stok" id="stok" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600" required value="{{ old('stok') }}">
                    @error('stok')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="foto_barang" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Foto Barang:</label>
                    <input type="file" name="foto_barang" id="foto_barang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600">
                    @error('foto_barang')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline dark:bg-blue-600 dark:hover:bg-blue-800">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
