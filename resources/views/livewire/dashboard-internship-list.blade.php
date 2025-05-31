<div class="relative shadow p-4 rounded-lg text-center border border-gray-200 dark:border-gray-700">
    <h2 class="text-xl font-bold mb-4 text-center text-gray-800 dark:text-white">Laporan PKL Seluruh Siswa</h2>

    @if($internships->isEmpty())
        <p class="text-center text-gray-500 dark:text-gray-300">Belum ada laporan PKL yang terdaftar.</p>
    @else
        <div class="overflow-x-auto">
            <table class="table-auto w-full border text-sm">
                <thead class="relative">
                    <tr>
                        <th class="px-4 py-2 border">Nama Siswa</th>
                        <th class="px-4 py-2 border">Industri</th>
                        <th class="px-4 py-2 border">Guru Pembimbing</th>
                        <th class="px-4 py-2 border">Mulai</th>
                        <th class="px-4 py-2 border">Selesai</th>
                        <th class="px-4 py-2 border">Durasi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800 dark:text-white">
                    @foreach ($internships as $internship)
                        <tr class="hover:bg-white/10 dark:hover:bg-white/5 transition duration-200">
                            <td class="px-4 py-2 border">{{ $internship->student->nama ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ $internship->industri->nama ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ $internship->industri->guru->nama ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($internship->mulai)->format('d-m-Y') }}</td>
                            <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($internship->selesai)->format('d-m-Y') }}</td>
                            <td class="px-4 py-2 border">{{ $internship->durasi_hari }} hari</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="relative mt-4">
                {{ $internships->links() }}
            </div>

        </div>
    @endif
</div>