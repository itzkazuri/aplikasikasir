@extends('layouts.app')
@section('title', 'Mengapa Pilih Kami')

@section('content')
    @include('components.navbar')

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-white dark:bg-gray-900 rounded-xl shadow-lg transition-colors duration-300">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-center text-gray-800 dark:text-white mb-6 tracking-tight">Mengapa Pilih Kami?</h1>
        <p class="text-base sm:text-lg lg:text-xl text-gray-600 dark:text-gray-300 text-center mb-10 max-w-3xl mx-auto leading-relaxed">Temukan alasan mengapa kami adalah pilihan terbaik untuk kebutuhan Anda dengan layanan unggulan dan komitmen pada kepuasan pelanggan.</p>

        <!-- Reasons Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @foreach([
                ['title' => 'Layanan Berkualitas', 'description' => 'Kami berkomitmen memberikan layanan terbaik dengan fokus pada kepuasan pelanggan.'],
                ['title' => 'Tim Berpengalaman', 'description' => 'Tim profesional kami berdedikasi untuk menghasilkan solusi berkualitas tinggi.'],
                ['title' => 'Harga Terjangkau', 'description' => 'Harga kompetitif tanpa mengorbankan kualitas layanan yang kami berikan.'],
                ['title' => 'Dukungan Pelanggan', 'description' => 'Tim dukungan kami siap membantu 24/7 untuk menjawab segala pertanyaan Anda.'],
                ['title' => 'Inovasi', 'description' => 'Kami terus berinovasi dengan teknologi terbaru untuk solusi terbaik.'],
                ['title' => 'Keandalan', 'description' => 'Layanan kami andal dan konsisten, memberikan Anda ketenangan pikiran.']
            ] as $reason)
                <div class="bg-gray-100 dark:bg-gray-800 rounded-xl shadow-md p-6 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <h2 class="text-xl sm:text-2xl font-semibold text-gray-700 dark:text-white mb-4">{{ $reason['title'] }}</h2>
                    <p class="text-gray-600 dark:text-gray-300 text-sm sm:text-base leading-relaxed">{{ $reason['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
