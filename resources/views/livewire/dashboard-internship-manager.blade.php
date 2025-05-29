<div class="bg-white shadow p-4 rounded-lg text-center">
    <h2 class="text-lg font-bold mb-4 text-center">Laporan PKL</h2>

    @if (session()->has('success_internship'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4 text-left">
            {{ session('success_internship') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4 text-left">
            {{ session('error') }}
        </div>
    @endif

    <div class="mb-4 text-left">
        @if (!$userHasInternship)
            <button wire:click="openModal" class="mb-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Lapor PKL
            </button>
        @endif
    </div>

    <table class="table-auto w-full border text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border">Industri</th>
                <th class="px-4 py-2 border">Guru Pembimbing</th>
                <th class="px-4 py-2 border">Mulai</th>
                <th class="px-4 py-2 border">Selesai</th>
                <th class="px-4 py-2 border">Durasi</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if ($userHasInternship)
                @foreach ($internships as $internship)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ $internship->industri->nama ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ $internship->industri->guru->nama ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($internship->mulai)->format('d-m-Y') }}</td>
                            <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($internship->selesai)->format('d-m-Y') }}</td>
                            <td class="px-4 py-2 border">
                                @if ($internship->mulai && $internship->selesai)
                                    {{ \Carbon\Carbon::parse($internship->mulai)->diffInDays(\Carbon\Carbon::parse($internship->selesai)) }} hari
                                @endif
                            </td>
                            <td class="px-4 py-2 border">
                                <button wire:click="openModal({{ $internship->id }})"
                                    class="px-4 py-2 bg-blue-400 text-white rounded hover:bg-blue-500">
                                    Edit
                                </button>
                                <!-- <button wire:click="delete({{ $internship->id }})"
                                            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                            Hapus
                                        </button> -->
                            </td>
                        </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center text-gray-500 py-4">Belum Lapor PKL</td>
                </tr>
            @endif
        </tbody>
    </table>


    {{-- Modal Form --}}
    @if ($isOpen)
        <div class="fixed inset-0 z-50 bg-black/40 flex items-center justify-center text-start">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                <h3 class="text-lg font-semibold mb-4">{{ $internshipId ? 'Edit' : 'Tambah' }} Magang</h3>

                {{-- Pilih Siswa --}}
                <div class="mb-3">
                    <label class="block text-sm mb-1">Siswa</label>
                    <select wire:model="siswa_id" class="w-full border px-3 py-2 rounded" @if ($students->isEmpty())
                    disabled @endif>
                        @if ($students->isNotEmpty())
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->nama }}</option>
                            @endforeach
                        @else
                            <option value="">Tidak ada siswa terdaftar</option>
                        @endif
                    </select>
                    @error('siswa_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Pilih Industri / Company --}}
                <div class="mb-3">
                    <label class="block text-sm mb-1">Industri</label>
                    <select wire:model="industri_id" class="w-full border px-3 py-2 rounded">
                        <option value="">Pilih Industri </option>
                        @foreach ($company as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('industri_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Tanggal Mulai --}}
                <div class="mb-3">
                    <label class="block text-sm mb-1">Mulai</label>
                    <input type="date" wire:model="mulai" class="w-full border px-3 py-2 rounded" />
                    @error('mulai') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Tanggal Selesai --}}
                <div class="mb-3">
                    <label class="block text-sm mb-1">Selesai</label>
                    <input type="date" wire:model="selesai" class="w-full border px-3 py-2 rounded" />
                    @error('selesai') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
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