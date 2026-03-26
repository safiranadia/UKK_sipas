@extends('user.layouts.index')

@section('title', 'Pengaduan Saya')
@section('content')
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Pengaduan saya</h1>
        <p class="text-gray-600">
            Berikut adalah daftar pengaduan yang telah Anda sampaikan. Anda dapat melihat status dan detail dari setiap
            pengaduan.
        </p>
    </div>

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse ($reports as $report)
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="p-4">
                    <!-- Card Header -->
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-gray-900">{{ $report->nama_fasilitas }}</h3>
                        <span class="px-4 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-medium">
                            {{ $report->status }}
                        </span>
                    </div>

                    <!-- Image -->
                    <div class="mb-4">
                        @if (!empty($report->bukti) && isset($report->bukti[0]))
                            <img src="{{ asset('storage/' . $report->bukti[0]['path']) }}" alt="Pengaduan"
                                class="w-full h-48 object-cover rounded-lg">
                        @else
                            <img src="https://placehold.co/600x400?text=No+Image"
                                class="w-full h-48 object-cover rounded-lg">
                        @endif
                    </div>

                    <!-- Description -->
                    <p class="text-gray-700 mb-3 text-sm leading-relaxed">
                        {{ $report->deskripsi }}
                    </p>

                    <!-- Link Detail -->
                    <x-modal-progres :report="$report" variant="link" />

                    <!-- Button Chat -->
                    <a href="{{ url('/starbhak?user_id=' . $adminId . '&report_id=' . $report->id) }}" type="button"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg flex items-center justify-center gap-2 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                        Buka Chat
                    </a>
                </div>
            </div>
        @empty
            <p class="text-gray-600">Anda belum membuat pengaduan.</p>
        @endforelse
    </div>
@endsection
