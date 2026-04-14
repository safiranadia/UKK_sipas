@props([
    'triggerText' => 'Lihat Detail',
    'report' => null, // Model report_facilities
    'variant' => 'button' // 'button' or 'link'
])

@php
    // Status mapping untuk warna dan label
    $statusConfig = [
        'pending' => [
            'label' => 'Baru',
            'class' => 'bg-danger/10 text-danger border-danger/20',
        ],
        'approved' => [
            'label' => 'Disetujui',
            'class' => 'bg-gray-100 text-gray-500 border-gray-200',
        ],
        'in_progress' => [
            'label' => 'Diproses',
            'class' => 'bg-warning/10 text-warning border-warning/20',
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
        ? 'text-blue-600 text-sm hover:underline inline-block'
        : 'inline-flex items-center gap-2 px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-blue-800 transition-all shadow-md shadow-blue-900/20 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary';
    
    $isResolved = ($status === 'resolved');
@endphp

<div id="modal-progres-{{ $report->id ?? 'default' }}" 
     x-data="{ 
        open: false, 
        comments: [], 
        newComment: '', 
        isSubmitting: false,
        isLoadingComments: false,
        currentUserId: {{ auth()->id() }},
        isResolved: @js($isResolved),
        
        async fetchComments() {
            this.isLoadingComments = true;
            try {
                const response = await fetch(`/report-comments/{{ $report->id }}`);
                this.comments = await response.json();
                this.$nextTick(() => this.scrollToBottom());
            } catch (error) {
                console.error('Error fetching comments:', error);
            } finally {
                this.isLoadingComments = false;
            }
        },

        async postComment() {
            if (!this.newComment.trim() || this.isSubmitting || this.isResolved) return;
            this.isSubmitting = true;
            try {
                const response = await fetch('/report-comments', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        report_facility_id: {{ $report->id }},
                        comment: this.newComment
                    })
                });
                const comment = await response.json();
                this.comments.push(comment);
                this.newComment = '';
                this.$nextTick(() => this.scrollToBottom());
            } catch (error) {
                alert('Gagal mengirim komentar.');
            } finally {
                this.isSubmitting = false;
            }
        },

        scrollToBottom() {
            const container = this.$refs.commentContainer;
            if (container) {
                container.scrollTop = container.scrollHeight;
            }
        }
     }" 
     x-init="
        $watch('open', value => {
            document.body.style.overflow = value ? 'hidden' : '';
            if(value) fetchComments();
        })
     "
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
                <div class="px-6 py-6 max-h-[85vh] overflow-y-auto">

                    <!-- Info Grid -->
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-6">
                        <!-- Pelapor -->
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-[10px] font-bold text-gray-400 uppercase mb-1">Pelapor</p>
                            <p class="text-sm font-semibold text-gray-900">{{ $report->user->username ?? 'Unknown' }}</p>
                        </div>
                        <!-- Status -->
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-[10px] font-bold text-gray-400 uppercase mb-1">Status</p>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold border {{ $statusClass }}">
                                {{ $statusLabel }}
                            </span>
                        </div>
                        <!-- Tanggal -->
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-[10px] font-bold text-gray-400 uppercase mb-1">Tanggal</p>
                            <p class="text-sm font-medium text-gray-700">{{ $report->tanggal_laporan ? \Carbon\Carbon::parse($report->tanggal_laporan)->format('d/m/y') : '-' }}</p>
                        </div>
                        <!-- Fasilitas -->
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-[10px] font-bold text-gray-400 uppercase mb-1">Fasilitas</p>
                            <p class="text-sm font-semibold text-gray-900 truncate">{{ $report->nama_fasilitas }}</p>
                        </div>
                        <!-- Kategori -->
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-[10px] font-bold text-gray-400 uppercase mb-1">Kategori</p>
                            <p class="text-sm text-gray-700 truncate">{{ $report->categoryReport->nama_kategori ?? '-' }}</p>
                        </div>
                        <!-- Lokasi -->
                        <div class="bg-gray-50 rounded-lg p-3">
                            <p class="text-[10px] font-bold text-gray-400 uppercase mb-1">Lokasi</p>
                            <p class="text-sm text-gray-700 truncate">{{ $report->lokasi ?? '-' }}</p>
                        </div>
                    </div>

                    <!-- Deskripsi & Bukti (Accordion Style) -->
                    <div x-data="{ showDetail: false }" class="mb-6">
                        <button @click="showDetail = !showDetail" class="flex items-center justify-between w-full p-3 bg-gray-50 rounded-lg text-sm font-semibold text-gray-900 outline-none">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Info Detail & Bukti
                            </span>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="showDetail ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="showDetail" x-collapse class="p-4 border border-gray-100 rounded-b-lg mt-1 space-y-4">
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase mb-2">Deskripsi</p>
                                <p class="text-sm text-gray-700 leading-relaxed">{{ $report->deskripsi }}</p>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-gray-400 uppercase mb-2">Bukti Pendukung</p>
                                <x-file-carousel :buktiJson="$report->bukti ?? '[]'" />
                            </div>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="relative py-4">
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-3 bg-white text-gray-500 font-bold uppercase tracking-wider text-[10px]">Diskusi Laporan</span>
                        </div>
                    </div>

                    <!-- Comment Section -->
                    <div class="flex flex-col h-80 bg-gray-50 rounded-xl overflow-hidden border border-gray-100 relative">
                        {{-- Comment List --}}
                        <div x-ref="commentContainer" class="flex-1 overflow-y-auto p-4 space-y-4 scroll-smooth">
                            <template x-if="isLoadingComments">
                                <div class="flex justify-center items-center h-full">
                                    <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-primary"></div>
                                </div>
                            </template>
                            
                            <template x-if="!isLoadingComments && comments.length === 0">
                                <div class="flex flex-col items-center justify-center h-full text-gray-400">
                                    <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                                    <p class="text-xs font-medium">Belum ada diskusi.</p>
                                </div>
                            </template>

                            <template x-for="comment in comments" :key="comment.id">
                                <div :class="comment.user_id === currentUserId ? 'flex flex-col items-end' : 'flex flex-col items-start'">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="text-[10px] font-bold text-gray-500" x-text="comment.user.username"></span>
                                        <span class="text-[9px] text-gray-400" x-text="new Date(comment.created_at).toLocaleString('id-ID', {hour:'2-digit', minute:'2-digit'})"></span>
                                    </div>
                                    <div :class="comment.user_id === currentUserId 
                                        ? 'bg-primary text-white rounded-l-xl rounded-t-xl' 
                                        : 'bg-white text-gray-800 rounded-r-xl rounded-t-xl border border-gray-200'"
                                        class="px-3 py-2 max-w-[80%] shadow-sm overflow-hidden break-words">
                                        <p class="text-sm whitespace-pre-line" x-text="comment.comment"></p>
                                    </div>
                                </div>
                            </template>
                        </div>

                        {{-- Comment Overlay for Resolved --}}
                        <template x-if="isResolved">
                            <div class="absolute inset-0 bg-gray-50/60 backdrop-blur-[1px] flex items-center justify-center z-10">
                                <div class="bg-success text-white px-6 py-2 rounded-full shadow-lg flex items-center gap-2 border-2 border-white/20">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span class="text-sm font-bold uppercase tracking-wider">Laporan Sudah Selesai</span>
                                </div>
                            </div>
                        </template>

                        {{-- Comment Input --}}
                        <div x-show="!isResolved" class="p-3 bg-white border-t border-gray-100">
                            <div class="relative">
                                <textarea 
                                    x-model="newComment"
                                    @keydown.enter.prevent="postComment()"
                                    placeholder="Tulis tanggapan..."
                                    rows="1"
                                    class="w-full pl-4 pr-12 py-2 bg-gray-50 border-none rounded-xl text-sm focus:ring-2 focus:ring-primary resize-none overflow-hidden"
                                    x-init="$el.style.height = '40px'; $watch('newComment', val => { $el.style.height = '40px'; $el.style.height = $el.scrollHeight + 'px' })"
                                ></textarea>
                                <button 
                                    @click="postComment()"
                                    :disabled="!newComment.trim() || isSubmitting"
                                    class="absolute right-2 bottom-1.5 p-1.5 text-primary disabled:text-gray-300 transition-colors"
                                >
                                    <svg x-show="!isSubmitting" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                                    <svg x-show="isSubmitting" class="animate-spin h-5 w-5" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                </button>
                            </div>
                            <p class="text-[9px] text-gray-400 mt-2 px-1">Tanggapan hanya dapat dilihat oleh Anda dan Admin.</p>
                        </div>
                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="px-6 py-4 bg-gray-100/50 border-t border-gray-100 flex justify-between items-center">
                    <p class="text-xs text-gray-400">
                        Dilaporkan {{ $report->created_at?->diffForHumans() }}
                    </p>
                    <button @click="open = false" type="button"
                        class="px-6 py-2 bg-white border border-gray-200 rounded-lg text-sm font-bold text-gray-600 hover:bg-gray-50 transition-colors">
                        Tutup
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>
