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

        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <style>
            body {
                background: url('{{ asset('images/background-image.jpg') }}') no-repeat center center fixed;
                background-size: cover;
                color: #fff;
                position: relative;
            }
            body::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5); /* Adjust the opacity as needed */
                z-index: -1;
            }
            .container {
                width: 300px; /* Set the width */
                margin-top: 50px;
                background: rgba(255, 255, 255, 0.1);
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                max-height: 90vh; /* Limit the height */
                overflow-y: auto; /* Add scroll if content overflows */
                margin-right: 350px; 
                margin-left: 350px;
            }
            .container h1 {
                font-size: 24px;
                margin-bottom: 20px;
            }
            .container label {
                color: #fff;
            }
            .container .btn-primary {
                background-color: #667eea;
                border-color: #667eea;
            }
            .container .btn-primary:hover {
                background-color: #556cd6;
                border-color: #556cd6;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="container">
                {{ $slot }}
            </div>
        </div>

        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
