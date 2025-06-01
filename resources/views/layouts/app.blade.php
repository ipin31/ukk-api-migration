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
            <div class="text-xl font-bold text-blue-600">Aplikasi PKL</div>
            <ul class="flex space-x-2 text-sm font-medium">
                @auth
                    <li>
                        <a href="{{ route('dashboard') }}" 
                        class="text-gray-700 hover:text-blue-600 px-4 py-2 rounded transition duration-200">Dashboard</a>
                    </li>
                @else
                    <li>
                        <a href="{{ url('/') }}"
                        class="text-gray-700 hover:text-blue-600 px-4 py-2 rounded transition duration-200">Home</a></li>
                    <li>
                        <a href="{{ route('register') }}"
                        class="text-gray-700 hover:text-blue-600 px-4 py-2 rounded transition duration-200">Register</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}"
                        class="text-gray-700 hover:text-blue-600 px-4 py-2 rounded transition duration-200">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    @yield('content')
    @livewireScripts
</body>