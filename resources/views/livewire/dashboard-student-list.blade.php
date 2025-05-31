<div class="relative shadow p-4 rounded-lg text-center border border-gray-200 dark:border-gray-700">
    <h2 class="text-xl font-bold mb-4 text-center text-gray-800 dark:text-white">Daftar Siswa</h2>

    <table class="table-auto w-full border text-sm">
        <thead class="relative">
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
        <tbody class="text-gray-800 dark:text-white">
            @forelse ($students as $student)
                <tr class="hover:bg-white/10 dark:hover:bg-white/5 transition duration-200">
                    <td class="px-4 py-2 border">{{ $student->nama }}</td>
                    <td class="px-4 py-2 border">{{ $student->nis }}</td>
                    <td class="px-4 py-2 border">{{ $student->gender }}</td>
                    <td class="px-4 py-2 border">{{ $student->alamat }}</td>
                    <td class="px-4 py-2 border">{{ $student->kontak }}</td>
                    <td class="px-4 py-2 border">{{ $student->email }}</td>
                    <td class="px-4 py-2 border">
                    <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full 
                        {{ $student->status_pkl ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $student->status_pkl ? 'Sudah Lapor' : 'Belum Lapor' }}
                    </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-4 py-4 text-center text-gray-500">Belum ada data siswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="relative mt-4">
        {{ $students->links() }}
    </div>
    
</div>