@extends('user.layouts.index')

@section('title', 'History')
@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">History pengaduan</h1>
        <p class="text-gray-600">
            Pantau dan lihat progres serta history pengaduan Anda selama menggunakan SIPAS disini.
        </p>
    </div>

    <!-- Cards Grid - 4 columns -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1 -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <!-- Image -->
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=250&fit=crop" alt="Pengaduan"
                    class="w-full h-40 object-cover">
            </div>

            <!-- Content -->
            <div class="p-4">
                <!-- User Info & Status -->
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-2">
                        <div
                            class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-xs font-bold">
                            S
                        </div>
                        <div>
                            <p class="text-xs font-semibold text-gray-900">Siti XII Animasi 2</p>
                            <p class="text-xs text-gray-500">30 oktober 2025</p>
                        </div>
                    </div>
                    <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded text-xs font-medium">
                        Diproses
                    </span>
                </div>

                <!-- Description -->
                <p class="text-gray-700 text-sm mb-3 line-clamp-2">
                    Saya ingin melaporkan kamar mandi di lantai 3 dekat tangga...
                </p>

                <!-- Link -->
                <a href="#" class="text-blue-600 text-sm font-medium hover:underline flex items-center gap-1">
                    Lihat Progress
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endsection
