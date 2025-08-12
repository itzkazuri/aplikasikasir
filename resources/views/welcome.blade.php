@extends('layouts.app')
@section('title', 'Toko Ku')

@section('content')
    @include('components.navbar')

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-white dark:bg-gray-900 rounded-xl shadow-lg transition-colors duration-300">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-center text-gray-800 dark:text-white mb-6 tracking-tight">Selamat Datang di Toko Ku!</h1>
        <p class="text-base sm:text-lg lg:text-xl text-gray-600 dark:text-gray-300 text-center mb-10 max-w-3xl mx-auto leading-relaxed">Kami menyediakan berbagai produk berkualitas untuk kebutuhan Anda. Jelajahi koleksi kami dan temukan penawaran terbaik!</p>

        <!-- Features Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @foreach(['Fitur Satu' => 'Eksplorasi koleksi produk kami dengan kualitas terbaik dan harga kompetitif.', 'Fitur Dua' => 'Nikmati pengalaman berbelanja yang mudah dan aman dengan antarmuka yang ramah pengguna.', 'Fitur Tiga' => 'Dapatkan layanan pelanggan 24/7 untuk membantu Anda setiap saat.'] as $title => $description)
                <div class="bg-gray-100 dark:bg-gray-800 rounded-xl shadow-md p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <h2 class="text-xl sm:text-2xl font-semibold text-gray-700 dark:text-white mb-4">{{ $title }}</h2>
                    <p class="text-gray-600 dark:text-gray-300 text-sm sm:text-base leading-relaxed">{{ $description }}</p>
                </div>
            @endforeach
        </div>

        <!-- Products Section -->
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-center text-gray-800 dark:text-white mt-16 mb-8 tracking-tight">Produk Kami</h2>
        @if($products->isEmpty())
            <p class="text-center text-gray-600 dark:text-gray-300 text-base sm:text-lg">Tidak ada produk yang tersedia saat ini.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 lg:gap-8">
                @foreach($products as $product)
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="relative">
                            <img src="{{ asset('uploads/barang/' . $product->gambar) }}" alt="{{ $product->nama_barang }}" class="w-full h-48 sm:h-56 object-cover transition-transform duration-300 hover:scale-105">
                        </div>
                        <div class="p-4 sm:p-6">
                            <h3 class="text-lg sm:text-xl font-semibold text-gray-800 dark:text-white mb-2 line-clamp-2">{{ $product->nama_barang }}</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-3 line-clamp-3">{{ $product->deskripsi }}</p>
                            <p class="text-lg font-bold text-indigo-600 dark:text-indigo-400">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection