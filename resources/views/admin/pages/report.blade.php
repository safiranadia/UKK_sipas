@extends('admin.layouts.index')
@section('title', 'Daftar Pengaduan')
@section('content')
<!-- Content -->
<div class="flex-1 overflow-auto p-8">
    <!-- Title -->
    <h2 class="text-2xl font-bold text-gray-900 mb-6 font-primary">Manajemen Pengaduan</h2>

    <!-- Filter Section -->
    <form method="GET" action="{{ route('admin.reports.index') }}"
        class="grid grid-cols-1 md:grid-cols-12 gap-4 mb-8 p-6 bg-white rounded-2xl border border-gray-100 shadow-sm items-end">

        <!-- Search Filter -->
        <div class="md:col-span-4">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Pencarian</label>
            <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari laporan / nama user" onkeydown="if(event.key == 'Enter') this.form.submit()"
                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none h-[48px]">
        </div>

        <!-- Status Filter -->
        <div class="md:col-span-3">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
            <select name="status" onchange="this.form.submit()"
                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none h-[48px]">
                <option value="" {{ !$status ? 'selected' : '' }}>Semua Status</option>
                <option value="pending" {{ $status == 'pending' ? 'selected' : '' }}>Baru</option>
                <option value="approved" {{ $status == 'approved' ? 'selected' : '' }}>Disetujui</option>
                <option value="in_progress" {{ $status == 'in_progress' ? 'selected' : '' }}>Diproses</option>
                <option value="resolved" {{ $status == 'resolved' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <!-- Kategori Filter -->
        <div class="md:col-span-3">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
            <select name="category_id" onchange="this.form.submit()"
                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none h-[48px]">
                <option value="" {{ !$category_id ? 'selected' : '' }}>Semua Kategori</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->nama_kategori }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Tanggal Filter -->
        <div class="md:col-span-2">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal</label>
            <input type="date" name="filter_date" value="{{ $filter_date }}" onchange="this.form.submit()"
                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none h-[48px]">
        </div>
    </form>


    <!-- LAPORAN TERBARU (PENDING) -->
    @if($pendingReports->count() > 0)
    <div class="mb-10">
        <div class="flex items-center gap-3 mb-6">
            <div class="p-2 bg-danger/10 rounded-lg">
                <svg class="w-5 h-5 text-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900">Laporan Terbaru (Belum Diverifikasi)</h3>
            <span class="px-3 py-1 bg-danger text-white rounded-full text-xs font-bold">{{ $pendingReports->count() }} Laporan</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($pendingReports as $report)
            <div
                class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col group hover:shadow-md transition-all duration-300">
                <!-- Image Area -->
                <div class="relative h-48 overflow-hidden">
                    @if (!empty($report->bukti) && isset($report->bukti[0]))
                    <img src="{{ asset('storage/' . $report->bukti[0]['path']) }}" alt="Bukti"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                    <div class="w-full h-full bg-gray-50 flex items-center justify-center text-gray-300">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    @endif

                    <!-- Mini Badge Status -->
                    <div class="absolute top-3 right-3">
                        <span class="px-2.5 py-1 bg-danger text-white text-[10px] font-bold uppercase tracking-wider rounded-lg shadow-sm">
                            Baru
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-5 flex-1 flex flex-col">
                    <!-- User & Meta -->
                    <div class="flex items-center gap-3 mb-4">
                        <div
                            class="w-9 h-9 rounded-xl bg-blue-600 flex items-center justify-center text-white font-bold text-sm shadow-sm">
                            {{ substr($report->user->username ?? 'U', 0, 1) }}
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-sm font-bold text-gray-900 truncate">
                                {{ $report->user->username ?? 'Unknown' }}
                            </p>
                            <p class="text-[10px] text-gray-400 font-medium">
                                {{ $report->created_at->translatedFormat('d M Y, H:i') }}
                            </p>
                        </div>
                    </div>

                    <!-- Facility Info -->
                    <div class="mb-3">
                        <h3 class="text-sm font-bold text-gray-900 line-clamp-1 mb-1">{{ $report->nama_fasilitas }}
                        </h3>
                        <p class="text-[11px] text-blue-600 font-semibold mb-2">
                            {{ $report->categoryReport->nama_kategori ?? 'Fasilitas' }}
                        </p>
                        <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed">{{ $report->deskripsi }}</p>
                    </div>

                    <!-- Actions -->
                    <div class="mt-auto pt-4 flex flex-col gap-3 border-t border-gray-50">
                        <div class="flex items-center gap-4">
                            <x-modal-progres :report="$report" variant="link" triggerText="Lihat & Verifikasi"
                                class="text-xs font-bold text-blue-600 hover:text-blue-700 p-0 justify-start h-auto bg-transparent border-none shadow-none" />
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif


    <!-- LAPORAN SUDAH DIPROSES -->
    <div>
        <div class="flex items-center gap-3 mb-6">
            <div class="p-2 bg-blue-50 rounded-lg">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900">Laporan Sudah Diverifikasi</h3>
            <span class="px-3 py-1 bg-blue-600 text-white rounded-full text-xs font-bold">{{ $processedReports->count() }} Laporan</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse ($processedReports as $report)
            <div
                class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col group hover:shadow-md transition-all duration-300">
                <!-- Image Area -->
                <div class="relative h-48 overflow-hidden">
                    @if (!empty($report->bukti) && isset($report->bukti[0]))
                    <img src="{{ asset('storage/' . $report->bukti[0]['path']) }}" alt="Bukti"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                    <div class="w-full h-full bg-gray-50 flex items-center justify-center text-gray-300">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    @endif

                    <!-- Mini Badge Status -->
                    <div class="absolute top-3 right-3">
                        @php
                        $statusMap = [
                        'approved' => ['label' => 'Disetujui', 'color' => 'bg-gray-500'],
                        'in_progress' => ['label' => 'Diproses', 'color' => 'bg-warning'],
                        'resolved' => ['label' => 'Selesai', 'color' => 'bg-success'],
                        ];
                        $currentStatus = $statusMap[$report->status] ?? ['label' => $report->status, 'color' => 'bg-gray-400'];
                        @endphp
                        <span class="px-2.5 py-1 {{ $currentStatus['color'] }} text-white text-[10px] font-bold uppercase tracking-wider rounded-lg shadow-sm">
                            {{ $currentStatus['label'] }}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-5 flex-1 flex flex-col">
                    <!-- User & Meta -->
                    <div class="flex items-center gap-3 mb-4">
                        <div
                            class="w-9 h-9 rounded-xl bg-blue-600 flex items-center justify-center text-white font-bold text-sm shadow-sm">
                            {{ substr($report->user->username ?? 'U', 0, 1) }}
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-sm font-bold text-gray-900 truncate">
                                {{ $report->user->username ?? 'Unknown' }}
                            </p>
                            <p class="text-[10px] text-gray-400 font-medium">
                                {{ $report->created_at->translatedFormat('d M Y, H:i') }}
                            </p>
                        </div>
                    </div>

                    <!-- Facility Info -->
                    <div class="mb-3">
                        <h3 class="text-sm font-bold text-gray-900 line-clamp-1 mb-1">{{ $report->nama_fasilitas }}
                        </h3>
                        <p class="text-[11px] text-blue-600 font-semibold mb-2">
                            {{ $report->categoryReport->nama_kategori ?? 'Fasilitas' }}
                        </p>
                        <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed">{{ $report->deskripsi }}</p>
                    </div>

                    <!-- Actions -->
                    <div class="mt-auto pt-4 flex flex-col gap-3 border-t border-gray-50">
                        <div class="flex items-center gap-4">
                            <x-modal-progres :report="$report" variant="link" triggerText="Lihat Detail"
                                class="text-xs font-bold text-blue-600 hover:text-blue-700 p-0 justify-start h-auto bg-transparent border-none shadow-none" />
                        </div>

                        <div class="grid grid-cols-1 gap-2">
                            @if($report->status == 'approved')
                            <form id="status-form-{{ $report->id }}" action="{{ route('admin.reports.updateStatus', $report->id) }}" method="POST" class="grid grid-cols-1" x-data>
                                @csrf
                                <input type="hidden" name="status" id="status-input-{{ $report->id }}" value="">
                                <button type="button"
                                    @click="
                                                    document.getElementById('status-input-{{ $report->id }}').value = 'in_progress';
                                                    $dispatch('confirm', {
                                                        title: 'Mulai Perbaikan',
                                                        message: 'Tandai laporan ini sebagai sedang dalam perbaikan?',
                                                        action: '#status-form-{{ $report->id }}',
                                                        confirmText: 'Mulai Sekarang',
                                                        type: 'info'
                                                    })"
                                    class="px-3 py-2 bg-warning/10 text-warning hover:bg-warning hover:text-white rounded-xl text-[10px] font-bold uppercase transition-all duration-200">
                                    Mulai Perbaikan
                                </button>
                            </form>
                            @elseif($report->status == 'in_progress')
                            <x-modal-solve :report="$report" isAdmin="true" variant="button" triggerText="Selesaikan Laporan" />
                            @elseif($report->status == 'resolved')
                            <x-modal-solve :report="$report" isAdmin="true" variant="button" triggerText="Lihat Solusi" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-center text-gray-500 col-span-full">Tidak ada laporan yang sudah diverifikasi.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection