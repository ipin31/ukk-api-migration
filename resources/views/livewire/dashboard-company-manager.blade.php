<div class="relative shadow p-4 rounded-lg text-center border border-gray-200 dark:border-gray-700">
    <h2 class="text-2xl font-bold mb-4 text-center">Industri</h2>

    @if (session()->has('success_company'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4 text-left">
            {{ session('success_company') }}
        </div>
    @endif

    <div class="mb-4 text-left">
        <button wire:click="openModal" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Tambah Industri
        </button>
    </div>

    <table class="table-auto w-full border text-sm">
        <thead class="relative">
            <tr>
                <th class="px-4 py-2 border">Nama</th>
                <th class="px-4 py-2 border">Bidang Usaha</th>
                <th class="px-4 py-2 border">Alamat</th>
                <th class="px-4 py-2 border">Kontak</th>
                <th class="px-4 py-2 border">Email</th>
                <th class="px-4 py-2 border">Guru Pembimbing</th>
                <!-- <th class="px-4 py-2 border">Aksi</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr class="hover:bg-white/10 dark:hover:bg-white/5 transition duration-200">
                    <td class="px-4 py-2 border">{{ $company->nama }}</td>
                    <td class="px-4 py-2 border">{{ $company->bidang_usaha }}</td>
                    <td class="px-4 py-2 border">{{ $company->alamat }}</td>
                    <td class="px-4 py-2 border">{{ $company->kontak }}</td>
                    <td class="px-4 py-2 border">{{ $company->email }}</td>
                    <td class="px-4 py-2 border">{{ $company->guru->nama }}</td>
                    <!-- <td class="px-4 py-2 border">
                                <button wire:click="openModal({{ $company->id }})" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Edit</button>
                                <button wire:click="delete({{ $company->id }})" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Hapus</button>
                            </td> -->
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $companies->links() }}
    </div>

    {{-- Modal Form --}}
    @if ($isOpen)
        <div class="fixed inset-0 z-50 bg-black/40 flex items-center justify-center text-left ">
            <div class="bg-white dark:bg-white/10 backdrop-blur-lg p-6 rounded-lg shadow-lg w-full max-w-md text-black dark:text-white">
                <h3 class="text-lg text-center font-semibold mb-4">Tambah/Edit Perusahaan</h3>

                <div class="mb-3">
                    <label class="block text-sm mb-1">Nama Industri</label>
                    <input type="text" wire:model="nama" class="w-full border px-3 py-2 rounded" />
                    @error('nama') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-sm mb-1">Bidang Usaha</label>
                    <input type="text" wire:model="bidang_usaha" class="w-full border px-3 py-2 rounded" />
                    @error('bidang_usaha') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
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

                <div class="mb-3">
                    <label class="block text-sm mb-1">Guru Pembimbing</label>
                    <select wire:model="guru_id" class="w-full border px-3 py-2 rounded bg-white dark:bg-neutral-800 text-black dark:text-white">
                        <option value="">Pilih Guru Pembimbing</option>
                        @foreach ($guru as $mentor)
                            <option value="{{ $mentor->id }}">{{ $mentor->nama }}</option>
                        @endforeach
                    </select>
                    @error('guru_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end space-x-2">
                    <button wire:click="closeModal" class="px-4 py-2 bg-red-700 text-white rounded hover:bg-red-900">
                        Batal
                    </button>
                    <button wire:click="save" class="px-4 py-2 bg-green-500 text-black rounded hover:bg-green-600">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
