<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPAS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen">
    <!-- Navbar - Sticky -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="flex items-center text-blue-600">
                        <svg class="w-8 h-8 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <span class="text-2xl font-bold tracking-tight">SIPAS</span>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex space-x-8">
                    <a href="#" class="text-gray-600 hover:text-gray-900 font-medium transition-colors">Buat pengaduan</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900 font-medium transition-colors">Pengaduan saya</a>
                    <a href="#" class="text-gray-900 font-medium border-b-2 border-gray-900 pb-1">History</a>
                </div>

                <!-- User Avatar -->
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-semibold text-lg">
                        U
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Section -->
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
                    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=250&fit=crop" alt="Pengaduan" class="w-full h-40 object-cover">
                </div>

                <!-- Content -->
                <div class="p-4">
                    <!-- User Info & Status -->
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-xs font-bold">
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

            <!-- Card 2 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <!-- Image -->
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=250&fit=crop" alt="Pengaduan" class="w-full h-40 object-cover">
                </div>

                <!-- Content -->
                <div class="p-4">
                    <!-- User Info & Status -->
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-xs font-bold">
                                S
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-900">Siti XII Animasi 2</p>
                                <p class="text-xs text-gray-500">30 oktober 2025</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded text-xs font-medium">
                            Selesai
                        </span>
                    </div>

                    <!-- Description -->
                    <p class="text-gray-700 text-sm mb-3 line-clamp-2">
                        Saya ingin melaporkan kamar mandi di lantai 3 dekat tangga...
                    </p>

                    <!-- Link -->
                    <a href="#" class="text-blue-600 text-sm font-medium hover:underline flex items-center gap-1">
                        Lihat Detail
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <!-- Image -->
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=250&fit=crop" alt="Pengaduan" class="w-full h-40 object-cover">
                </div>

                <!-- Content -->
                <div class="p-4">
                    <!-- User Info & Status -->
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-xs font-bold">
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

            <!-- Card 4 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <!-- Image -->
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=250&fit=crop" alt="Pengaduan" class="w-full h-40 object-cover">
                </div>

                <!-- Content -->
                <div class="p-4">
                    <!-- User Info & Status -->
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-xs font-bold">
                                S
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-900">Siti XII Animasi 2</p>
                                <p class="text-xs text-gray-500">30 oktober 2025</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded text-xs font-medium">
                            Selesai
                        </span>
                    </div>

                    <!-- Description -->
                    <p class="text-gray-700 text-sm mb-3 line-clamp-2">
                        Saya ingin melaporkan kamar mandi di lantai 3 dekat tangga...
                    </p>

                    <!-- Link -->
                    <a href="#" class="text-blue-600 text-sm font-medium hover:underline flex items-center gap-1">
                        Lihat Detail
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <!-- Image -->
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=250&fit=crop" alt="Pengaduan" class="w-full h-40 object-cover">
                </div>

                <!-- Content -->
                <div class="p-4">
                    <!-- User Info & Status -->
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-xs font-bold">
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

            <!-- Card 6 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <!-- Image -->
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=250&fit=crop" alt="Pengaduan" class="w-full h-40 object-cover">
                </div>

                <!-- Content -->
                <div class="p-4">
                    <!-- User Info & Status -->
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-xs font-bold">
                                S
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-900">Siti XII Animasi 2</p>
                                <p class="text-xs text-gray-500">30 oktober 2025</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded text-xs font-medium">
                            Selesai
                        </span>
                    </div>

                    <!-- Description -->
                    <p class="text-gray-700 text-sm mb-3 line-clamp-2">
                        Saya ingin melaporkan kamar mandi di lantai 3 dekat tangga...
                    </p>

                    <!-- Link -->
                    <a href="#" class="text-blue-600 text-sm font-medium hover:underline flex items-center gap-1">
                        Lihat Detail
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Card 7 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <!-- Image -->
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=250&fit=crop" alt="Pengaduan" class="w-full h-40 object-cover">
                </div>

                <!-- Content -->
                <div class="p-4">
                    <!-- User Info & Status -->
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-xs font-bold">
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

            <!-- Card 8 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <!-- Image -->
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=250&fit=crop" alt="Pengaduan" class="w-full h-40 object-cover">
                </div>

                <!-- Content -->
                <div class="p-4">
                    <!-- User Info & Status -->
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-xs font-bold">
                                S
                            </div>
                            <div>
                                <p class="text-xs font-semibold text-gray-900">Siti XII Animasi 2</p>
                                <p class="text-xs text-gray-500">30 oktober 2025</p>
                            </div>
                        </div>
                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded text-xs font-medium">
                            Selesai
                        </span>
                    </div>

                    <!-- Description -->
                    <p class="text-gray-700 text-sm mb-3 line-clamp-2">
                        Saya ingin melaporkan kamar mandi di lantai 3 dekat tangga...
                    </p>

                    <!-- Link -->
                    <a href="#" class="text-blue-600 text-sm font-medium hover:underline flex items-center gap-1">
                        Lihat Detail
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>