@extends('layouts.app')

@section('content')
    <section class="relative h-screen overflow-hidden flex items-center justify-center text-white"
        style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);">

        <div class="relative z-10 flex w-full max-w-7xl px-2">
            <!-- Card Kiri -->
            <div class="hidden md:flex flex-1 justify-center items-center px-2">
                <div class="group w-[30vw] h-[80vh] rounded-lg shadow-lg overflow-hidden relative cursor-pointer">
                    <img src="{{ asset('storage/images/banner.jpg') }}" alt="Banner"
                        class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:brightness-75" />
                    <div
                        class="absolute bottom-0 left-0 w-full px-4 py-6 bg-black/50 opacity-0 translate-y-full group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                        <p class="text-white text-center text-lg font-semibold">
                            Card Kiri dengan teks atau konten di sini
                        </p>
                    </div>
                </div>
            </div>

            <!-- Teks Tengah -->
            <div class="flex-1 max-w-xl px-4 flex flex-col justify-center text-center">
                <h1 class="text-4xl font-bold mb-4">Selamat Datang di Aplikasi PKL</h1>
                <p class="text-lg">
                    Aplikasi ini digunakan untuk siswa melaporkan pendaftaran PKL dan Guru untuk mengelola data siswa PKL.
                    <br>
                    Aplikasi ini masih dalam tahap pengembangan.
                </p>
            </div>

            <!-- Card Kanan -->
            <div class="hidden md:flex flex-1 justify-center items-center px-2">
                <div class="group w-[30vw] h-[80vh] rounded-lg shadow-lg overflow-hidden relative cursor-pointer">
                    <img src="{{ asset('storage/images/banner.jpg') }}" alt="Banner"
                        class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:brightness-75" />
                    <div
                        class="absolute bottom-0 left-0 w-full px-4 py-6 bg-black/50 opacity-0 translate-y-full group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                        <p class="text-white text-center text-lg font-semibold">
                            Card Kanan dengan teks atau konten di sini
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection