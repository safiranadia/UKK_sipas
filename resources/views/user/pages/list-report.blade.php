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
                @php
                $statusMap = [
                'pending' => ['label' => 'Baru', 'class' => 'bg-danger/10 text-danger'],
                'approved' => ['label' => 'Disetujui', 'class' => 'bg-gray-100 text-gray-500'],
                'in_progress' => ['label' => 'Diproses', 'class' => 'bg-warning/10 text-warning'],
                'resolved' => ['label' => 'Selesai', 'class' => 'bg-success/10 text-success'],
                ];
                $curr = $statusMap[$report->status] ?? ['label' => $report->status, 'class' => 'bg-gray-100 text-gray-500'];
                @endphp
                <span class="px-4 py-1 {{ $curr['class'] }} rounded-full text-xs font-bold uppercase tracking-wider">
                    {{ $curr['label'] }}
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
    <p class="text-gray-600">Anda belum membuat pengaduan.</p>
    @endforelse
</div>
@endsection