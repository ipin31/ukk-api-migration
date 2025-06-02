@extends('layouts.app')
@section('content')
    <!-- Hero Section -->
    <section class="hero bg-blue-600 text-white text-center py-16">
        <h1 class="text-4xl font-bold">Selamat Datang di Program Praktek Kerja Lapangan (PKL)</h1>
        <p class="mt-4 text-lg">Bergabunglah dan tingkatkan pengalaman kerja Anda bersama kami</p>
        <a href="#informasi" class="mt-8 inline-block px-8 py-4 bg-yellow-500 text-lg font-semibold rounded-full">Pelajari
            Lebih Lanjut</a>
    </section>

    <!-- Informasi PKL Section -->
    <section id="informasi" class="informasi py-16 px-4 bg-gray-100">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-semibold text-blue-600">Apa itu Program PKL?</h2>
            <p class="mt-4 text-lg text-gray-700">PKL adalah kesempatan bagi mahasiswa untuk mendapatkan pengalaman langsung
                dalam dunia industri dan meningkatkan keterampilan mereka dalam pekerjaan nyata. Dengan mengikuti PKL, Anda
                dapat memperluas wawasan dan siap menghadapi tantangan profesional di masa depan.</p>
        </div>
    </section>

    <!-- Fitur PKL Section -->
    <section class="fitur py-16 px-4">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-semibold text-blue-600">Fitur Program PKL</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
                <div class="fitur-card p-6 bg-white shadow-lg rounded-lg">
                    <h3 class="text-xl font-semibold text-blue-600">Pengalaman Praktis</h3>
                    <p class="mt-4 text-gray-700">Tingkatkan keterampilan Anda dengan pengalaman langsung di dunia industri
                        yang relevan dengan jurusan Anda.</p>
                </div>
                <div class="fitur-card p-6 bg-white shadow-lg rounded-lg">
                    <h3 class="text-xl font-semibold text-blue-600">Mentor Berpengalaman</h3>
                    <p class="mt-4 text-gray-700">Bekerja langsung dengan mentor profesional yang akan membimbing Anda
                        selama masa PKL.</p>
                </div>
                <div class="fitur-card p-6 bg-white shadow-lg rounded-lg">
                    <h3 class="text-xl font-semibold text-blue-600">Peluang Kerja</h3>
                    <p class="mt-4 text-gray-700">Program PKL sering kali membuka peluang kerja penuh waktu setelah masa
                        magang selesai.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="testimonial py-16 bg-blue-100">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-semibold text-blue-600">Testimoni Peserta PKL</h2>
            <div class="mt-8">
                <blockquote class="text-lg text-gray-700 italic">
                    "Program PKL ini benar-benar membuka mata saya tentang dunia kerja yang sesungguhnya. Saya mendapatkan
                    pengalaman yang sangat berharga dan akhirnya diterima bekerja di perusahaan tempat saya magang."
                </blockquote>
                <p class="mt-4 text-sm text-gray-500">- Andi, Peserta PKL 2024</p>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta py-16 bg-yellow-500 text-white text-center">
        <h2 class="text-3xl font-semibold">Bergabunglah dengan Program PKL Sekarang!</h2>
        <p class="mt-4 text-lg">Daftar dan ambil langkah pertama menuju karir yang lebih cemerlang!</p>
        <a href="#daftar" class="mt-8 inline-block px-8 py-4 bg-blue-600 text-lg font-semibold rounded-full">Daftar
            Sekarang</a>
    </section>
@endsection