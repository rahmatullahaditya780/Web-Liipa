<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4" aria-label="Navigasi utama">
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
            <div class="icon p-2 me-2">
                <img class="img-fluid" src="{{ asset('img/icon.png') }}" alt="Logo Liipa" width="80" height="40">
            </div>
            <h1 class="m-0 text-primary">Liipa'</h1>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Buka menu navigasi">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="{{ route('home') }}" class="nav-item nav-link @if (request()->routeIs('home')) active @endif">Home</a>
                <a href="{{ route('catalog') }}" class="nav-item nav-link @if (request()->routeIs('catalog')) active @endif">Katalog</a>
                <a href="{{ route('heroes') }}" class="nav-item nav-link @if (request()->routeIs('heroes')) active @endif">The Heroes</a>
                <a href="{{ route('about') }}" class="nav-item nav-link @if (request()->routeIs('about')) active @endif">Tentang Kami</a>
                <a href="{{ route('contact') }}" class="nav-item nav-link @if (request()->routeIs('contact')) active @endif">Kontak</a>
            </div>

            @auth
                @if (auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary px-3 me-2 d-lg-flex">Dashboard</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger px-3 d-lg-flex">Keluar</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary px-3 d-lg-flex">Masuk</a>
            @endauth
        </div>
    </nav>
</div>
