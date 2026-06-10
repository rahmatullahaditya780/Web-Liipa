<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Liipa\' — Sustainable Fashion dari Kain Perca')</title>
    <meta name="description" content="@yield('meta_description', 'Liipa.id mengelola limbah tekstil secara berkelanjutan: kain perca didaur ulang menjadi aksesori dan produk kebutuhan harian yang bernilai.')">

    <link rel="icon" href="{{ asset('img/icon.png') }}">

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <a class="skip-link" href="#main-content">Langsung ke konten utama</a>

    <div class="container-xxl bg-white p-0">
        <x-navbar />

        <main id="main-content">
            @yield('content')
        </main>

        <x-footer />

        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top" aria-label="Kembali ke atas">
            <i class="bi bi-arrow-up" aria-hidden="true"></i>
        </a>
    </div>

    <x-toast-stack />

    @stack('scripts')
</body>

</html>
