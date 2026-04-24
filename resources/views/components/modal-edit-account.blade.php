<div x-data="{ open: false, userData: {} }" @keydown.escape.window="open = false" x-cloak>

    <!-- Tombol Edit -->
    <button
        @click="
        open = true;
        fetch('{{ url('admin/account-siswa') }}/' + {{ $userId }} + '/edit')
            .then(res => res.json())
            .then(data => { userData = data; });
    "
        class="px-3 py-1.5 text-xs font-medium text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
        Edit
    </button>

    <!-- ✅ Pakai x-if biar hilang total dari DOM -->
    <template x-if="open">
        <div class="fixed inset-0 z-[9999] flex items-center justify-center">

            <!-- Backdrop -->
            <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" @click="open = false"></div>

            <!-- Modal -->
            <div class="relative bg-white rounded-xl shadow-2xl w-full max-w-md p-6 z-10">

                <!-- Header -->
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-blue-600 uppercase">
                        Edit Akun Siswa
                    </h3>
                    <button @click="open = false" class="text-gray-400 hover:text-gray-600">
                        ✕
                    </button>
                </div>

                <!-- Form -->
                <form action="{{ route('admin.account.update', $userId) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <input type="text" name="username" x-model="userData.username" placeholder="Username"
                        class="w-full px-4 py-2 border rounded-lg">

                    <input type="email" name="email" x-model="userData.email" placeholder="Email"
                        class="w-full px-4 py-2 border rounded-lg">

                    <input type="text" name="nisn" x-model="userData.nisn" placeholder="NISN"
                        class="w-full px-4 py-2 border rounded-lg">

                    <input type="text" name="kelas" x-model="userData.kelas" placeholder="Kelas"
                        class="w-full px-4 py-2 border rounded-lg">

                    <input type="password" name="password" placeholder="Password baru (opsional)"
                        class="w-full px-4 py-2 border rounded-lg">

                    <div class="flex gap-2 pt-2">
                        <button type="button" @click="open = false" class="flex-1 border py-2 rounded-lg">
                            Batal
                        </button>

                        <button type="submit" class="flex-1 bg-blue-600 text-white py-2 rounded-lg">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </template>
</div>