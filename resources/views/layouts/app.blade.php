<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .navbar-nav .nav-link {
                transition: background-color 0.3s, color 0.3s;
            }
            .navbar-nav .nav-link:hover {
                background-color: #495057;
                color: #fff;
            }
            .navbar-nav .nav-link.active {
                background-color: #6c757d;
                color: #fff;
                transition: background-color 0.3s;
            }
            .dropdown-menu {
                transition: max-height 0.3s ease-out, opacity 0.3s ease-out;
                max-height: 0;
                opacity: 0;
                overflow: hidden;
            }
            .dropdown-menu.show {
                max-height: 500px;
                opacity: 1;
            }
            .navbar {
                background-color: #007bff;
                color: #fff;
            }
            .navbar .navbar-brand, .navbar .navbar-text {
                color: #fff;
            }
            .navbar .navbar-toggler {
                border-color: rgba(255, 255, 255, 0.1);
            }
            .navbar .navbar-toggler-icon {
                background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255, 255, 255, 0.5%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
            }
            .wrapper {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }
            .content {
                flex: 1;
            }
            .footer {
                background-color: #343a40;
                color: #ffffff;
                padding: 1rem 0;
                width: 100%;
                transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-gradient-to-r from-gray-100 to-gray-300">
        <div class="wrapper">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow-md">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="content">
                <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
            </main>

            <!-- Footer -->
            <footer class="footer text-center py-3 border-top mt-auto">
                <p class="mb-0">&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All Rights Reserved.</p>
            </footer>
        </div>
    </body>
</html>
