@extends('user.layouts.index')

@section('title', 'Home')

@section('content')
    <!-- Header Section -->
    <div class="text-center mb-10">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">
            Selamat Datang, <span class="text-blue-600 italic">User</span>
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
        <form class="space-y-8">
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
                    <input type="date"
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
                    <input type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
                </div>

                <!-- Kategori Pengaduan -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Kategori Pengaduan
                    </label>
                    <div class="relative">
                        <select
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all appearance-none bg-white">
                            <option value="" disabled selected>Pilih kategori</option>
                            <option value="infrastruktur">Infrastruktur</option>
                            <option value="pelayanan">Pelayanan Publik</option>
                            <option value="keamanan">Keamanan</option>
                            <option value="lingkungan">Lingkungan</option>
                            <option value="lainnya">Lainnya</option>
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

            <!-- Foto Pendukung -->
            <div>
                <label class="block text-sm font-medium text-gray-900 mb-2">
                    Foto Pendukung
                </label>
                <div
                    class="border-2 border-dashed border-gray-300 rounded-lg p-12 text-center hover:border-blue-500 transition-colors cursor-pointer bg-gray-50">
                    <div class="flex flex-col items-center justify-center">
                        <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <p class="text-sm text-gray-500">Klik untuk mengunggah foto</p>
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
@endsection
