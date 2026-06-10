<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — Liipa' Admin</title>
    <meta name="robots" content="noindex, nofollow">

    <link rel="icon" href="{{ asset('img/icon.png') }}">

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-light">
    <div class="d-flex min-vh-100">
        {{-- Sidebar --}}
        <nav class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 240px; background-color: #f4801e;"
            aria-label="Navigasi admin">
            <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center mb-3 text-white text-decoration-none">
                <img src="{{ asset('img/icon.png') }}" alt="Logo Liipa" width="60" height="30" class="me-2 bg-white rounded p-1">
                <span class="fs-5 fw-bold">Liipa' Admin</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link text-white @if (request()->routeIs('admin.dashboard')) active bg-dark @endif">
                        <i class="bi bi-speedometer2 me-2" aria-hidden="true"></i>Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}"
                        class="nav-link text-white @if (request()->routeIs('admin.products.*')) active bg-dark @endif">
                        <i class="bi bi-box-seam me-2" aria-hidden="true"></i>Produk
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}"
                        class="nav-link text-white @if (request()->routeIs('admin.categories.*')) active bg-dark @endif">
                        <i class="bi bi-tags me-2" aria-hidden="true"></i>Kategori
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}" class="nav-link text-white">
                        <i class="bi bi-house me-2" aria-hidden="true"></i>Lihat Situs
                    </a>
                </li>
            </ul>
            <hr>
            <div class="d-flex align-items-center justify-content-between">
                <span class="small">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-light">
                        <i class="bi bi-box-arrow-right me-1" aria-hidden="true"></i>Keluar
                    </button>
                </form>
            </div>
        </nav>

        {{-- Konten --}}
        <main class="flex-grow-1 p-4" id="main-content">
            <h1 class="h3 mb-4">@yield('title', 'Dashboard')</h1>
            @yield('content')
        </main>
    </div>

    <x-toast-stack />

    @stack('scripts')
</body>

</html>
