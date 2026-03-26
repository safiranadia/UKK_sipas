@extends('user.layouts.index')

@section('title', 'History')
@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">History pengaduan</h1>
        <p class="text-gray-600">
            Pantau dan lihat progres serta history pengaduan Anda selama menggunakan SIPAS disini.
        </p>
    </div>

    <!-- Cards Grid - 4 columns -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse ($reports as $report)
            <div class="bg-white rounded-lg shadow-sm overflow-hidden flex flex-col">
                <!-- Image -->
                <div class="relative h-40">
                    @if (!empty($report->bukti) && isset($report->bukti[0]))
                        <img src="{{ asset('storage/' . $report->bukti[0]['path']) }}" alt="Pengaduan"
                            class="w-full h-full object-cover">
                    @else
                        <img src="https://placehold.co/400x250?text=No+Image" class="w-full h-full object-cover">
                    @endif
                </div>

                <!-- Content -->
                <div class="p-4 flex-1 flex flex-col">
                    <!-- User Info & Status -->
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-2">
                            <div
                                class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-xs font-bold">
                                {{ substr($report->user->username ?? 'U', 0, 1) }}
                            </div>
                            <div class="overflow-hidden">
                                <p class="text-xs font-semibold text-gray-900 truncate">
                                    {{ $report->user->username ?? 'Unknown' }}</p>
                                <p class="text-[10px] text-gray-500">{{ $report->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                        <span class="px-2 py-0.5 bg-green-100 text-green-700 rounded text-[10px] font-bold uppercase transition-colors">
                            {{ $report->status }}
                        </span>
                    </div>

                    <!-- Description -->
                    <p class="text-gray-700 text-xs mb-4 line-clamp-2 leading-relaxed">
                        {{ $report->deskripsi }}
                    </p>

                    <!-- Link -->
                    <div class="mt-auto">
                        <x-modal-progres :report="$report" variant="link" triggerText="Lihat Progress"
                            class="text-blue-600 text-xs font-bold hover:underline flex items-center gap-1 p-0 bg-transparent shadow-none" />
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-12 text-center">
                <p class="text-gray-500">Belum ada riwayat pengaduan yang selesai.</p>
            </div>
        @endforelse
    </div>
@endsection
