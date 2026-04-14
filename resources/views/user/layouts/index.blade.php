<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPAS | @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }

        /* Hide default date picker icon */
        input[type="date"]::-webkit-calendar-picker-indicator {
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen">
    <x-toast />
    <x-confirm-modal />
    
    <!-- Navbar - Sticky (tetap terlihat saat scroll) -->
    <nav class="bg-white shadow-sm sticky top-0 z-40">
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
                    <a href="{{ route('siswa.home') }}" 
                       class="{{ request()->routeIs('siswa.home') ? 'text-gray-900 border-b-2 border-gray-900 pb-1' : 'text-gray-600 hover:text-gray-900' }} font-medium transition-colors">
                       Buat pengaduan
                    </a>
                    <a href="{{ route('siswa.reports.index') }}" 
                       class="{{ request()->routeIs('siswa.reports.index') ? 'text-gray-900 border-b-2 border-gray-900 pb-1' : 'text-gray-600 hover:text-gray-900' }} font-medium transition-colors">
                       Pengaduan saya
                    </a>
                    <a href="{{ route('siswa.history') }}" 
                       class="{{ request()->routeIs('siswa.history') ? 'text-gray-900 border-b-2 border-gray-900 pb-1' : 'text-gray-600 hover:text-gray-900' }} font-medium transition-colors">
                       History
                    </a>
                </div>

                <!-- User Profile & Dropdown -->
                <div class="flex items-center" x-data="{ open: false }" @click.outside="open = false">
                    <div class="relative">
                        <button @click="open = !open" 
                            class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-semibold text-lg shadow-md hover:bg-blue-700 transition-all">
                            {{ substr(Auth::user()->username ?? 'S', 0, 1) }}
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" 
                            x-cloak
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 mt-2 w-48 rounded-2xl bg-white shadow-xl border border-gray-100 py-2 z-50">
                            
                            <div class="px-4 py-2 border-b border-gray-50 mb-1">
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">Akun Anda</p>
                                <p class="text-sm font-bold text-gray-900 truncate">{{ Auth::user()->username ?? 'Siswa' }}</p>
                            </div>

                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="button" 
                                    @click="$dispatch('confirm', {
                                        title: 'Peringatan',
                                        message: 'Apakah Anda yakin ingin keluar dari akun Anda sekarang?',
                                        action: '#logout-form',
                                        confirmText: 'Logout',
                                        type: 'danger'
                                    })"
                                    class="w-full text-left px-4 py-2 text-sm font-bold text-red-600 hover:bg-red-50 transition-colors flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @yield('content')
    </main>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('scripts')
</body>

</html>