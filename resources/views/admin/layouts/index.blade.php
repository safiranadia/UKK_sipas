<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPAS - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
    @stack('style')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-sm flex flex-col">
            <!-- Logo -->
            <div class="p-6 flex items-center">
                <div class="flex items-center text-blue-600">
                    <svg class="w-8 h-8 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                    <span class="text-2xl font-bold tracking-tight">SIPAS</span>
                </div>
            </div>

             <!-- Navigation -->
            <nav class="flex-1 px-4 py-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    Dashboard
                </a>

                <a href="{{ route('admin.reports.index') }}"
                    class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('admin.reports.*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    Pengaduan
                </a>

                <a href="{{ route('starbhak') }}"
                    class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('starbhak*') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-50' }} rounded-lg font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                        </path>
                    </svg>
                    Chat Pengaduan
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Akun siswa
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm px-8 py-4 flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <h1 class="text-xl font-bold text-gray-900">Hallo, <span class="font-semibold">Administrator</span>
                    </h1>
                    <span class="text-gray-500 text-sm ml-2">Sabtu, 30 oktober 2025</span>
                </div>
                <div class="flex items-center gap-4">
                    <!-- Notification -->
                    <div x-data="{ openNotify: false }" class="relative">
                        <button @click="openNotify = !openNotify" class="relative p-2 text-gray-600 hover:bg-gray-100 rounded-full transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                </path>
                            </svg>
                            @if(isset($unreadReports) && $unreadReports->count() > 0)
                                <span class="absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 border-2 border-white rounded-full"></span>
                            @endif
                        </button>

                        <!-- Notification Dropdown -->
                        <div x-show="openNotify" @click.away="openNotify = false" x-cloak
                            class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-xl border border-gray-100 overflow-hidden z-50">
                            <div class="p-4 border-b border-gray-100 flex justify-between items-center">
                                <h3 class="font-bold text-gray-900">Notifikasi Terbaru</h3>
                                <span class="px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full text-[10px] uppercase font-bold">
                                    {{ $unreadReports->count() ?? 0 }} Laporan
                                </span>
                            </div>
                            <div class="max-h-96 overflow-y-auto">
                                @forelse($unreadReports ?? [] as $report)
                                    <a href="{{ route('admin.mark-as-read', $report->id) }}" class="block p-4 hover:bg-gray-50 transition-colors border-b border-gray-50">
                                        <div class="flex gap-3">
                                            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                                                {{ substr($report->user->username ?? 'U', 0, 1) }}
                                            </div>
                                            <div class="overflow-hidden">
                                                <p class="text-sm font-semibold text-gray-900 truncate">{{ $report->nama_fasilitas }}</p>
                                                <p class="text-xs text-gray-500 line-clamp-1 mt-0.5">{{ $report->deskripsi }}</p>
                                                <p class="text-[10px] text-gray-400 mt-2 uppercase font-medium">{{ $report->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <div class="p-8 text-center">
                                        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-500 text-sm">Tidak ada laporan baru.</p>
                                    </div>
                                @endforelse
                            </div>
                            @if(isset($unreadReports) && $unreadReports->count() > 0)
                                <div class="p-2 bg-gray-50 text-center border-t border-gray-100">
                                    <p class="text-[10px] text-gray-400 italic">Klik laporan untuk menandai sudah dibaca</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- Avatar -->
                    <div
                        class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-semibold">
                        AD
                    </div>
                </div>
            </header>
            @yield('content')
        </main>
    </div>

    @stack('script')
</body>

</html>