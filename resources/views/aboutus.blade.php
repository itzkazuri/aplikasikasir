@extends('layouts.app')
@section('title', 'Tentang Kami')

@section('content')
    @include('components.navbar')

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-white dark:bg-gray-900 rounded-xl shadow-lg transition-colors duration-300">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-center text-gray-800 dark:text-white mb-6 tracking-tight">Tentang Kami</h1>
        <p class="text-base sm:text-lg lg:text-xl text-gray-600 dark:text-gray-300 text-center mb-10 max-w-3xl mx-auto leading-relaxed">Pelajari lebih lanjut tentang perusahaan kami, misi, dan tim yang berdedikasi untuk memberikan solusi terbaik bagi Anda.</p>

        <!-- Mission Section -->
        <div class="bg-gray-100 dark:bg-gray-800 rounded-xl shadow-md p-6 sm:p-8 mb-10 hover:shadow-xl transition-all duration-300">
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-semibold text-gray-700 dark:text-white mb-4">Misi Kami</h2>
            <p class="text-gray-600 dark:text-gray-300 text-sm sm:text-base leading-relaxed">Kami berdedikasi untuk memberikan produk dan layanan berkualitas tinggi yang memenuhi kebutuhan pelanggan kami. Dengan fokus pada inovasi dan keandalan, kami berusaha menciptakan pengalaman berbelanja yang luar biasa, didukung oleh komitmen kami terhadap kepuasan pelanggan dan keunggulan operasional.</p>
        </div>

        <!-- Team Section -->
        <div class="bg-gray-100 dark:bg-gray-800 rounded-xl shadow-md p-6 sm:p-8">
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-semibold text-gray-700 dark:text-white mb-6 text-center">Tim Kami</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @foreach([
                    ['name' => 'John Doe', 'role' => 'CEO', 'image' => 'https://via.placeholder.com/150'],
                    ['name' => 'Jane Smith', 'role' => 'CTO', 'image' => 'https://via.placeholder.com/150'],
                    ['name' => 'Peter Jones', 'role' => 'Lead Developer', 'image' => 'https://via.placeholder.com/150']
                ] as $member)
                    <div class="text-center p-4 hover:shadow-lg rounded-lg transition-all duration-300 transform hover:-translate-y-1">
                        <img class="w-28 h-28 sm:w-32 sm:h-32 rounded-full mx-auto mb-4 object-cover" src="{{ $member['image'] }}" alt="{{ $member['name'] }}">
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-700 dark:text-white mb-1">{{ $member['name'] }}</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm sm:text-base">{{ $member['role'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
