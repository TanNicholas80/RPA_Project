<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        /* Mengatur font global */
        body {
            font-family: 'Roboto', sans-serif;
        }

        /* Margin khusus untuk konten */
        .custom-margin {
            margin: 0 5%;
        }

        /* Navbar item spacing */
        .navbar-nav .nav-item + .nav-item {
            margin-left: 20px;
        }

        /* Navbar container width */
        .navbar .container {
            max-width: 960px;
        }

        /* Warna teks navbar */
        .navbar-light .nav-link {
            color: #6c757d !important;
            transition: color 0.3s ease;
        }

        .navbar-light .nav-link:hover {
            color: #343a40 !important;
        }

        /* Footer styling */
        footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container">
                <a href="/" class="navbar-brand">
                    <img src="{{ asset('image/Logo.png') }}" alt="Logo" style="height: 70px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a href="/" class="nav-link font-medium">Beranda</a></li>
                        <li class="nav-item"><a href="/tentang" class="nav-link font-medium">Tentang Kami</a></li>
                        <li class="nav-item"><a href="/produk" class="nav-link font-medium">Produk</a></li>
                        <li class="nav-item"><a href="/portofolio" class="nav-link font-medium">Portofolio</a></li>
                        <li class="nav-item"><a href="/kontak" class="nav-link font-medium">Kontak</a></li>
                    </ul>
                </div>
                @if (Route::has('login'))
                <div class="ms-3">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary btn-sm">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm">Log in</a>
                    @endauth
                </div>
                @endif
            </div>
        </nav>
    </header>

    <main class="custom-margin">
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 RPA Project Photo Studio</p>
    </footer>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
