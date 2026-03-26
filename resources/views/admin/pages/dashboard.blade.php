@extends('admin.layouts.index')

@section('title', 'Dashboard')

@section('content')
    <!-- Content -->
    <div class="flex-1 overflow-auto p-8">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Pengaduan -->
            <div class="bg-white rounded-lg shadow-sm p-6 text-center border border-gray-200">
                <p class="text-gray-600 text-sm mb-2">Total Pengaduan</p>
                <p class="text-4xl font-bold text-blue-600">{{ $totalReports }}</p>
            </div>

            <!-- Pengaduan Baru -->
            <div class="bg-white rounded-lg shadow-sm p-6 text-center border border-gray-200">
                <p class="text-gray-600 text-sm mb-2">Pengaduan Baru</p>
                <p class="text-4xl font-bold text-blue-600">{{ $totalNewReport }}</p>
            </div>

            <!-- Pengaduan Proses -->
            <div class="bg-white rounded-lg shadow-sm p-6 text-center border border-gray-200">
                <p class="text-gray-600 text-sm mb-2">Pengaduan proses</p>
                <p class="text-4xl font-bold text-blue-600">{{ $totalProcessReport }}</p>
            </div>

            <!-- Pengaduan Selesai -->
            <div class="bg-white rounded-lg shadow-sm p-6 text-center border border-gray-200">
                <p class="text-gray-600 text-sm mb-2">Pengaduan Selesai</p>
                <p class="text-4xl font-bold text-blue-600">{{ $totalDoneReport }}</p>
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
                    @foreach ($newReport as $report)
                        <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition-colors">
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">{{ $report->nama_fasilitas }}</h3>
                                <p class="text-sm text-gray-500">{{ $report->user->username }} -
                                    {{ $report->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="flex items-center gap-4">
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-medium">
                                    {{ $report->status }}
                                </span>
                                <x-modal-progres :report="$report" variant="link" triggerText="Detail"
                                    class="text-gray-500 text-sm hover:text-blue-600" />
                            </div>
                        </div>
                    @endforeach
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
                labels: @json($chartLabels),
                datasets: [{
                    label: 'Jumlah Pengaduan',
                    data: @json($chartData),
                    backgroundColor: '#3B82F6',
                    borderColor: '#3B82F6',
                    borderWidth: 1,
                    borderRadius: 5,
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