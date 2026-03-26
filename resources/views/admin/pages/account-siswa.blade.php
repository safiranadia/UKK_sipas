@extends('admin.layouts.index')

@section('title', 'Account Siswa')
@section('content')
    <!-- Content -->
    <div class="flex-1 overflow-auto p-8">
        <!-- Title -->
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Data Akun Siswa</h2>

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
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Daftar Akun Terbaru</h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-blue-200 text-gray-900">
                            <th class="px-6 py-4 text-left text-sm font-semibold">No</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Nama Siswa</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">NISN</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Kelas</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Email</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-900">1</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                            <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                            <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                            <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-900">1</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                            <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                            <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                            <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-900">1</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                            <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                            <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                            <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-900">1</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                            <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                            <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                            <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-900">1</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                            <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                            <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                            <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-900">1</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                            <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                            <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                            <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-900">1</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                            <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                            <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                            <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-900">1</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                            <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                            <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                            <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-900">1</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                            <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                            <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                            <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-900">1</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                            <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                            <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                            <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-900">1</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                            <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                            <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                            <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-900">1</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                            <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                            <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                            <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-900">1</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Siti Nurul Latifah</td>
                            <td class="px-6 py-4 text-sm text-gray-900">0103040678</td>
                            <td class="px-6 py-4 text-sm text-gray-900">XII ANIMASI 2</td>
                            <td class="px-6 py-4 text-sm text-gray-900">siti123@gmail.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
