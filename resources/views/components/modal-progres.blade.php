@props([
    'triggerText' => 'Lihat Detail',
    'report' => null, // Model report_facilities
    'variant' => 'button' // 'button' or 'link'
])

@php
    // Status mapping untuk warna dan label
    $statusConfig = [
        'pending' => [
            'label' => 'Menunggu',
            'class' => 'bg-warning/10 text-warning border-warning/20',
        ],
        'approved' => [
            'label' => 'Disetujui',
            'class' => 'bg-primary/10 text-primary border-primary/20',
        ],
        'in_progress' => [
            'label' => 'Diproses',
            'class' => 'bg-primary/10 text-primary border-primary/20',
        ],
        'resolved' => [
            'label' => 'Selesai',
            'class' => 'bg-success/10 text-success border-success/20',
        ],
    ];

    $status = $report->status ?? 'pending';
    $statusLabel = $statusConfig[$status]['label'] ?? 'Unknown';
    $statusClass = $statusConfig[$status]['class'] ?? $statusConfig['pending']['class'];

    $triggerClasses = $variant === 'link' 
        ? 'text-blue-600 text-sm hover:underline mb-4 inline-block'
        : 'inline-flex items-center gap-2 px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-blue-800 transition-all shadow-md shadow-blue-900/20 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary';
@endphp

<div id="modal-progres-{{ $report->id ?? 'default' }}" 
     x-data="{ open: false }" 
     x-init="$watch('open', value => document.body.style.overflow = value ? 'hidden' : '')"
     @open-modal-progress-{{ $report->id ?? 'default' }}.window="open = true"
     @keydown.escape.window="open = false" 
     x-cloak>

    <!-- Trigger Button -->
    <button @click="open = true" type="button" {{ $attributes->merge(['class' => $triggerClasses]) }}>
        @if($variant === 'button')
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
        @endif
        {{ $triggerText }}
    </button>

    <!-- Backdrop -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm z-40" @click="open = false">
    </div>

    <!-- Modal Content -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="fixed inset-0 z-50 overflow-y-auto" role="dialog" aria-modal="true">

        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div
                class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-2xl transition-all sm:my-8 w-full sm:max-w-3xl">

                <!-- Modal Header -->
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-primary/10 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Detail Laporan</h3>
                            <p class="text-xs text-gray-500">ID: #{{ $report->id ?? '000' }}</p>
                        </div>
                    </div>
                    <button @click="open = false" type="button"
                        class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">

                    <!-- Info Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-6">
                        <!-- Pelapor -->
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-xs font-medium text-gray-500 mb-1 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Pelapor
                            </p>
                            <p class="text-sm font-semibold text-gray-900">{{ $report->user->username ?? 'Unknown' }}</p>
                        </div>

                        <!-- Tanggal Laporan -->
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-xs font-medium text-gray-500 mb-1 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Tanggal Laporan
                            </p>
                            <p class="text-sm text-gray-700">
                                {{ $report->tanggal_laporan ? \Carbon\Carbon::parse($report->tanggal_laporan)->format('d F Y, H:i') : '-' }}
                                WIB
                            </p>
                        </div>

                        <!-- Status -->
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-xs font-medium text-gray-500 mb-1 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Status
                            </p>
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border {{ $statusClass }}">
                                {{ $statusLabel }}
                            </span>
                        </div>

                        <!-- Nama Fasilitas -->
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-xs font-medium text-gray-500 mb-1 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                Nama Fasilitas
                            </p>
                            <p class="text-sm font-semibold text-gray-900">{{ $report->nama_fasilitas ?? '-' }}</p>
                        </div>

                        <!-- Kategori -->
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-xs font-medium text-gray-500 mb-1 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                                Kategori
                            </p>
                            <p class="text-sm text-gray-700">{{ $report->categoryReport->nama_kategori ?? '-' }}</p>
                        </div>

                        <!-- Lokasi -->
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-xs font-medium text-gray-500 mb-1 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Lokasi
                            </p>
                            <p class="text-sm text-gray-700">{{ $report->lokasi ?? '-' }}</p>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-6">
                        <p class="text-sm font-semibold text-gray-900 mb-2 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h7" />
                            </svg>
                            Deskripsi Laporan
                        </p>
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-100">
                            <p class="text-sm text-gray-700 leading-relaxed whitespace-pre-line">
                                {{ $report->deskripsi ?? '-' }}</p>
                        </div>
                    </div>

                    <!-- File Bukti dengan Carousel (JSON) -->
                    <div>
                        <p class="text-sm font-semibold text-gray-900 mb-3 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Bukti Pendukung
                        </p>
                        <x-file-carousel :buktiJson="$report->bukti ?? '[]'" />
                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
                    <p class="text-xs text-gray-400">
                        Dilaporkan pada {{ $report->created_at?->format('d M Y H:i') ?? '-' }}
                    </p>
                    <div class="flex gap-2 flex-wrap sm:flex-nowrap">
                        <button @click="open = false" type="button"
                            class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary h-auto">
                            Tutup
                        </button>
                        <!-- @if (in_array($status, ['pending', 'approved']))
                            <button type="button"
                                class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium hover:bg-blue-800 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                Proses Laporan
                            </button>
                        @endif -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
