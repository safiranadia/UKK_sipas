@extends('user.layouts.index')

@section('title', 'History Pengaduan')
@section('content')
    <!-- Header Section -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">History pengaduan</h1>
        <p class="text-gray-600">
            Berikut adalah daftar riwayat pengaduan Anda yang telah selesai diproses.
        </p>
    </div>

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse ($reports as $report)
            <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-success/10">
                <div class="p-4">
                    <!-- Card Header -->
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-gray-900">{{ $report->nama_fasilitas }}</h3>
                        <span class="px-4 py-1 bg-success/10 text-success rounded-full text-xs font-bold uppercase tracking-wider">
                            Selesai
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

                    <!-- Actions Detail & Solusi -->
                    <div class="flex items-center gap-4">
                        <x-modal-progres :report="$report" variant="link" triggerText="Lihat Detail" />
                        <x-modal-solve :report="$report" triggerText="Lihat Penyelesaian" />
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-12 text-center bg-white rounded-2xl border border-dashed border-gray-200">
                <p class="text-gray-500">Belum ada riwayat pengaduan yang selesai.</p>
            </div>
        @endforelse
    </div>
@endsection
