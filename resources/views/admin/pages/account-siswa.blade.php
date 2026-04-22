@extends('admin.layouts.index')

@section('title', 'Account Siswa')
@section('content')
    <!-- Content -->
    <div class="flex-1 overflow-auto p-8">
        <!-- Title -->
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Data Akun Siswa</h2>

        <!-- Search Section -->
        <div class="flex flex-wrap items-center gap-4 mb-8">
            <div class="flex-1 min-w-[300px]">
                <form method="GET" action="{{ route('admin.account-siswa') }}" class="flex items-center gap-3">
                    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari nama, username, email, kelas atau NISN"
                        class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all text-gray-600 placeholder-gray-400">
                    
                    <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                        Cari
                    </button>
                    @if(!empty($search))
                        <a href="{{ route('admin.account-siswa') }}" class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg transition-colors">
                            Reset
                        </a>
                    @endif
                </form>
            </div>

            <!-- Modal Tambah Akun -->
            <x-modal-create-account />
        </div>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Table Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Daftar Akun Terbaru</h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-blue-50 text-gray-900">
                            <th class="px-6 py-4 text-left text-sm font-semibold">No</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Nama Siswa</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">NISN</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Kelas</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Email</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $user->name ?? $user->username }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $user->nisn ?? '-' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $user->kelas ?? '-' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <x-modal-edit-account :userId="$user->id" />
                                        <form action="{{ route('admin.account.delete', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus akun ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1.5 text-xs font-medium text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td colspan="6" class="px-6 py-12 text-sm text-gray-500 text-center">
                                    <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                    Tidak ada data akun siswa
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="p-6 border-t border-gray-100">
                {{ $users->links() }}
            </div>
        </div>

    </div>
@endsection
