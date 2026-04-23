@props([
    'triggerText' => 'Detail Solusi',
    'report' => null, // Model report_facilities
    'isAdmin' => false,
    'variant' => 'link', // 'link' or 'button'
])

@php
    $solve = $report->solveReport ?? null;
    $shouldShow = ($isAdmin && $report->status === 'in_progress') || $report->status === 'resolved';
@endphp

@if ($shouldShow)
    <div x-data="{ open: false, previews: [] }" @open-modal-solve-{{ $report->id }}.window="open = true" x-cloak>

        <!-- Trigger Button -->
        @if ($variant === 'link')
            <button @click="open = true" type="button"
                class="text-success text-sm font-bold hover:underline flex items-center gap-1 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ $triggerText }}
            </button>
        @else
            <button @click="open = true" type="button"
                class="w-full px-3 py-2 bg-success/10 text-success hover:bg-success hover:text-white rounded-xl text-[10px] font-bold uppercase transition-all duration-200">
                {{ $triggerText }}
            </button>
        @endif

        <!-- Backdrop -->
        <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[60]" @click="open = false">
        </div>

        <!-- Modal Content -->
        <div x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="fixed inset-0 z-[70] overflow-y-auto" role="dialog" aria-modal="true">

            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 w-full sm:max-w-lg">

                    <!-- Header -->
                    <div
                        class="px-6 py-4 border-b border-gray-100 bg-success/5 flex justify-between items-center text-success">
                        <div class="flex items-center gap-2">
                            <div class="p-2 bg-success rounded-xl">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold uppercase tracking-wider">
                                {{ $isAdmin && $report->status === 'in_progress' ? 'Form Penyelesaian' : 'Hasil Tindak Lanjut' }}
                            </h3>
                        </div>
                        <button @click="open = false" class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    @if ($isAdmin && $report->status === 'in_progress')
                        <!-- ADMIN FORM MODE -->
                        <form id="solve-form-{{ $report->id }}"
                            action="{{ route('admin.reports.updateStatus', $report->id) }}" method="POST"
                            enctype="multipart/form-data" class="p-8 space-y-6" x-data>
                            @csrf
                            <input type="hidden" name="status" value="resolved">

                            <!-- Timeline Progress Section -->
                            <div class="mb-6">
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-4">Riwayat Laporan</p>
                                <div class="flex items-center gap-2">
                                    <!-- Step 1 -->
                                    <div class="flex items-center flex-1">
                                        <div class="w-8 h-8 rounded-full bg-success flex items-center justify-center text-white text-xs font-bold">1</div>
                                        <div class="flex-1 h-1 bg-success ml-2 mr-2"></div>
                                    </div>
                                    <!-- Step 2 -->
                                    <div class="flex items-center flex-1">
                                        <div class="w-8 h-8 rounded-full bg-success flex items-center justify-center text-white text-xs font-bold">2</div>
                                        <div class="flex-1 h-1 bg-gray-200 ml-2 mr-2"></div>
                                    </div>
                                    <!-- Step 3 -->
                                    <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs font-bold">3</div>
                                </div>
                                <div class="grid grid-cols-3 gap-2 mt-2 text-center">
                                    <div>
                                        <p class="text-xs font-semibold text-gray-900">Disetujui</p>
                                        <p class="text-[10px] text-gray-500">{{ $report->created_at?->format('d/m/y H:i') }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs font-semibold text-gray-900">Diproses</p>
                                        <p class="text-[10px] text-gray-500">{{ $report->updated_at?->format('d/m/y H:i') }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs font-semibold text-gray-400">Selesai</p>
                                        <p class="text-[10px] text-gray-400">-</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Tanggapan Section -->
                            <div>
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">Tanggapan
                                    Solusi (Wajib)</p>
                                <textarea name="tanggapan" required rows="4"
                                    placeholder="Jelaskan secara rinci tindakan perbaikan yang telah dilakukan..."
                                    class="w-full px-5 py-4 bg-gray-50/50 border border-gray-200 rounded-2xl text-sm focus:ring-2 focus:ring-success focus:bg-white focus:border-success transition-all duration-300 resize-none shadow-inner placeholder:text-gray-300"></textarea>
                            </div>

                            <!-- Bukti Section -->
                            <div>
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">Bukti
                                    Gambar (Opsional)</p>
                                <div
                                    class="group relative flex flex-col items-center justify-center px-6 py-6 border-2 border-gray-200 border-dashed rounded-2xl hover:border-success/50 hover:bg-success/[0.02] cursor-pointer transition-all duration-300">
                                    <input type="file" name="bukti[]" multiple accept="image/*"
                                        @change="
                                        previews = Array.from($event.target.files).map(file => ({
                                            url: URL.createObjectURL(file),
                                            name: file.name
                                        }))
                                    "
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                    <div class="text-center">
                                        <div class="mb-2">
                                            <div
                                                class="w-10 h-10 bg-gray-100 rounded-xl flex items-center justify-center mx-auto text-gray-400 group-hover:bg-success/10 group-hover:text-success transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M12 4v16m8-8H4" />
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="text-[11px] font-bold text-success group-hover:text-success/80">Unggah
                                            Bukti Selesai</p>
                                    </div>
                                </div>

                                <!-- Image Preview Grid -->
                                <template x-if="previews.length > 0">
                                    <div class="mt-4 grid grid-cols-3 gap-3">
                                        <template x-for="(preview, index) in previews" :key="index">
                                            <div
                                                class="relative group aspect-square rounded-xl overflow-hidden border border-gray-100">
                                                <img :src="preview.url" class="w-full h-full object-cover">
                                                <button type="button" @click="previews.splice(index, 1)"
                                                    class="absolute top-1 right-1 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </template>
                                    </div>
                                </template>
                            </div>

                            <!-- Buttons Area -->
                            <div class="flex gap-4 pt-4 border-t border-gray-50">
                                <button type="button" @click="open = false"
                                    class="px-6 py-3 bg-white border border-gray-200 text-gray-500 rounded-2xl text-xs font-bold uppercase tracking-widest hover:bg-gray-100 transition-all shadow-sm">Batal</button>
                                <button type="button"
                                    @click="$dispatch('confirm', {
                                    title: 'Selesaikan Laporan',
                                    message: 'Apakah Anda yakin ingin menandai laporan ini sebagai SELESAI? Tindakan ini akan mengirimkan notifikasi ke siswa.',
                                    action: '#solve-form-{{ $report->id }}',
                                    confirmText: 'Ya, Selesaikan',
                                    type: 'info'
                                })"
                                    class="flex-1 px-6 py-3 bg-success text-white rounded-2xl text-xs font-bold uppercase tracking-widest shadow-lg shadow-success/20 hover:bg-success/90 transition-all hover:scale-[1.02]">
                                    Simpan & Selesaikan
                                </button>
                            </div>
                        </form>
                    @else
                        <!-- READONLY MODE (USER & ADMIN RESOLVED) -->
                        <div class="p-6 space-y-6 max-h-[80vh] overflow-y-auto">
                            <!-- Status Badge -->
                            <div
                                class="inline-flex items-center px-3 py-1 bg-success/10 text-success text-[10px] font-bold uppercase rounded-full border border-success/20">
                                Laporan Selesai
                            </div>

                            <!-- Tanggapan Section -->
                            <div>
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">
                                    Penyelesaian Admin</p>
                                @if ($solve)
                                    <div
                                        class="bg-gray-50 border border-gray-100 rounded-xl p-4 text-sm text-gray-700 leading-relaxed shadow-inner font-medium italic">
                                        "{{ $solve->tanggapan }}"
                                    </div>
                                @else
                                    <div
                                        class="bg-gray-50 border border-dash border-gray-200 rounded-xl p-6 text-center text-sm text-gray-400">
                                        <p class="italic mb-2">Detail penyelesaian belum diunggah secara formal oleh
                                            petugas.</p>
                                        <p class="text-[10px] uppercase font-bold text-gray-300">Hubungi petugas untuk
                                            info lebih lanjut</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Bukti Section -->
                            @if ($solve && !empty($solve->bukti))
                                <div>
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">
                                        Dokumentasi Lapangan</p>
                                    <x-file-carousel :buktiJson="$solve->bukti" />
                                </div>
                            @endif

                            <!-- Footer Info -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-50">
                                <div class="flex items-center gap-2">
                                    @if ($solve)
                                        <div
                                            class="w-10 h-10 rounded-xl bg-success text-white flex items-center justify-center font-bold text-sm shadow-md shadow-success/20">
                                            {{ substr($solve->user->username ?? 'A', 0, 1) }}
                                        </div>
                                        <div class="overflow-hidden max-w-[120px]">
                                            <p class="text-xs font-bold text-gray-900 truncate">
                                                {{ $solve->user->username ?? 'Administrator' }}</p>
                                            <p
                                                class="text-[10px] text-gray-400 font-medium uppercase tracking-tight font-bold">
                                                Petugas Perbaikan</p>
                                        </div>
                                    @else
                                        <div
                                            class="w-10 h-10 rounded-xl bg-gray-200 text-gray-400 flex items-center justify-center">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs font-bold text-gray-400 italic font-italic">Petugas Tidak
                                                Diketahui</p>
                                            <p class="text-[10px] text-gray-300 font-medium tracking-tight">Data
                                                histori terbatas</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="text-right text-[10px] text-gray-400 font-medium leading-tight">
                                    Status Selesai Pada<br>
                                    @if ($solve)
                                        <span
                                            class="text-gray-600 font-bold uppercase tracking-tighter">{{ $solve->tanggal_tanggapan->translatedFormat('d M Y, H:i') }}</span>
                                    @else
                                        <span class="text-gray-400 font-medium italic tracking-tighter">Tanggal Tidak
                                            Tercatat</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Close Button (Inside Footer) -->
                            <div class="pt-6">
                                <button @click="open = false"
                                    class="w-full px-6 py-2.5 bg-white border border-gray-200 rounded-xl text-xs font-bold text-gray-600 hover:bg-gray-50 transition-all shadow-sm uppercase tracking-widest">
                                    Tutup Rincian
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif
