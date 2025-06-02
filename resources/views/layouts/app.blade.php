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
    <nav class="sticky top-0 z-50 bg-blue-900 dark:bg-blue-800 shadow-md transition-colors duration-300">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-xl font-bold text-white dark:text-white">Aplikasi PKL</div>
            <ul class="flex space-x-2 text-sm font-medium">
                @auth
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="text-white dark:text-white border-b-2 border-transparent hover:border-white px-4 py-2 transition duration-200">
                            Dashboard
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ url('/') }}"
                            class="text-white dark:text-white border-b-2 border-transparent hover:border-white px-4 py-2 transition duration-200">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}"
                            class="text-white dark:text-white border-b-2 border-transparent hover:border-white px-4 py-2 transition duration-200">
                            Register
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}"
                            class="text-white dark:text-white border-b-2 border-transparent hover:border-white px-4 py-2 transition duration-200">
                            Login
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>


    @yield('content')
    @livewireScripts
</body>