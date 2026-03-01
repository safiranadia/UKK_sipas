<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPAS - Data Akun Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-sm flex flex-col">
            <!-- Logo -->
            <div class="p-6 flex items-center">
                <div class="flex items-center text-blue-600">
                    <svg class="w-8 h-8 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <span class="text-2xl font-bold tracking-tight">SIPAS</span>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-4 space-y-2">
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Dashboard
                </a>

                <!-- Pengaduan with submenu -->
                <div class="space-y-1">
                    <a href="#" class="flex items-center justify-between px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg font-medium transition-colors">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Pengaduan
                        </div>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                </div>

                <a href="#" class="flex items-center gap-3 px-4 py-3 bg-blue-50 text-blue-600 rounded-lg font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Akun siswa
                </a>

                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Laporan
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col overflow-hidden">
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
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
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Data Akun Siswa</h2>

                <!-- Search Section -->
                <div class="flex items-center gap-4 mb-8">
                    <div class="flex-1 relative">
                        <input
                            type="text"
                            placeholder="Cari nama atau username"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all text-gray-600 placeholder-gray-400 italic">
                    </div>
                    <button class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                        Filter
                    </button>
                </div>

                <!-- Table Card -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Daftar Akun Terbaru</h3>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-blue-200 text-gray-900">
                                    <th class="px-6 py-4 text-left text-sm font-semibold">No</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold">Nama Siswa</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold">NISN</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold">Kelas</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold">Email</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-900">1</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-900">1</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-900">1</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-900">1</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-900">1</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-900">1</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-900">1</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-900">1</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-900">1</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-900">1</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-900">1</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-900">1</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                                </tr>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 text-sm text-gray-900">1</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>