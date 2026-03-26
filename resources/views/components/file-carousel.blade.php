@props([
    'buktiJson' => '[]', // JSON string atau array dari database
])

@php
    // Parse JSON bukti jika input adalah string
    $files = is_array($buktiJson) ? $buktiJson : (json_decode($buktiJson, true) ?? []);
    
    // Transformasi path menjadi full URL
    $transformedFiles = array_map(function($file) {
        if (!isset($file['url']) && isset($file['path'])) {
            $file['url'] = asset('storage/' . $file['path']);
        }
        // Pastikan type juga terdeteksi dari mime type (e.g. image/jpeg -> image)
        if (!isset($file['type']) && isset($file['type'])) {
             // split 'image/jpeg' to 'image'
        }
        if (isset($file['type']) && str_contains($file['type'], '/')) {
             $file['type'] = explode('/', $file['type'])[0];
        }
        return $file;
    }, $files);
@endphp

<div x-data="{
    current: 0,
    total: {{ count($transformedFiles) }},
    files: {{ json_encode($transformedFiles) }},
    touchStartX: 0,
    touchEndX: 0,

    next() {
        this.pauseAllVideos();
        this.current = (this.current + 1) % this.total;
    },

    prev() {
        this.pauseAllVideos();
        this.current = (this.current - 1 + this.total) % this.total;
    },

    goTo(index) {
        this.pauseAllVideos();
        this.current = index;
    },

    pauseAllVideos() {
        this.$refs.videoPlayer?.pause();
        const videos = this.$el.querySelectorAll('video');
        videos.forEach(v => v.pause());
    },

    handleSwipe() {
        const diff = this.touchStartX - this.touchEndX;
        if (Math.abs(diff) > 50) {
            if (diff > 0) this.next();
            else this.prev();
        }
    }
}" class="relative w-full" @touchstart="touchStartX = $event.changedTouches[0].screenX"
    @touchend="touchEndX = $event.changedTouches[0].screenX; handleSwipe()">

    @if (count($files) > 0)
        <!-- Main Display -->
        <div class="relative aspect-video bg-gray-900 rounded-lg overflow-hidden">

            <!-- Slides -->
            <template x-for="(file, index) in files" :key="index">
                <div x-show="current === index" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="absolute inset-0 flex items-center justify-center bg-black">

                    <!-- Image -->
                    <template
                        x-if="file.type === 'image' || (!file.type && file.url.match(/\.(jpg|jpeg|png|gif|webp)$/i))">
                        <img :src="file.url" :alt="file.name || 'Bukti ' + (index + 1)"
                            class="w-full h-full object-contain" loading="lazy"
                            @click="$dispatch('open-lightbox', { url: file.url, type: 'image' })">
                    </template>

                    <!-- Video -->
                    <template x-if="file.type === 'video' || (!file.type && file.url.match(/\.(mp4|webm|ogg)$/i))">
                        <video :src="file.url" controls controlsList="nodownload"
                            class="w-full h-full object-contain" x-ref="videoPlayer" @play="pauseAllVideos()">
                            Your browser does not support the video tag.
                        </video>
                    </template>

                    <!-- File Name Overlay -->
                    <div
                        class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-4 pt-12">
                        <p x-text="file.name || 'Bukti ' + (index + 1)" class="text-white text-sm font-medium truncate">
                        </p>
                    </div>
                </div>
            </template>

            <!-- Navigation Arrows (Show if more than 1 file) -->
            <template x-if="total > 1">
                <div>
                    <!-- Prev Button -->
                    <button @click="prev()" type="button"
                        class="absolute left-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-black/50 text-white flex items-center justify-center hover:bg-black/70 transition-colors focus:outline-none backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    <!-- Next Button -->
                    <button @click="next()" type="button"
                        class="absolute right-3 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-black/50 text-white flex items-center justify-center hover:bg-black/70 transition-colors focus:outline-none backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </template>

            <!-- File Counter -->
            <div
                class="absolute top-4 right-4 bg-black/60 text-white text-xs px-3 py-1.5 rounded-full backdrop-blur-sm font-medium">
                <span x-text="current + 1"></span> / <span x-text="total"></span>
            </div>
        </div>

        <!-- Thumbnails (Show if more than 1 file) -->
        <template x-if="total > 1">
            <div class="flex gap-2 mt-3 overflow-x-auto pb-2 scrollbar-thin">
                <template x-for="(file, index) in files" :key="index">
                    <button @click="goTo(index)" type="button"
                        class="flex-shrink-0 w-20 h-20 rounded-lg overflow-hidden border-2 transition-all focus:outline-none relative"
                        :class="current === index ? 'border-primary ring-2 ring-primary/20' :
                            'border-gray-200 hover:border-gray-300'">

                        <!-- Image Thumbnail -->
                        <template
                            x-if="file.type === 'image' || (!file.type && file.url.match(/\.(jpg|jpeg|png|gif|webp)$/i))">
                            <img :src="file.url" class="w-full h-full object-cover" loading="lazy">
                        </template>

                        <!-- Video Thumbnail -->
                        <template x-if="file.type === 'video' || (!file.type && file.url.match(/\.(mp4|webm|ogg)$/i))">
                            <div class="w-full h-full bg-gray-800 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </template>

                        <!-- Active Indicator -->
                        <div x-show="current === index"
                            class="absolute inset-0 bg-primary/20 flex items-center justify-center">
                            <div class="w-2 h-2 bg-primary rounded-full"></div>
                        </div>
                    </button>
                </template>
            </div>
        </template>
    @else
        <!-- No Files State -->
        <div
            class="aspect-video bg-gray-100 rounded-lg flex flex-col items-center justify-center border-2 border-dashed border-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300 mb-3" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <p class="text-sm text-gray-400 font-medium">Tidak ada bukti pendukung</p>
        </div>
    @endif

</div>
