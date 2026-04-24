<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        /* Custom Utilities */
        .text-gradient {
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-image: linear-gradient(to right, #004F99, #0066CC);
        }

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Custom Icon Backgrounds */
        .icon-bg-blue {
            background-color: #E6F0FA;
            color: #004F99;
        }

        .icon-bg-orange {
            background-color: #FFF4E6;
            color: #FAB95B;
        }

        .icon-bg-green {
            background-color: #E6FAE6;
            color: #08CB00;
        }
    </style>
    <title>Sipas</title>
</head>

<body class="font-sans text-secondary/800 antialiased bg-light" x-data="{ mobileMenuOpen: false }">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-light/90 backdrop-blur-md border-b border-secondary/100 transition-all duration-300"
        id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-2 cursor-pointer">
                    <div class="bg-primary text-light p-1.5 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <span class="font-bold text-2xl text-primary tracking-tight">SIPAS</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="#" class="text-secondary/600 hover:text-primary font-medium transition-colors">Beranda</a>
                    <a href="#layanan"
                        class="text-secondary/600 hover:text-primary font-medium transition-colors">Layanan</a>
                    <a href="#cara-kerja"
                        class="text-secondary/600 hover:text-primary font-medium transition-colors">Cara
                        Kerja</a>
                </div>

                @auth
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('siswa.home') }}"
                        class="px-6 py-2.5 rounded-full bg-primary text-light font-medium shadow-lg shadow-blue-900/20 hover:bg-blue-800 hover:shadow-blue-900/30 transition-all transform hover:-translate-y-0.5">Dashboard</a>
                </div>
                @else
                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('register') }}"
                        class="px-6 py-2.5 rounded-full border border-secondary/200 text-secondary/700 font-medium hover:bg-secondary/50 transition-all hover:border-secondary/300">Register</a>
                    <a href="{{ route('showLogin') }}"
                        class="px-6 py-2.5 rounded-full bg-primary text-light font-medium shadow-lg shadow-blue-900/20 hover:bg-blue-800 hover:shadow-blue-900/30 transition-all transform hover:-translate-y-0.5">Login</a>
                </div>
                @endauth

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="text-secondary/600 hover:text-primary focus:outline-none">
                        <svg x-show="!mobileMenuOpen" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="mobileMenuOpen" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Panel -->
        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-4"
            class="md:hidden bg-light border-t border-secondary/100 absolute w-full shadow-xl" style="display: none;">
            <div class="px-4 pt-2 pb-6 space-y-2">
                <a href="#"
                    class="block px-3 py-3 rounded-md text-base font-medium text-secondary/700 hover:text-primary hover:bg-blue-50">Beranda</a>
                <a href="#layanan"
                    class="block px-3 py-3 rounded-md text-base font-medium text-secondary/700 hover:text-primary hover:bg-blue-50">Layanan</a>
                <a href="#cara-kerja"
                    class="block px-3 py-3 rounded-md text-base font-medium text-secondary/700 hover:text-primary hover:bg-blue-50">Cara
                    Kerja</a>
                <div class="pt-4 flex flex-col gap-3">
                    <a href="#"
                        class="block w-full text-center px-4 py-3 rounded-full border border-secondary/200 text-secondary/700 font-medium">Register</a>
                    <a href="#"
                        class="block w-full text-center px-4 py-3 rounded-full bg-primary text-light font-medium shadow-md">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 lg:pt-40 lg:pb-28 overflow-hidden">
        <!-- Background decoration -->
        <div class="absolute top-0 left-1/2 w-full -translate-x-1/2 h-full z-0 pointer-events-none">
            <div
                class="absolute top-20 left-10 w-72 h-72 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob">
            </div>
            <div
                class="absolute top-20 right-10 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 data-aos="fade-up" data-aos-duration="800"
                class="text-4xl md:text-6xl font-extrabold text-secondary/900 tracking-tight mb-6 leading-tight">
                Layanan Pengaduan <br>
                <span class="text-primary">Sarana Sekolah</span>
            </h1>
            <p data-aos="fade-up" data-aos-delay="100" data-aos-duration="800"
                class="mt-4 max-w-2xl mx-auto text-xl text-secondary/500 mb-10">
                Sampaikan Aspirasi Anda dengan mudah dan transparan. Kami memastikan setiap suara didengar dan
                ditindaklanjuti.
            </p>
            <div data-aos="zoom-in" data-aos-delay="200" data-aos-duration="800">
                <a href="#"
                    class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-base font-medium rounded-full text-light bg-primary hover:bg-blue-800 md:text-lg md:px-10 shadow-lg shadow-blue-900/30 transition-all transform hover:-translate-y-1 hover:shadow-xl">
                    Sampaikan Pengaduan
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-12 bg-light border-y border-secondary/100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-secondary/100">
                <div data-aos="fade-up" data-aos-delay="0" class="p-4">
                    <div class="text-3xl md:text-4xl font-bold text-primary mb-1 counter" data-target="1588">0</div>
                    <div class="text-sm text-secondary/500 font-medium uppercase tracking-wide">Akun terdaftar</div>
                </div>
                <div data-aos="fade-up" data-aos-delay="100" class="p-4">
                    <div class="text-3xl md:text-4xl font-bold text-primary mb-1">24/7</div>
                    <div class="text-sm text-secondary/500 font-medium uppercase tracking-wide">Instansi terhubung
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="p-4">
                    <div class="text-3xl md:text-4xl font-bold text-primary mb-1">20k+</div>
                    <div class="text-sm text-secondary/500 font-medium uppercase tracking-wide">Pengguna aktif</div>
                </div>
                <div data-aos="fade-up" data-aos-delay="300" class="p-4">
                    <div class="text-3xl md:text-4xl font-bold text-primary mb-1">5.0</div>
                    <div class="text-sm text-secondary/500 font-medium uppercase tracking-wide">Rating kepuasan</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="layanan" class="py-24 bg-secondary/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 data-aos="fade-up" class="text-3xl md:text-4xl font-bold text-secondary/900 mb-4">Layanan Kami
                </h2>
                <p data-aos="fade-up" data-aos-delay="100" class="text-lg text-secondary/500">
                    Platform yang dirancang khusus untuk memudahkan pengaduan dan memastikan tindak lanjut yang cepat.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div data-aos="fade-up" data-aos-delay="0"
                    class="bg-light rounded-2xl p-8 shadow-card hover:shadow-soft transition-all duration-300 transform hover:-translate-y-2 group cursor-pointer border border-secondary/100">
                    <div
                        class="w-14 h-14 rounded-xl icon-bg-blue flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-secondary/900 mb-3">Pelaporan Cepat</h3>
                    <p class="text-secondary/500 leading-relaxed">
                        Laporkan Masalah anda dengan mudah melalui form yang tersedia.
                    </p>
                </div>

                <!-- Card 2 -->
                <div data-aos="fade-up" data-aos-delay="100"
                    class="bg-light rounded-2xl p-8 shadow-card hover:shadow-soft transition-all duration-300 transform hover:-translate-y-2 group cursor-pointer border border-secondary/100">
                    <div
                        class="w-14 h-14 rounded-xl icon-bg-orange flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-secondary/900 mb-3">Tracking Realtime</h3>
                    <p class="text-secondary/500 leading-relaxed">
                        Pantau Status pengaduan anda secara realtime dengan mudah.
                    </p>
                </div>

                <!-- Card 3 -->
                <div data-aos="fade-up" data-aos-delay="200"
                    class="bg-light rounded-2xl p-8 shadow-card hover:shadow-soft transition-all duration-300 transform hover:-translate-y-2 group cursor-pointer border border-secondary/100">
                    <div
                        class="w-14 h-14 rounded-xl icon-bg-green flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-secondary/900 mb-3">Respon Cepat</h3>
                    <p class="text-secondary/500 leading-relaxed">
                        Dapatkan tanggapan cepat dari admin yang bertugas.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="cara-kerja" class="py-24 bg-light relative">
        <!-- Connecting Line (Desktop) -->
        <div class="hidden md:block absolute top-[280px] left-0 w-full h-1 bg-secondary/100 -z-0"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-20">
                <h2 data-aos="fade-up" class="text-3xl md:text-4xl font-bold text-secondary/900 mb-4">Cara Kerja</h2>
                <p data-aos="fade-up" data-aos-delay="100" class="text-lg text-secondary/500">
                    Proses sederhana untuk menyapaikan pengaduan anda
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-12 md:gap-8">
                <!-- Step 1 -->
                <div data-aos="fade-up" data-aos-delay="0"
                    class="relative flex flex-col items-center text-center group">
                    <div
                        class="w-20 h-20 rounded-full bg-primary text-light flex items-center justify-center text-2xl font-bold shadow-lg shadow-blue-900/20 mb-6 z-10 group-hover:scale-110 transition-transform duration-300">
                        1
                    </div>
                    <h3 class="text-xl font-bold text-secondary/900 mb-2">Buat Akun</h3>
                    <p class="text-secondary/500 max-w-xs mx-auto">
                        Daftar dengan mudah menggunakan NIS & E-mail anda
                    </p>
                </div>

                <!-- Step 2 -->
                <div data-aos="fade-up" data-aos-delay="150"
                    class="relative flex flex-col items-center text-center group">
                    <div
                        class="w-20 h-20 rounded-full bg-primary text-light flex items-center justify-center text-2xl font-bold shadow-lg shadow-blue-900/20 mb-6 z-10 group-hover:scale-110 transition-transform duration-300">
                        2
                    </div>
                    <h3 class="text-xl font-bold text-secondary/900 mb-2">Tulis Laporan</h3>
                    <p class="text-secondary/500 max-w-xs mx-auto">
                        Jelaskan maslah Anda secara detail yang diperlukan.
                    </p>
                </div>

                <!-- Step 3 -->
                <div data-aos="fade-up" data-aos-delay="300"
                    class="relative flex flex-col items-center text-center group">
                    <div
                        class="w-20 h-20 rounded-full bg-primary text-light flex items-center justify-center text-2xl font-bold shadow-lg shadow-blue-900/20 mb-6 z-10 group-hover:scale-110 transition-transform duration-300">
                        3
                    </div>
                    <h3 class="text-xl font-bold text-secondary/900 mb-2">Tindak Lanjut</h3>
                    <p class="text-secondary/500 max-w-xs mx-auto">
                        Dapatkan update regular tentang progres pengaduan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-aos="zoom-in"
                class="bg-primary rounded-3xl p-12 md:p-20 text-center relative overflow-hidden shadow-2xl shadow-blue-900/20">
                <!-- Decorative circles -->
                <div
                    class="absolute top-0 left-0 w-64 h-64 bg-light opacity-5 rounded-full -translate-x-1/2 -translate-y-1/2">
                </div>
                <div
                    class="absolute bottom-0 right-0 w-96 h-96 bg-light opacity-5 rounded-full translate-x-1/3 translate-y-1/3">
                </div>

                <div class="relative z-10">
                    <h2 class="text-3xl md:text-4xl font-bold text-light mb-6">Siap Menyampaikan Aspirasi Anda?</h2>
                    <p class="text-blue-100 text-lg mb-10 max-w-2xl mx-auto">
                        Bergabunglah dengan ratusan siswa yang telah menyampaikan banyak aspirasi
                    </p>
                    <a href="#"
                        class="inline-flex items-center justify-center px-8 py-4 border-2 border-light text-base font-bold rounded-full text-primary bg-light hover:bg-blue-50 md:text-lg transition-all transform hover:scale-105 shadow-lg">
                        Mulai Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>
    <x-chatbot-widget />

    <!-- Footer -->
    <footer class="bg-secondary/50 pt-16 pb-8 border-t border-secondary/200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:justify-between gap-12 mb-12">
                <!-- Brand -->
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="bg-primary text-light p-1 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <span class="font-bold text-xl text-primary">SIPAS</span>
                    </div>
                    <p class="text-secondary/500 text-sm leading-relaxed">
                        Platform pengaduan siswa modern untuk menyuarakan aspirasi.
                    </p>
                </div>

                <!-- Social -->
                <div>
                    <h4 class="font-bold text-secondary/900 mb-4">Ikuti kami</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-secondary/400 hover:text-primary transition-colors">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        <a href="#" class="text-secondary/400 hover:text-primary transition-colors">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="#" class="text-secondary/400 hover:text-primary transition-colors">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-secondary/200 pt-8 text-center text-sm text-secondary/400">
                &copy; 2023 SIPAS. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Alpine.js for interactions -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- AOS Animation Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Initialization Scripts -->
    <script>
        // Initialize Animate On Scroll
        AOS.init({
            once: true,
            offset: 100,
            duration: 800,
            easing: 'ease-out-cubic',
        });

        // Simple Counter Animation for Stats
        const counters = document.querySelectorAll('.counter');
        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            const duration = 2000; // ms
            const increment = target / (duration / 16);

            let current = 0;
            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    counter.innerText = Math.ceil(current).toLocaleString();
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.innerText = target.toLocaleString();
                }
            };

            // Trigger when in view (Intersection Observer)
            const observer = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting) {
                    updateCounter();
                    observer.disconnect();
                }
            });
            observer.observe(counter);
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const nav = document.getElementById('navbar');
            if (window.scrollY > 10) {
                nav.classList.add('shadow-sm');
            } else {
                nav.classList.remove('shadow-sm');
            }
        });
    </script>
</body>

</html>