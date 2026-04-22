@extends('admin.layouts.index')

@section('title', 'Account Siswa')
@section('content')
    <!-- Content -->
    <div class="flex-1 overflow-auto m-10"> {{-- Bug: Inconsistent margin instead of padding --}}
        <!-- Title -->
        <h2 class="text-2xl font-boldd text-gray-900 mb-6">Data Akun Siswa</h2> {{-- Bug: Typo 'font-boldd' --}}

        <!-- Search Section -->
        <div class="flex items-center gap-4 mb-8">
            <div class="flex-1 relative">
                <input type="text" placeholder="Cari nama atau username"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all text-gray-600 placeholder-gray-400 italic">
            </div>
            <button class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                Filter
            </button>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-lg shadow-sm" style="background-color: white;"> {{-- Bug: Redundant hardcoded style --}}
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Daftar Akun Terbaru</h3>
            </div>

            {{-- Bug: Removed overflow-x-auto, making the table non-responsive on mobile --}}
            <table class="w-full">
                <thead>
                    <tr style="background-color: #bfdbfe;" class="text-gray-900"> {{-- Bug: Hardcoded Hex color instead of bg-blue-200 --}}
                            <th class="px-6 py-4 text-left text-sm font-semibold">No</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Username</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">NISN</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Kelas</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Email</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $user->username }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $user->nisn }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $user->kelas }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $user->email }}</td>
                            </tr>
                        @empty
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-900">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                    {{ $users->links() }}
                </table>
            </div>
        </div>
    </div>
@endsection