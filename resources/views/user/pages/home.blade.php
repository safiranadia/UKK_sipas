@extends('user.layouts.index')

@section('title', 'Home')

@section('content')
    <!-- Header Section -->
    <div class="text-center mb-10">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">
            Selamat Datang, <span class="text-blue-600 italic">{{ auth()->user()->username }}</span>
        </h1>
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
            Sampaikan Pengaduan Anda
        </h2>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Isi formulir di bawah ini untuk menyampaikan pengaduan Anda. Kami akan menindaklanjuti setiap laporan Anda
            dengan serius.
        </p>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow-sm p-8 md:p-10">
        <form class="space-y-8" action="{{ route('siswa.reports.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Judul Pengaduan -->
            <div>
                <label class="block text-sm font-medium text-gray-900 mb-2">
                    Judul Pengaduan
                </label>
                <input type="text" placeholder="Masukkan judul pengaduan Anda..." name="nama_fasilitas"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
            </div>

            <!-- Tanggal Pengaduan -->
            <div>
                <label class="block text-sm font-medium text-gray-900 mb-2">
                    Tanggal Pengaduan
                </label>
                <div class="relative">
                    <input type="date" name="tanggal_laporan"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Lokasi and Kategori Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Lokasi -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Lokasi
                    </label>
                    <input type="text" name="lokasi"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
                </div>

                <!-- Kategori Pengaduan -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Kategori Pengaduan
                    </label>
                    <div class="relative">
                        <select name="category_report_id"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all appearance-none bg-white">
                            <option value="" disabled selected>Pilih kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" class="text-primary">{{ $category->nama_kategori }}</option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Isi Laporan Pengaduan -->
            <div>
                <label class="block text-sm font-medium text-gray-900 mb-2">
                    Isi Laporan Pengaduan
                </label>
                <textarea rows="6" placeholder="Jelaskan detail pengaduan Anda...." name="deskripsi"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all resize-none placeholder-gray-400 italic"></textarea>
            </div>

            <!-- Foto & Video Pendukung dengan Preview -->
            <div>
                <label class="block text-sm font-medium text-gray-900 mb-2">
                    Foto & Video Pendukung
                </label>

                <!-- Input File Hidden -->
                <input type="file" name="bukti[]" id="file-input" multiple accept="image/*,video/*" class="hidden">

                <!-- Upload Area -->
                <div id="upload-area" onclick="document.getElementById('file-input').click()"
                    class="border-2 border-dashed border-gray-300 rounded-lg p-12 text-center hover:border-blue-500 transition-colors cursor-pointer bg-gray-50">
                    <div class="flex flex-col items-center justify-center" id="upload-placeholder">
                        <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <p class="text-sm text-gray-500 mb-1">Klik untuk mengunggah foto atau video</p>
                        <p class="text-xs text-gray-400">Maksimal 10MB per file</p>
                    </div>
                </div>

                <!-- Preview Container -->
                <div id="preview-container" class="hidden mt-4">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm font-medium text-gray-700">Preview (<span id="file-count">0</span> file)</span>
                        <button type="button" onclick="clearFiles()"
                            class="text-sm text-red-500 hover:text-red-700 font-medium">
                            <i class="fas fa-trash-alt mr-1"></i> Hapus Semua
                        </button>
                    </div>
                    <div id="preview-grid" class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <!-- Preview items will be inserted here -->
                    </div>
                </div>
            </div>

            <!-- Button Kirim -->
            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-full shadow-md hover:shadow-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Kirim
                </button>
            </div>
        </form>
    </div>

    <!-- Modal untuk Preview Besar -->
    <div id="preview-modal" class="fixed inset-0 bg-black bg-opacity-90 hidden z-50 flex items-center justify-center p-4">
        <button onclick="closeModal()" class="absolute top-4 right-4 text-white hover:text-gray-300 text-3xl z-10">
            <i class="fas fa-times"></i>
        </button>
        <div id="modal-content" class="max-w-4xl max-h-full">
            <!-- Content will be inserted here -->
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let selectedFiles = [];

        document.getElementById('file-input').addEventListener('change', function(e) {
            const files = Array.from(e.target.files);

            if (files.length === 0) return;

            // Validasi ukuran (10MB = 10 * 1024 * 1024 bytes)
            const maxSize = 10 * 1024 * 1024;
            const validFiles = files.filter(file => {
                if (file.size > maxSize) {
                    alert(`File ${file.name} terlalu besar. Maksimal 10MB.`);
                    return false;
                }
                return true;
            });

            selectedFiles = [...selectedFiles, ...validFiles];
            updatePreview();
            updateUploadArea();
        });

        function updatePreview() {
            const container = document.getElementById('preview-container');
            const grid = document.getElementById('preview-grid');
            const count = document.getElementById('file-count');

            if (selectedFiles.length === 0) {
                container.classList.add('hidden');
                return;
            }

            container.classList.remove('hidden');
            count.textContent = selectedFiles.length;
            grid.innerHTML = '';

            selectedFiles.forEach((file, index) => {
                const isVideo = file.type.startsWith('video/');
                const previewDiv = document.createElement('div');
                previewDiv.className = 'relative group';

                let mediaElement;
                if (isVideo) {
                    mediaElement = `
                        <video class="w-full h-32 object-cover rounded-lg bg-black" preload="metadata">
                            <source src="${URL.createObjectURL(file)}" type="${file.type}">
                        </video>
                        <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                            <i class="fas fa-play-circle text-white text-3xl opacity-80"></i>
                        </div>
                    `;
                        } else {
                            mediaElement = `
                        <img src="${URL.createObjectURL(file)}" class="w-full h-32 object-cover rounded-lg" alt="Preview">
                    `;
                }

                previewDiv.innerHTML = `
                    <div class="relative cursor-pointer overflow-hidden rounded-lg border border-gray-200" onclick="openModal(${index})">
                        ${mediaElement}
                        
                        <!-- Hover Overlay -->
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all flex items-center justify-center">
                            <span class="text-white opacity-0 group-hover:opacity-100 text-sm font-medium">
                                <i class="fas fa-search-plus"></i> Lihat
                            </span>
                        </div>
                        
                        <!-- File Type Badge -->
                        <span class="absolute top-2 left-2 px-2 py-1 text-xs font-medium rounded ${isVideo ? 'bg-red-500 text-white' : 'bg-blue-500 text-white'}">
                            ${isVideo ? 'VIDEO' : 'IMG'}
                        </span>
                        
                        <!-- Remove Button -->
                        <button type="button" onclick="removeFile(event, ${index})" 
                            class="absolute top-2 right-2 w-8 h-8 bg-red-500 hover:bg-red-600 text-white rounded-full flex items-center justify-center shadow-lg opacity-0 group-hover:opacity-100 transition-all z-10">
                            <i class="fas fa-times text-sm"></i>
                        </button>
                        
                        <!-- File Name -->
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-2">
                            <p class="text-white text-xs truncate">${file.name}</p>
                        </div>
                    </div>
                `;

                grid.appendChild(previewDiv);
            });
        }

        function updateUploadArea() {
            const uploadArea = document.getElementById('upload-area');
            const placeholder = document.getElementById('upload-placeholder');

            if (selectedFiles.length > 0) {
                uploadArea.classList.remove('p-12');
                uploadArea.classList.add('p-4');
                placeholder.innerHTML = `
                    <svg class="w-8 h-8 text-blue-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <p class="text-sm text-blue-600 font-medium">Tambah file lain</p>
                    <p class="text-xs text-gray-400">${selectedFiles.length} file dipilih</p>
                `;
            } else {
                uploadArea.classList.remove('p-4');
                uploadArea.classList.add('p-12');
                placeholder.innerHTML = `
                    <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <p class="text-sm text-gray-500 mb-1">Klik untuk mengunggah foto atau video</p>
                    <p class="text-xs text-gray-400">Maksimal 10MB per file</p>
                `;
            }
        }

        function removeFile(event, index) {
            event.stopPropagation();
            selectedFiles.splice(index, 1);
            updatePreview();
            updateUploadArea();
            updateFileInput();
        }

        function clearFiles() {
            if (confirm('Hapus semua file?')) {
                selectedFiles = [];
                updatePreview();
                updateUploadArea();
                updateFileInput();
            }
        }

        function updateFileInput() {
            // Update the actual file input with remaining files
            const dt = new DataTransfer();
            selectedFiles.forEach(file => dt.items.add(file));
            document.getElementById('file-input').files = dt.files;
        }

        function openModal(index) {
            const file = selectedFiles[index];
            const modal = document.getElementById('preview-modal');
            const content = document.getElementById('modal-content');
            const isVideo = file.type.startsWith('video/');

            if (isVideo) {
                content.innerHTML = `
                    <video controls autoplay class="max-w-full max-h-[80vh] rounded-lg">
                        <source src="${URL.createObjectURL(file)}" type="${file.type}">
                        Browser tidak mendukung video.
                    </video>
                    <div class="text-center mt-4">
                        <p class="text-white font-medium">${file.name}</p>
                        <p class="text-gray-400 text-sm">${(file.size / (1024 * 1024)).toFixed(2)} MB</p>
                    </div>
                `;
            } else {
                content.innerHTML = `
                    <img src="${URL.createObjectURL(file)}" class="max-w-full max-h-[80vh] rounded-lg object-contain" alt="Preview">
                    <div class="text-center mt-4">
                        <p class="text-white font-medium">${file.name}</p>
                        <p class="text-gray-400 text-sm">${(file.size / (1024 * 1024)).toFixed(2)} MB</p>
                    </div>
                `;
            }

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('preview-modal');
            const content = document.getElementById('modal-content');
            modal.classList.add('hidden');
            content.innerHTML = '';
            document.body.style.overflow = '';
        }

        // Close modal on outside click
        document.getElementById('preview-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });

        // Drag and drop support
        const uploadArea = document.getElementById('upload-area');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            uploadArea.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            uploadArea.classList.add('border-blue-500', 'bg-blue-50');
        }

        function unhighlight(e) {
            uploadArea.classList.remove('border-blue-500', 'bg-blue-50');
        }

        uploadArea.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = Array.from(dt.files);

            const maxSize = 10 * 1024 * 1024;
            const validFiles = files.filter(file => {
                if (!file.type.startsWith('image/') && !file.type.startsWith('video/')) {
                    alert(`File ${file.name} bukan gambar atau video.`);
                    return false;
                }
                if (file.size > maxSize) {
                    alert(`File ${file.name} terlalu besar. Maksimal 10MB.`);
                    return false;
                }
                return true;
            });

            selectedFiles = [...selectedFiles, ...validFiles];
            updatePreview();
            updateUploadArea();
            updateFileInput();
        }
    </script>
@endpush
