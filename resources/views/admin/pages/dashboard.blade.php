@extends('admin.layouts.index')

@section('title', 'Dashboard')

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
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Pengaduan -->
            <div class="bg-white rounded-lg shadow-sm p-6 text-center border border-gray-200">
                <p class="text-gray-600 text-sm mb-2">Total Pengaduan</p>
                <p class="text-4xl font-bold text-blue-600">100</p>
            </div>

            <!-- Pengaduan Baru -->
            <div class="bg-white rounded-lg shadow-sm p-6 text-center border border-gray-200">
                <p class="text-gray-600 text-sm mb-2">Pengaduan Baru</p>
                <p class="text-4xl font-bold text-blue-600">50</p>
            </div>

            <!-- Pengaduan Proses -->
            <div class="bg-white rounded-lg shadow-sm p-6 text-center border border-gray-200">
                <p class="text-gray-600 text-sm mb-2">Pengaduan proses</p>
                <p class="text-4xl font-bold text-blue-600">25</p>
            </div>

            <!-- Pengaduan Selesai -->
            <div class="bg-white rounded-lg shadow-sm p-6 text-center border border-gray-200">
                <p class="text-gray-600 text-sm mb-2">Pengaduan Selesai</p>
                <p class="text-4xl font-bold text-blue-600">30</p>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Pengaduan Terbaru -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                    <h2 class="text-lg font-bold text-gray-900">Pengduan Terbaru</h2>
                    <a href="#" class="text-blue-600 text-sm hover:underline">Lihat Semua</a>
                </div>

                <div class="divide-y divide-gray-200">
                    <!-- Item 1 -->
                    <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Keran Kamar Mandi Bocor</h3>
                            <p class="text-sm text-gray-500">Siti XII RPL 2 - 2 jam lalu</p>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">
                                Menunggu
                            </span>
                            <a href="#" class="text-gray-500 text-sm hover:text-blue-600">Detail</a>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Lampu kelas mati</h3>
                            <p class="text-sm text-gray-500">Ahmad XII RPL 4 - 6 jam lalu</p>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">
                                Selesai
                            </span>
                            <a href="#" class="text-gray-500 text-sm hover:text-blue-600">Detail</a>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Pintu kelas rusak</h3>
                            <p class="text-sm text-gray-500">Ayu XII TKJ 3 - 5 jam lalu</p>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">
                                Diproses
                            </span>
                            <a href="#" class="text-gray-500 text-sm hover:text-blue-600">Detail</a>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Ac ruang 30 mati</h3>
                            <p class="text-sm text-gray-500">Siti XII Animasi 2 - 1 jam lalu</p>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-medium">
                                Diproses
                            </span>
                            <a href="#" class="text-gray-500 text-sm hover:text-blue-600">Detail</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik Minggu ini -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-bold text-gray-900 mb-6">Grafik Minggu ini</h2>
                <div class="h-64">
                    <canvas id="weeklyChart"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
        // Chart.js configuration
        const ctx = document.getElementById('weeklyChart').getContext('2d');
        const weeklyChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                datasets: [{
                    label: 'Pengaduan',
                    data: [0.8, 1.9, 0.7, 1.5, 1.0, 1.4, 2.0],
                    backgroundColor: '#0056b3',
                    borderColor: '#0056b3',
                    borderWidth: 1,
                    barPercentage: 0.8,
                    categoryPercentage: 0.9
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 2,
                        ticks: {
                            stepSize: 1,
                            font: {
                                size: 12
                            }
                        },
                        grid: {
                            color: '#e5e7eb'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    </script>
    
@endpush