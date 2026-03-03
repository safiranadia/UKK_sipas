@extends('admin.layouts.index')

@section('title', 'listing report')
@section('content')
    <!-- Header -->
    <header class="bg-white shadow-sm px-8 py-4 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <h1 class="text-xl font-bold text-gray-900">Hallo, <span class="font-semibold">Administrator</span></h1>
            <span class="text-gray-500 text-sm ml-2">Sabtu, 30 oktober 2025</span>
        </div>
        <div class="flex items-center gap-4">
            <!-- Notification -->
            <button class="p-2 text-gray-600 hover:bg-gray-100 rounded-full transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                    </path>
                </svg>
            </button>
            <!-- Avatar -->
            <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-semibold">
                AD
            </div>
        </div>
    </header>

    <!-- Content -->
    <div class="flex-1 overflow-auto p-8">
        <!-- Title -->
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Daftar Pengaduan Baru</h2>

        <!-- Filter Section -->
        <div class="flex items-center gap-4 mb-8">
            <div class="relative">
                <input type="date" placeholder="dd / mm / yyyy"
                    class="w-48 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all text-gray-600">
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                </div>
            </div>
            <button class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                Filter
            </button>
        </div>

        <!-- Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&h=400&fit=crop" alt="Pengaduan"
                    class="w-full h-48 object-cover">
                <div class="p-4">
                    <!-- User Info -->
                    <div class="flex items-center gap-3 mb-3">
                        <div
                            class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                            S
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm">Siti XII Animasi 2</p>
                            <p class="text-xs text-gray-500">30 oktober 2025</p>
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-gray-700 text-sm mb-3 line-clamp-2">
                        Saya ingin melaporkan pintu di ruang 3 kelas XII...
                    </p>

                    <!-- Detail Link -->
                    <a href="#"
                        class="text-blue-600 text-sm font-medium hover:underline flex items-center gap-1 mb-4">
                        Detail
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>

                    <!-- Action Buttons -->
                    <div class="flex gap-3">
                        <button
                            class="flex-1 px-4 py-2 bg-green-400 hover:bg-green-500 text-gray-900 font-medium rounded text-sm transition-colors">
                            Terima
                        </button>
                        <button
                            class="flex-1 px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded text-sm transition-colors">
                            Tolak
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&h=400&fit=crop" alt="Pengaduan"
                    class="w-full h-48 object-cover">
                <div class="p-4">
                    <!-- User Info -->
                    <div class="flex items-center gap-3 mb-3">
                        <div
                            class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                            S
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm">Siti XII Animasi 2</p>
                            <p class="text-xs text-gray-500">30 oktober 2025</p>
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-gray-700 text-sm mb-3 line-clamp-2">
                        Saya ingin melaporkan pintu di ruang 3 kelas XII...
                    </p>

                    <!-- Detail Link -->
                    <a href="#"
                        class="text-blue-600 text-sm font-medium hover:underline flex items-center gap-1 mb-4">
                        Detail
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>

                    <!-- Action Buttons -->
                    <div class="flex gap-3">
                        <button
                            class="flex-1 px-4 py-2 bg-green-400 hover:bg-green-500 text-gray-900 font-medium rounded text-sm transition-colors">
                            Terima
                        </button>
                        <button
                            class="flex-1 px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded text-sm transition-colors">
                            Tolak
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&h=400&fit=crop" alt="Pengaduan"
                    class="w-full h-48 object-cover">
                <div class="p-4">
                    <!-- User Info -->
                    <div class="flex items-center gap-3 mb-3">
                        <div
                            class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                            S
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm">Siti XII Animasi 2</p>
                            <p class="text-xs text-gray-500">30 oktober 2025</p>
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-gray-700 text-sm mb-3 line-clamp-2">
                        Saya ingin melaporkan pintu di ruang 3 kelas XII...
                    </p>

                    <!-- Detail Link -->
                    <a href="#"
                        class="text-blue-600 text-sm font-medium hover:underline flex items-center gap-1 mb-4">
                        Detail
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>

                    <!-- Action Buttons -->
                    <div class="flex gap-3">
                        <button
                            class="flex-1 px-4 py-2 bg-green-400 hover:bg-green-500 text-gray-900 font-medium rounded text-sm transition-colors">
                            Terima
                        </button>
                        <button
                            class="flex-1 px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded text-sm transition-colors">
                            Tolak
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&h=400&fit=crop" alt="Pengaduan"
                    class="w-full h-48 object-cover">
                <div class="p-4">
                    <!-- User Info -->
                    <div class="flex items-center gap-3 mb-3">
                        <div
                            class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                            S
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm">Siti XII Animasi 2</p>
                            <p class="text-xs text-gray-500">30 oktober 2025</p>
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-gray-700 text-sm mb-3 line-clamp-2">
                        Saya ingin melaporkan pintu di ruang 3 kelas XII...
                    </p>

                    <!-- Detail Link -->
                    <a href="#"
                        class="text-blue-600 text-sm font-medium hover:underline flex items-center gap-1 mb-4">
                        Detail
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </a>

                    <!-- Action Buttons -->
                    <div class="flex gap-3">
                        <button
                            class="flex-1 px-4 py-2 bg-green-400 hover:bg-green-500 text-gray-900 font-medium rounded text-sm transition-colors">
                            Terima
                        </button>
                        <button
                            class="flex-1 px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded text-sm transition-colors">
                            Tolak
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&h=400&fit=crop" alt="Pengaduan"
                    class="w-full h-48 object-cover">
                <div class="p-4">
                    <!-- User Info -->
                    <div class="flex items-center gap-3 mb-3">
                        <div
                            class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                            S
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm">Siti XII Animasi 2</p>
                            <p class="text-xs text-gray-500">30 oktober 2025</p>
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-gray-700 text-sm mb-3 line-clamp-2">
                        Saya ingin melaporkan pintu di ruang 3 kelas XII...
                    </p>

                    <!-- Detail Link -->
                    <a href="#"
                        class="text-blue-600 text-sm font-medium hover:underline flex items-center gap-1 mb-4">
                        Detail
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </a>

                    <!-- Action Buttons -->
                    <div class="flex gap-3">
                        <button
                            class="flex-1 px-4 py-2 bg-green-400 hover:bg-green-500 text-gray-900 font-medium rounded text-sm transition-colors">
                            Terima
                        </button>
                        <button
                            class="flex-1 px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded text-sm transition-colors">
                            Tolak
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&h=400&fit=crop" alt="Pengaduan"
                    class="w-full h-48 object-cover">
                <div class="p-4">
                    <!-- User Info -->
                    <div class="flex items-center gap-3 mb-3">
                        <div
                            class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                            S
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900 text-sm">Siti XII Animasi 2</p>
                            <p class="text-xs text-gray-500">30 oktober 2025</p>
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-gray-700 text-sm mb-3 line-clamp-2">
                        Saya ingin melaporkan pintu di ruang 3 kelas XII...
                    </p>

                    <!-- Detail Link -->
                    <a href="#"
                        class="text-blue-600 text-sm font-medium hover:underline flex items-center gap-1 mb-4">
                        Detail
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </a>

                    <!-- Action Buttons -->
                    <div class="flex gap-3">
                        <button
                            class="flex-1 px-4 py-2 bg-green-400 hover:bg-green-500 text-gray-900 font-medium rounded text-sm transition-colors">
                            Terima
                        </button>
                        <button
                            class="flex-1 px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded text-sm transition-colors">
                            Tolak
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
