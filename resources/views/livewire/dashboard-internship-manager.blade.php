<div class="bg-white shadow p-4 rounded-lg">
    <h2 class="text-lg font-bold mb-4">Manajemen Magang</h2>

    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <button wire:click="openModal" class="mb-4 px-4 py-2 bg-blue-600 text-black rounded hover:bg-blue-700">
        + Tambah PKL
    </button>

    <table class="table-auto w-full border text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border">Nama Siswa</th>
                <th class="px-4 py-2 border">Mulai</th>
                <th class="px-4 py-2 border">Selesai</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($internships as $internship)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $internship->student->nama }}</td>
                    <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($internship->mulai)->format('d-m-Y') }}</td>
                    <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($internship->selesai)->format('d-m-Y') }}</td>
                    <td class="px-4 py-2 border">
                        <button wire:click="openModal({{ $internship->id }})" class="px-4 py-2 bg-yellow-400 text-blue-500 rounded hover:bg-yellow-500">
                            Edit
                        </button>
                        <button wire:click="delete({{ $internship->id }})" class="px-4 py-2 bg-red-600 text-red-500  rounded hover:bg-red-700">
                            Hapus
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $internships->links() }}
    </div>

    {{-- Modal Form --}}
    @if ($isOpen)
        <div class="fixed inset-0 z-50 bg-black/40 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                <h3 class="text-lg font-semibold mb-4">{{ $internshipId ? 'Edit' : 'Tambah' }} Magang</h3>

                <div class="mb-3">
                    <label class="block text-sm mb-1">Nama Siswa</label>
                    <select wire:model="siswa_id" class="w-full border px-3 py-2 rounded">
                        <option value="">Pilih Siswa</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->nama }}</option>
                        @endforeach
                    </select>
                    @error('siswa_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-sm mb-1">Mulai</label>
                    <input type="date" wire:model="mulai" class="w-full border px-3 py-2 rounded" />
                    @error('mulai') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-sm mb-1">Selesai</label>
                    <input type="date" wire:model="selesai" class="w-full border px-3 py-2 rounded" />
                    @error('selesai') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
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
