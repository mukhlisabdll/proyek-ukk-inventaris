<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Inventaris</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('{{ asset('images/background-image.jpg') }}') no-repeat center center fixed;
            background-size: cover;
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
        .main-content {
            background-color: rgba(255, 255, 255, 0.6); /* More transparent */
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 50px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        .btn-primary {
            background-color: #007bff;
            color: #ffffff;
            transition: background-color 0.3s ease-in-out;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #28a745;
            color: #ffffff;
            transition: background-color 0.3s ease-in-out;
        }
        .btn-secondary:hover {
            background-color: #1e7e34;
        }
        .features {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        .feature-item {
            text-align: center;
            color: #333;
        }
        .feature-item i {
            font-size: 24px;
            margin-bottom: 5px;
        }
        .footer {
            background-color: rgba(0, 0, 0, 0.7);
            color: #ffffff;
            padding: 15px;
            text-align: center;
            position: absolute;
            bottom: 0;
            width: 100%;
            font-size: 14px;
        }
        .footer i {
            margin: 0 5px;
            color: #007bff;
        }

    </style>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal flex flex-col min-h-screen">
    <header class="w-full p-4 bg-gray-800 text-white text-center">
        <h1 class="text-2xl font-bold"><i class="fas fa-box"></i> Web Inventaris</h1>
    </header>
    <main class="container mx-auto flex-grow flex items-center justify-center">
        <div class="main-content">
            <h2 class="text-3xl font-bold mb-6 text-center">Selamat Datang di Web Inventaris</h2>
            <p class="text-gray-700 mb-6 text-center">Aplikasi ini membantu Anda mengelola inventaris barang dengan mudah dan efisien.</p>
            <div class="features">
                <div class="feature-item">
                    <i class="fas fa-chart-line"></i>
                    <p>Grafik</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-boxes"></i>
                    <p>Stok Barang</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-file-alt"></i>
                    <p>Laporan</p>
                </div>
            </div>
            <div class="text-center mt-6">
                <a href="{{ route('login') }}" class="btn-primary px-4 py-2 rounded-lg shadow">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-secondary ml-4 px-4 py-2 rounded-lg shadow">Register</a>
                @endif
            </div>
        </div>
    </main>
    <footer class="footer">
        Dibuat oleh <span>[Mukhlis Abdillah]</span> dengan bantuan 
        <i class="fas fa-brain"></i> ChatGPT dan 
        <i class="fab fa-github"></i> GitHub Copilot | Teknologi: 
        <i class="fab fa-html5"></i> HTML, 
        <i class="fab fa-css3-alt"></i> CSS, 
        <i class="fab fa-bootstrap"></i> Bootstrap, 
        <i class="fab fa-laravel"></i> Laravel
    </footer>
    
    
</body>
</html>
