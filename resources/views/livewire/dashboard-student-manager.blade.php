<div class="bg-white shadow p-4 rounded-lg">
    <h2 class="text-lg font-bold mb-4">Manajemen Siswa</h2>

    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <button wire:click="openModal" class="mb-4 px-4 py-2 bg-blue-600 text-black rounded hover:bg-blue-700">
        + Tambah Siswa
    </button>

    <table class="table-auto w-full border text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border">Nama</th>
                <th class="px-4 py-2 border">NIS</th>
                <th class="px-4 py-2 border">Gender</th>
                <th class="px-4 py-2 border">Alamat</th>
                <th class="px-4 py-2 border">Kontak</th>
                <th class="px-4 py-2 border">Email</th>
                <th class="px-4 py-2 border">Status PKL</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $student->nama }}</td>
                    <td class="px-4 py-2 border">{{ $student->nis }}</td>
                    <td class="px-4 py-2 border">{{ $student->gender }}</td>
                    <td class="px-4 py-2 border">{{ $student->alamat }}</td>
                    <td class="px-4 py-2 border">{{ $student->kontak }}</td>
                    <td class="px-4 py-2 border">{{ $student->email }}</td>
                    <td class="px-4 py-2 border">
                        <span class="badge {{ $student->status_pkl ? 'bg-green-500' : 'bg-red-500' }}">
                            {{ $student->status_pkl ? 'Sudah Lapor' : 'Belum Lapor' }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $students->links() }}
    </div>

    {{-- Modal Form --}}
    @if ($isOpen)
        <div class="fixed inset-0 z-50 bg-black/40 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                <h3 class="text-lg font-semibold mb-4">Tambah Siswa Baru</h3>

                <div class="mb-3">
                    <label class="block text-sm mb-1">Nama</label>
                    <input type="text" wire:model="nama" class="w-full border px-3 py-2 rounded" />
                    @error('nama') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-sm mb-1">NIS</label>
                    <input type="text" wire:model="nis" class="w-full border px-3 py-2 rounded" />
                    @error('nis') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-sm mb-1">Gender</label>
                    <select wire:model="gender" class="w-full border px-3 py-2 rounded">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('gender') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-sm mb-1">Alamat</label>
                    <input type="text" wire:model="alamat" class="w-full border px-3 py-2 rounded" />
                    @error('alamat') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-sm mb-1">Kontak</label>
                    <input type="text" wire:model="kontak" class="w-full border px-3 py-2 rounded" />
                    @error('kontak') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-sm mb-1">Email</label>
                    <input type="email" wire:model="email" class="w-full border px-3 py-2 rounded" />
                    @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end space-x-2">
                    <button wire:click="closeModal" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                        Batal
                    </button>
                    <button wire:click="save" class="px-4 py-2 bg-blue-600 text-black rounded hover:bg-blue-700">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
