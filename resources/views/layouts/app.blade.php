<!DOCTYPE html>
<html lang="id">

<head>
    @vite('resources/css/app.css')
    @livewireStyles

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

</head>
<body>

    <!-- Sticky Navbar -->
    <nav class="sticky top-0 z-50 bg-white shadow-md">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-xl font-bold text-blue-600">Program PKL</div>
            <ul class="flex space-x-2 text-sm font-medium">
                <li><a href="/" class="text-gray-700 hover:text-blue-600 px-4 py-2 rounded transition duration-200">Beranda</a></li>
                <li><a href="#informasi" class="text-gray-700 hover:text-blue-600 px-4 py-2 rounded transition duration-200">Informasi</a></li>
                <li><a href="register" class="text-gray-700 hover:text-blue-600 px-4 py-2 rounded transition duration-200">Daftar</a></li>
                <li><a href="login" class="text-gray-700 hover:text-blue-600 px-4 py-2 rounded transition duration-200">Login</a></li>
            </ul>
    </nav>

    @yield('content')
    @livewireScripts
</body>