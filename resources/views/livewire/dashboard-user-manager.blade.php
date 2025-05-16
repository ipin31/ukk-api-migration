<div class="bg-white shadow p-4 rounded-lg">
    <h2 class="text-lg font-bold mb-4">Manajemen Pengguna</h2>

    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <button wire:click="openModal" class="mb-4 px-4 py-2 bg-blue-600 text-black rounded hover:bg-blue-700">
        + Tambah User
    </button>

    <table class="table-auto w-full border text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border">Nama</th>
                <th class="px-4 py-2 border">Email</th>
                <th class="px-4 py-2 border">Role</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $user->name }}</td>
                    <td class="px-4 py-2 border">{{ $user->email }}</td>
                    <td class="px-4 py-2 border">{{ $user->roles->pluck('name')->join(', ') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center px-4 py-4">Tidak ada data pengguna.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $users->links() }}
    </div>

    {{-- Modal --}}
    @if ($isOpen)
        <div class="fixed inset-0 z-50 bg-black/40 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
                <h3 class="text-lg font-semibold mb-4">Tambah User Baru</h3>

                <div class="mb-3">
                    <label class="block text-sm mb-1">Nama</label>
                    <input type="text" wire:model="name" class="w-full border px-3 py-2 rounded" />
                    @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-sm mb-1">Email</label>
                    <input type="email" wire:model="email" class="w-full border px-3 py-2 rounded" />
                    @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-sm mb-1">Password</label>
                    <input type="password" wire:model="password" class="w-full border px-3 py-2 rounded" />
                    @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label class="block text-sm mb-1">Role</label>
                    <select wire:model="role" class="w-full border px-3 py-2 rounded">
                        <option value="">Pilih Role</option>
                        @foreach ($roles as $roleItem)
                            <option value="{{ $roleItem }}">{{ $roleItem }}</option>
                        @endforeach
                    </select>
                    @error('role') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
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
