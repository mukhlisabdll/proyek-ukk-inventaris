<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <title>@yield('title', 'User Panel')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        .navbar-nav .nav-link {
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }
        .navbar-nav .nav-link:hover {
            background-color: #495057;
            color: #fff;
        }
        .navbar-nav .nav-link.active {
            background-color: #6c757d; /* Gray color */
            color: #fff;
            transition: background-color 0.3s ease-in-out;
        }
        .dropdown-menu {
            transition: max-height 0.3s ease-in-out, opacity 0.3s ease-in-out;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
        }
        .dropdown-menu.show {
            max-height: 500px; /* Adjust as needed */
            opacity: 1;
        }
        .navbar {
            background-color: #343a40;
            color: #fff;
            width: 100%;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }
        .navbar .navbar-brand, .navbar .navbar-text {
            color: #ffffff;
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
<body>
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand"><i class="fas fa-user"></i> User Panel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}" href="{{ route('user.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('user.pengadaan.index') || request()->routeIs('user.mutasi-lokasi.index') || request()->routeIs('user.opname.index') || request()->routeIs('user.depresiasi.index') || request()->routeIs('user.hitung-depresiasi.index') ? 'active' : '' }}" href="#" id="transaksiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-exchange-alt"></i> Transaksi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="transaksiDropdown">
                                <li><a class="dropdown-item {{ request()->routeIs('user.pengadaan.index') ? 'fw-bold' : '' }}" href="{{ route('user.pengadaan.index') }}"><i class="fas fa-shopping-cart"></i> Pengadaan</a></li>
                                <li><a class="dropdown-item {{ request()->routeIs('user.opname.index') ? 'fw-bold' : '' }}" href="{{ route('user.opname.index') }}"><i class="fas fa-clipboard-check"></i> Opname</a></li>
                                <li><a class="dropdown-item {{ request()->routeIs('user.hitung-depresiasi.index') ? 'fw-bold' : '' }}" href="{{ route('user.hitung-depresiasi.index') }}"><i class="fas fa-percentage"></i> Hitung Depresiasi</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('profile.edit') ? 'active' : '' }}" href="#" id="pengaturanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-cog"></i> Pengaturan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="pengaturanDropdown">
                                <li><a class="dropdown-item {{ request()->routeIs('profile.edit') ? 'fw-bold' : '' }}" href="{{ route('profile.edit') }}"><i class="fas fa-user"></i> Akun Pengguna</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                       <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        Halo, {{ Auth::user()->name }}
                    </span>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="container-fluid p-4 content">
            <!-- Breadcrumbs -->
            @yield('breadcrumbs')

            <!-- Content -->
            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="footer text-center py-3 border-top mt-auto">
            <p class="mb-0">&copy; {{ date('Y') }} User Panel. All Rights Reserved.</p>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Scripts section -->
    @yield('scripts')

</body>
</html>
