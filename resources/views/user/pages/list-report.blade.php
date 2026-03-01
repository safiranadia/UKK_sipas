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
                    <a href="#" class="text-gray-900 font-medium border-b-2 border-gray-900 pb-1">Pengaduan saya</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900 font-medium transition-colors">History</a>
                </div>

                <!-- User Avatar -->
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-semibold text-lg">
                        S
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Pengaduan saya</h1>
            <p class="text-gray-600">
                Berikut adalah daftar pengaduan yang telah Anda sampaikan. Anda dapat melihat status dan detail dari setiap pengaduan.
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
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&h=400&fit=crop" alt="Pengaduan" class="w-full h-48 object-cover rounded-lg">
                    </div>

                    <!-- Description -->
                    <p class="text-gray-700 mb-3 text-sm leading-relaxed">
                        Saya ingin melaporkan pintu di ruang 3 kelas XII Animasi 2 rusak, mohon ditindak lanjuti.
                    </p>

                    <!-- Link Detail -->
                    <a href="#" class="text-blue-600 text-sm hover:underline mb-4 inline-block">Lihat Detail</a>

                    <!-- Button Chat -->
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg flex items-center justify-center gap-2 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Buka Chat
                    </button>
                </div>
            </div>

            <!-- Card 2 -->
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
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&h=400&fit=crop" alt="Pengaduan" class="w-full h-48 object-cover rounded-lg">
                    </div>

                    <!-- Description -->
                    <p class="text-gray-700 mb-3 text-sm leading-relaxed">
                        Saya ingin melaporkan pintu di ruang 3 kelas XII Animasi 2 rusak, mohon ditindak lanjuti.
                    </p>

                    <!-- Link Detail -->
                    <a href="#" class="text-blue-600 text-sm hover:underline mb-4 inline-block">Lihat Detail</a>

                    <!-- Button Chat -->
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg flex items-center justify-center gap-2 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Buka Chat
                    </button>
                </div>
            </div>

            <!-- Card 3 -->
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
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&h=400&fit=crop" alt="Pengaduan" class="w-full h-48 object-cover rounded-lg">
                    </div>

                    <!-- Description -->
                    <p class="text-gray-700 mb-3 text-sm leading-relaxed">
                        Saya ingin melaporkan pintu di ruang 3 kelas XII Animasi 2 rusak, mohon ditindak lanjuti.
                    </p>

                    <!-- Link Detail -->
                    <a href="#" class="text-blue-600 text-sm hover:underline mb-4 inline-block">Lihat Detail</a>

                    <!-- Button Chat -->
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg flex items-center justify-center gap-2 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Buka Chat
                    </button>
                </div>
            </div>

            <!-- Card 4 -->
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
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&h=400&fit=crop" alt="Pengaduan" class="w-full h-48 object-cover rounded-lg">
                    </div>

                    <!-- Description -->
                    <p class="text-gray-700 mb-3 text-sm leading-relaxed">
                        Saya ingin melaporkan pintu di ruang 3 kelas XII Animasi 2 rusak, mohon ditindak lanjuti.
                    </p>

                    <!-- Link Detail -->
                    <a href="#" class="text-blue-600 text-sm hover:underline mb-4 inline-block">Lihat Detail</a>

                    <!-- Button Chat -->
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg flex items-center justify-center gap-2 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Buka Chat
                    </button>
                </div>
            </div>
        </div>
    </main>
</body>

</html>