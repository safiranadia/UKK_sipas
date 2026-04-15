@extends('admin.layouts.index')

@section('title', 'Daftar Pengaduan')

@section('content')
    <!-- Content -->
    <div class="flex-1 overflow-auto p-8">
        <!-- Title -->
        <h2 class="text-2xl font-bold text-gray-900 mb-6 font-primary">Manajemen Pengaduan</h2>

        <!-- Filter Status -->
        <div class="flex flex-wrap items-center gap-3 mb-8">
            <a href="{{ route('admin.reports.index') }}"
                class="px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 {{ !request('status') ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'bg-white text-gray-600 hover:bg-gray-50 border border-gray-100' }}">
                Semua
            </a>
            <a href="{{ route('admin.reports.index', ['status' => 'pending']) }}"
                class="px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 {{ request('status') == 'pending' ? 'bg-danger text-white shadow-lg shadow-danger/20' : 'bg-white text-gray-600 hover:bg-gray-50 border border-gray-100' }}">
                Baru
            </a>
            <a href="{{ route('admin.reports.index', ['status' => 'approved']) }}"
                class="px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 {{ request('status') == 'approved' ? 'bg-gray-500 text-white shadow-lg shadow-gray-200' : 'bg-white text-gray-600 hover:bg-gray-50 border border-gray-100' }}">
                Disetujui
            </a>
            <a href="{{ route('admin.reports.index', ['status' => 'in_progress']) }}"
                class="px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 {{ request('status') == 'in_progress' ? 'bg-warning text-white shadow-lg shadow-warning/20' : 'bg-white text-gray-600 hover:bg-gray-50 border border-gray-100' }}">
                Diproses
            </a>
            <a href="{{ route('admin.reports.index', ['status' => 'resolved']) }}"
                class="px-5 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 {{ request('status') == 'resolved' ? 'bg-success text-white shadow-lg shadow-success/20' : 'bg-white text-gray-600 hover:bg-gray-50 border border-gray-100' }}">
                Selesai
            </a>
        </div>

        <!-- Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse ($reports as $report)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col group hover:shadow-md transition-all duration-300">
                    <!-- Image Area -->
                    <div class="relative h-48 overflow-hidden">
                        @if (!empty($report->bukti) && isset($report->bukti[0]))
                            <img src="{{ asset('storage/' . $report->bukti[0]['path']) }}" alt="Bukti"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gray-50 flex items-center justify-center text-gray-300">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                        
                        <!-- Mini Badge Status -->
                        <div class="absolute top-3 right-3">
                            @php
                                $statusMap = [
                                    'pending' => ['label' => 'Baru', 'color' => 'bg-danger'],
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
                            <div class="w-9 h-9 rounded-xl bg-blue-600 flex items-center justify-center text-white font-bold text-sm shadow-sm">
                                {{ substr($report->user->username ?? 'U', 0, 1) }}
                            </div>
                            <div class="overflow-hidden">
                                <p class="text-sm font-bold text-gray-900 truncate">{{ $report->user->username ?? 'Unknown' }}</p>
                                <p class="text-[10px] text-gray-400 font-medium">{{ $report->created_at->translatedFormat('d M Y, H:i') }}</p>
                            </div>
                        </div>

                        <!-- Facility Info -->
                        <div class="mb-3">
                            <h3 class="text-sm font-bold text-gray-900 line-clamp-1 mb-1">{{ $report->nama_fasilitas }}</h3>
                            <p class="text-[11px] text-blue-600 font-semibold mb-2">{{ $report->categoryReport->nama_kategori ?? 'Fasilitas' }}</p>
                            <p class="text-xs text-gray-500 line-clamp-2 leading-relaxed">{{ $report->deskripsi }}</p>
                        </div>

                        <!-- Actions -->
                        <div class="mt-auto pt-4 flex flex-col gap-3 border-t border-gray-50">
                            <div class="flex items-center gap-4">
                                <x-modal-progres :report="$report" variant="link" triggerText="Lihat Detail" 
                                    class="text-xs font-bold text-blue-600 hover:text-blue-700 p-0 justify-start h-auto bg-transparent border-none shadow-none" />
                            </div>
                            
                            <div class="grid grid-cols-1 gap-2">
                                @if($report->status == 'pending' || $report->status == 'approved')
                                    <form id="status-form-{{ $report->id }}" action="{{ route('admin.reports.updateStatus', $report->id) }}" method="POST" class="grid grid-cols-1" x-data>
                                        @csrf
                                        <input type="hidden" name="status" id="status-input-{{ $report->id }}" value="">
                                        @if($report->status == 'pending')
                                            <button type="button" 
                                                @click="
                                                    document.getElementById('status-input-{{ $report->id }}').value = 'approved';
                                                    $dispatch('confirm', {
                                                        title: 'Verifikasi Laporan',
                                                        message: 'Apakah Anda yakin ingin menyetujui dan memverifikasi laporan ini?',
                                                        action: '#status-form-{{ $report->id }}',
                                                        confirmText: 'Ya, Verifikasi',
                                                        type: 'info'
                                                    })
                                                "
                                                class="px-3 py-2 bg-gray-50 text-gray-600 hover:bg-gray-500 hover:text-white rounded-xl text-[10px] font-bold uppercase transition-all duration-200">
                                                Setujui & Verifikasi
                                            </button>
                                        @elseif($report->status == 'approved')
                                            <button type="button" 
                                                @click="
                                                    document.getElementById('status-input-{{ $report->id }}').value = 'in_progress';
                                                    $dispatch('confirm', {
                                                        title: 'Mulai Perbaikan',
                                                        message: 'Tandai laporan ini sebagai sedang dalam perbaikan?',
                                                        action: '#status-form-{{ $report->id }}',
                                                        confirmText: 'Mulai Sekarang',
                                                        type: 'info'
                                                    })
                                                "
                                                class="px-3 py-2 bg-warning/10 text-warning hover:bg-warning hover:text-white rounded-xl text-[10px] font-bold uppercase transition-all duration-200">
                                                Mulai Perbaikan
                                            </button>
                                        @endif
                                    </form>
                                @elseif($report->status == 'in_progress')
                                    <x-modal-solve :report="$report" isAdmin="true" variant="button" triggerText="Selesaikan Laporan" />
                                @elseif($report->status == 'resolved')
                                    <x-modal-solve :report="$report" isAdmin="true" variant="button" triggerText="Lihat Solusi" />
                                    <div class="text-center py-2 bg-success/5 rounded-xl text-[9px] font-bold text-success uppercase tracking-widest border border-success/10">
                                        Laporan Selesai
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 bg-white rounded-3xl border border-dashed border-gray-200 text-center">
                    <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                    </div>
                    <p class="text-gray-400 font-medium">Tidak ada pengaduan yang ditemukan dalam kategori ini.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
