<div class="relative shadow p-4 rounded-lg text-center border border-gray-200 dark:border-gray-700">
    <h2 class="text-xl font-bold mb-4 text-center text-gray-800 dark:text-white">Guru Pembimbing</h2>

    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- <button wire:click="openModal" class="mb-4 px-4 py-2 bg-blue-600 text-black rounded hover:bg-blue-700">
        Tambah Guru Pembimbing
    </button> -->

    <table class="table-auto w-full border text-sm">
        <thead class="relative">
            <tr>
                <th class="px-4 py-2 border">Nama</th>
                <th class="px-4 py-2 border">NIP</th>
                <th class="px-4 py-2 border">Gender</th>
                <th class="px-4 py-2 border">Alamat</th>
                <th class="px-4 py-2 border">Kontak</th>
                <th class="px-4 py-2 border">Email</th>
            </tr>
        </thead>
        <tbody class="text-gray-800 dark:text-white">
            @foreach ($mentors as $mentor)
                <tr class="hover:bg-white/10 dark:hover:bg-white/5 transition duration-200">
                    <td class="px-4 py-2 border">{{ $mentor->nama }}</td>
                    <td class="px-4 py-2 border">{{ $mentor->nip }}</td>
                    <td class="px-4 py-2 border">{{ $mentor->gender }}</td>
                    <td class="px-4 py-2 border">{{ $mentor->alamat }}</td>
                    <td class="px-4 py-2 border">{{ $mentor->kontak }}</td>
                    <td class="px-4 py-2 border">{{ $mentor->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="relative mt-4">
        {{ $mentors->links() }}
    </div>

</div>

