@extends('user.layouts.index')

@section('title', 'Pengaduan Saya')
@section('content')
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Pengaduan saya</h1>
        <p class="text-gray-600">
            Berikut adalah daftar pengaduan yang telah Anda sampaikan. Anda dapat melihat status dan detail dari setiap
            pengaduan.
        </p>
    </div>

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Card 1 -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="p-4">
                <!-- Card Header -->
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Pengaduan 1</h3>
                    <span class="px-4 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-medium">
                        Menunggu
                    </span>
                </div>

                <!-- Image -->
                <div class="mb-4">
                    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&h=400&fit=crop"
                        alt="Pengaduan" class="w-full h-48 object-cover rounded-lg">
                </div>

                <!-- Description -->
                <p class="text-gray-700 mb-3 text-sm leading-relaxed">
                    Saya ingin melaporkan pintu di ruang 3 kelas XII Animasi 2 rusak, mohon ditindak lanjuti.
                </p>

                <!-- Link Detail -->
                <a href="#" class="text-blue-600 text-sm hover:underline mb-4 inline-block">Lihat Detail</a>

                <!-- Button Chat -->
                <button
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg flex items-center justify-center gap-2 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                        </path>
                    </svg>
                    Buka Chat
                </button>
            </div>
        </div>
    </div>
@endsection
