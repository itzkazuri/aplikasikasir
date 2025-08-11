@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
<div class="flex h-screen bg-gray-100 dark:bg-gray-900">
    <!-- Sidebar -->
    @include('components.sideadmin')

    <!-- Main content -->
    <div class="flex-1 p-10">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Edit Barang</h1>

        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <form action="{{ route('admin.barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="kode_barang" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Kode Barang:</label>
                    <input type="text" name="kode_barang" id="kode_barang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600" required value="{{ old('kode_barang', $barang->kode_barang) }}">
                    @error('kode_barang')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="nama_barang" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Nama Barang:</label>
                    <input type="text" name="nama_barang" id="nama_barang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600" required value="{{ old('nama_barang', $barang->nama_barang) }}">
                    @error('nama_barang')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="harga" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Harga:</label>
                    <input type="number" name="harga" id="harga" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600" required value="{{ old('harga', $barang->harga) }}">
                    @error('harga')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="stok" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Stok:</label>
                    <input type="number" name="stok" id="stok" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600" required value="{{ old('stok', $barang->stok) }}">
                    @error('stok')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="foto_barang" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Foto Barang:</label>
                    @if ($barang->foto_barang)
                        <img src="{{ asset($barang->foto_barang) }}" alt="Foto Barang" class="w-24 h-24 object-cover mb-2 rounded">
                    @endif
                    <input type="file" name="foto_barang" id="foto_barang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-200 leading-tight focus:outline-none focus:shadow-outline bg-gray-50 dark:bg-gray-700 border-gray-300 dark:border-gray-600">
                    @error('foto_barang')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline dark:bg-blue-600 dark:hover:bg-blue-800">
                        Update
                    </button>
                    <a href="{{ route('admin.barang') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-600">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
