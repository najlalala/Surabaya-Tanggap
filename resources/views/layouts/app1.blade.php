<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SurabayaTanggap')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">SurabayaTanggap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        @if(auth()->user()->role == 'warga')
                            <li class="nav-item"><a class="nav-link" href="{{ route('warga.dashboard') }}">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('warga.buat-aduan') }}">Buat Aduan</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('warga.status-aduan') }}">Status Aduan</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('warga.profil') }}">Profil</a></li>
                        @elseif(auth()->user()->role == 'admin')
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.daftar-aduan') }}">Daftar Aduan Masuk</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.tanggapi-aduan') }}">Tanggapi Aduan Masuk</a></li>
                        @endif
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('warga.dashboard') }}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('warga.buat-aduan') }}">Buat Aduan</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('warga.status-aduan') }}">Status Aduan</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('warga.profil') }}">Profil</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-4">
        @yield('content')
    </main>

    <footer class="bg-light text-center text-lg-start mt-4">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            SurabayaTanggap_Kelompok10
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
