@if(auth()->user()->hasRole('Student'))
    @if($student)
        {{-- Tampilkan data siswa --}}
        <div class="flex flex-col md:flex-row gap-6 items-stretch">
            <!-- Card Kiri: Foto dan Nama -->
            <div
                class="flex flex-col items-center gap-4 rounded-lg border border-gray-200 dark:border-gray-700 p-6 w-full md:w-1/3 h-full">
                <img src="{{ $student->foto ? asset('storage/' . $student->foto) : asset('default-foto.png') }}"
                    alt="Foto Siswa" style="width: 160px; height: 160px; object-fit: cover; border-radius: 50%;" />
                <div class="text-center">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Nama</p>
                    <p class="text-lg font-semibold text-gray-800 dark:text-white">{{ $student->nama }}</p>
                </div>
            </div>

            <!-- Card Kanan: Semua data dibagi dua kolom dan isi memenuhi tinggi -->
            <div
                class="rounded-lg border border-gray-200 dark:border-gray-700 p-6 w-full md:w-2/3 h-full flex flex-col justify-between">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 h-full">
                    <!-- Kolom kiri -->
                    <div class="space-y-4 h-full flex flex-col justify-between">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Email</p>
                            <p class="text-base font-medium text-gray-800 dark:text-white">{{ $student->email }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Gender</p>
                            <p class="text-base font-medium text-gray-800 dark:text-white">{{ $student->gender }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">NIS</p>
                            <p class="text-base font-medium text-gray-800 dark:text-white">{{ $student->nis }}</p>
                        </div>
                    </div>

                    <!-- Kolom kanan -->
                    <div class="space-y-4 h-full flex flex-col justify-between">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Alamat</p>
                            <p class="text-base font-medium text-gray-800 dark:text-white">{{ $student->alamat }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Kontak</p>
                            <p class="text-base font-medium text-gray-800 dark:text-white">{{ $student->kontak }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Status PKL</p>
                            <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full 
                                {{ $student->status_pkl ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $student->status_pkl ? 'Sudah Lapor' : 'Belum Lapor' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@else
    {{-- Jika user tidak memiliki role Student --}}
    <div class="w-full">
        <div class="text-center mt-1">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                Halo, {{ auth()->user()->name }}!
            </h1>
            <p class="text-lg text-gray-700 dark:text-gray-300">Email kamu: {{ auth()->user()->email }}</p>
            <p
                class="inline-block bg-yellow-100 text-yellow-950 dark:bg-yellow-700 dark:text-yellow-200 px-3 py-1 rounded-full text-base mt-2">
                Data siswa belum tersedia untuk akun ini.
            </p>
        </div>

        <div class="flex items-center justify-center h-[50vh]">
            <span
                class="bg-red-100 text-red-700 text-2xl font-bold px-6 py-3 rounded-full shadow-md dark:bg-red-800 dark:text-white">
                Hubungi Admin Untuk Informasi Lebih Lanjut!
            </span>
        </div>
    </div>
@endif