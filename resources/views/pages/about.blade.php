@extends('layouts.app')

@section('title', "Tentang Kami — Liipa'")
@section('meta_description', 'Kenali Liipa.id: visi-misi, perjalanan, dampak, dan tim di balik platform syariah pengelola limbah tekstil menjadi karya bernilai.')

@section('content')
    {{-- Hero --}}
    <div class="container-fluid header position-relative overflow-hidden bg-white p-0">
        <div class="hero-blob hero-blob--one" aria-hidden="true"></div>
        <div class="hero-blob hero-blob--two" aria-hidden="true"></div>
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row position-relative">
            <div class="col-md-6 p-5 mt-lg-5">
                <span class="hero-badge mb-3 hero-enter" style="--enter-delay: 0s">
                    <i class="bi bi-heart-fill" aria-hidden="true"></i>Cerita di Balik Liipa'
                </span>
                <h1 class="display-5 mb-4 hero-enter" style="--enter-delay: 0.1s">Mengubah <span class="text-primary">Kain Perca</span> Menjadi Karya Bermakna.</h1>
                <nav aria-label="breadcrumb" class="hero-enter" style="--enter-delay: 0.3s">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-body active" aria-current="page">Tentang Kami</li>
                    </ol>
                </nav>
                <p class="h2 mb-4 hero-enter" style="--enter-delay: 0.5s"><span class="text-primary typewriter"
                        data-text="From Waste to Wonder...">From Waste to Wonder...</span></p>
            </div>
            <div class="col-md-6">
                <div class="hero-img m-4 m-lg-5">
                    <picture>
                        <source type="image/webp" srcset="{{ asset('img/hero1-600.webp') }} 600w, {{ asset('img/hero1-800.webp') }} 800w"
                            sizes="(max-width: 767px) 100vw, 50vw">
                        <img class="img-fluid w-100" src="{{ asset('img/hero1.jpeg') }}" width="800" height="800"
                            fetchpriority="high" alt="Produk kerajinan kain perca Liipa">
                    </picture>
                    <div class="hero-chip">
                        <i class="bi bi-people-fill" aria-hidden="true"></i>Didukung Pengrajin Lokal
                    </div>
                </div>
            </div>
        </div>
        <a href="#kisah-kami" class="hero-scroll d-none d-lg-flex" aria-label="Gulir ke bagian Kisah Kami">
            <i class="bi bi-chevron-down" aria-hidden="true"></i>
        </a>
    </div>

    {{-- Kisah kami --}}
    <div id="kisah-kami" class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 reveal">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('img/hero2-600.webp') }} 600w, {{ asset('img/hero2-1200.webp') }} 1200w"
                                sizes="(max-width: 991px) 100vw, 50vw">
                            <img class="img-fluid w-100" src="{{ asset('img/hero2.jpg') }}" width="1200" height="1200"
                                loading="lazy" decoding="async" alt="Pengrajin mengolah kain perca menjadi produk baru">
                        </picture>
                    </div>
                </div>
                <div class="col-lg-6 reveal" style="--reveal-delay: 0.2s">
                    <h2 class="mb-4 section-title section-title--start">Kisah Kami: Dari Limbah Menjadi Berkah</h2>
                    <p class="mb-4">Liipa' lahir dari keprihatinan terhadap limbah tekstil yang terus menumpuk.
                        Kami percaya setiap potongan kain perca punya potensi menjadi produk bernilai — sekaligus
                        membuka lapangan kerja bagi pengrajin lokal dan mengurangi jejak karbon industri mode.</p>
                    <p class="mb-4">Dengan berpegang pada nilai syariah dan prinsip ekonomi sirkular, kami menghubungkan
                        donatur kain bekas, pengrajin mitra, dan pembeli dalam satu ekosistem yang saling memberdayakan —
                        agar tidak ada potongan kain yang berakhir sia-sia.</p>
                    <p><i class="bi bi-check-lg text-primary me-3" aria-hidden="true"></i>Bahan baku 100% kain perca daur ulang</p>
                    <p><i class="bi bi-check-lg text-primary me-3" aria-hidden="true"></i>Dikerjakan tangan oleh pengrajin lokal</p>
                    <p><i class="bi bi-check-lg text-primary me-3" aria-hidden="true"></i>Berbasis ekonomi sirkular dan nilai syariah</p>
                    <a class="btn btn-primary py-3 px-5 me-3 mt-3" href="{{ route('contact') }}">Hubungi Kami</a>
                    <a class="btn btn-outline-primary py-3 px-4 mt-3" href="{{ route('catalog') }}">Lihat Katalog<i class="bi bi-arrow-right ms-2" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>

    {{-- Visi & misi --}}
    <x-wave-divider />
    <div class="container-xxl py-5 bg-light">
        <div class="container">
            <div class="text-center mx-auto mb-5 reveal" style="max-width: 600px;">
                <h2 class="mb-3 section-title">Visi &amp; Misi</h2>
                <p>Arah dan komitmen kami dalam membangun industri mode yang berkelanjutan dan memberdayakan.</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-5 col-md-6 reveal">
                    <div class="role-card">
                        <span class="role-icon"><i class="bi bi-eye-fill" aria-hidden="true"></i></span>
                        <h3 class="h4 mb-3">Visi</h3>
                        <p class="mb-0">Menjadi platform syariah terdepan dalam pengelolaan limbah tekstil di
                            Indonesia — menciptakan industri mode yang berkelanjutan, memberdayakan pengrajin
                            lokal, dan menginspirasi gaya hidup ramah lingkungan.</p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 reveal" style="--reveal-delay: 0.15s">
                    <div class="role-card">
                        <span class="role-icon"><i class="bi bi-bullseye" aria-hidden="true"></i></span>
                        <h3 class="h4 mb-3">Misi</h3>
                        <p class="mb-2"><i class="bi bi-check-lg text-primary me-2" aria-hidden="true"></i>Mengumpulkan dan mengolah limbah tekstil menjadi produk bernilai</p>
                        <p class="mb-2"><i class="bi bi-check-lg text-primary me-2" aria-hidden="true"></i>Memberdayakan pengrajin dan komunitas lokal</p>
                        <p class="mb-2"><i class="bi bi-check-lg text-primary me-2" aria-hidden="true"></i>Menerapkan ekonomi sirkular berbasis nilai syariah</p>
                        <p class="mb-0"><i class="bi bi-check-lg text-primary me-2" aria-hidden="true"></i>Mengedukasi masyarakat tentang sustainable fashion</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-wave-divider flip />

    {{-- Perjalanan kami --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 reveal" style="max-width: 600px;">
                <h2 class="mb-3 section-title">Perjalanan Kami</h2>
                <p>Langkah demi langkah Liipa' tumbuh — dari sebuah ide sederhana menjadi gerakan bersama.</p>
            </div>
            <div class="timeline">
                @foreach ([
                    ['year' => '2023', 'title' => 'Ide Lahir', 'icon' => 'bi-lightbulb', 'text' => 'Berawal dari keprihatinan melihat tumpukan kain perca sisa produksi, kami mulai merancang cara mengubahnya menjadi sesuatu yang bernilai.'],
                    ['year' => '2024', 'title' => 'Mitra Pertama', 'icon' => 'bi-people', 'text' => 'Pengrajin lokal pertama bergabung sebagai mitra. Potongan kain pertama diolah menjadi produk handmade yang siap dipasarkan.'],
                    ['year' => '2024', 'title' => 'Platform Diluncurkan', 'icon' => 'bi-rocket-takeoff', 'text' => 'Liipa.id hadir secara online — menghubungkan donatur kain bekas, pengrajin mitra, dan pembeli dalam satu ekosistem.'],
                    ['year' => '2025', 'title' => 'Tumbuh Bersama', 'icon' => 'bi-graph-up-arrow', 'text' => 'Ratusan ribu pengguna bergabung dan ratusan ton emisi berhasil dihindari. Perjalanan kami baru saja dimulai.'],
                ] as $milestone)
                    <div class="timeline-item reveal" style="--reveal-delay: {{ $loop->index * 0.15 }}s">
                        <span class="timeline-dot" aria-hidden="true"><i class="bi {{ $milestone['icon'] }}"></i></span>
                        <div class="timeline-card">
                            <small class="text-uppercase fw-semibold">{{ $milestone['year'] }}</small>
                            <h3 class="h5 mt-1 mb-2">{{ $milestone['title'] }}</h3>
                            <p class="mb-0">{{ $milestone['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Dampak kami --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="funfact-box">
                <div class="funfact-section text-center">
                    <div class="funfact-bg" style="background-image: url('{{ asset('img/fun-fact.svg') }}')" aria-hidden="true"></div>
                    <div class="funfact-overlay" aria-hidden="true"></div>
                    <div class="funfact-pings" aria-hidden="true">
                        <span class="map-ping" style="--ping-x: 13%; --ping-y: 36%; --ping-delay: 0s"></span>
                        <span class="map-ping" style="--ping-x: 26%; --ping-y: 72%; --ping-delay: 0.6s"></span>
                        <span class="map-ping" style="--ping-x: 42%; --ping-y: 38%; --ping-delay: 1.2s"></span>
                        <span class="map-ping" style="--ping-x: 55%; --ping-y: 55%; --ping-delay: 0.9s"></span>
                        <span class="map-ping" style="--ping-x: 67%; --ping-y: 33%; --ping-delay: 1.8s"></span>
                        <span class="map-ping" style="--ping-x: 88%; --ping-y: 58%; --ping-delay: 1.5s"></span>
                    </div>
                    <div class="funfact-particles" aria-hidden="true">
                        <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                    </div>
                    <div class="container position-relative">
                        <div class="mb-5 reveal">
                            <h2 class="h5 fw-semibold text-uppercase text-light mb-0">Dampak Kami Sejauh Ini</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-6">
                                <div class="funfact-item mb-4 reveal" style="--reveal-delay: 0.1s">
                                    <span class="counter text-light" data-value="494802" data-animation-duration="3000">0</span>
                                    <small class="d-block text-light">Pengguna Aktif</small>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="funfact-item mb-4 reveal" style="--reveal-delay: 0.25s">
                                    <span class="counter text-light" data-value="26864" data-animation-duration="3000">0</span>
                                    <small class="d-block text-light">Transaksi</small>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="funfact-item mb-4 reveal" style="--reveal-delay: 0.4s">
                                    <span class="counter text-light" data-value="245" data-animation-duration="3000">0</span>
                                    <span class="text-light">ton</span>
                                    <small class="d-block text-light">Emisi Terhindar</small>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="funfact-item mb-4 reveal" style="--reveal-delay: 0.55s">
                                    <span class="counter text-light" data-value="120" data-animation-duration="3000">0</span>
                                    <small class="d-block text-light">Pengrajin Mitra</small>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 reveal" style="--reveal-delay: 0.7s">
                            <p class="text-light mb-0">Data per Juli 2025</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tim --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 reveal" style="max-width: 600px;">
                <span class="hero-badge mb-3">
                    <i class="bi bi-stars" aria-hidden="true"></i>Orang-Orang di Balik Liipa'
                </span>
                <h2 class="mb-3 section-title">Tim Kami</h2>
                <p>Kesuksesan Liipa' tidak terlepas dari dedikasi tim kami yang penuh kreativitas, semangat, dan inovasi.</p>
            </div>
            <div class="row g-4">
                @foreach ([
                    ['name' => 'Mohammad Djafar Ramadhan', 'role' => "CEO & Founder Liipa'"],
                    ['name' => 'Muhammad Rofiq Roihan', 'role' => 'Front-end Developer'],
                    ['name' => 'Aditya Rahmatullah', 'role' => 'Full Stack Developer'],
                    ['name' => 'Fathier Muhammad Ariesta', 'role' => 'Front-end Developer'],
                ] as $member)
                    <div class="col-lg-3 col-md-6 reveal" style="--reveal-delay: {{ $loop->index * 0.15 }}s">
                        <div class="team-item rounded overflow-hidden h-100">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="{{ asset('img/placeholder-avatar.svg') }}"
                                    loading="lazy" decoding="async" width="300" height="300"
                                    alt="Foto {{ $member['name'] }}">
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h3 class="h5 fw-bold mb-0">{{ $member['name'] }}</h3>
                                <small>{{ $member['role'] }}</small>
                                <div class="d-flex justify-content-center gap-2 mt-3">
                                    <a class="btn btn-square" href="#" aria-label="LinkedIn {{ $member['name'] }}"><i class="bi bi-linkedin" aria-hidden="true"></i></a>
                                    <a class="btn btn-square" href="#" aria-label="Instagram {{ $member['name'] }}"><i class="bi bi-instagram" aria-hidden="true"></i></a>
                                    <a class="btn btn-square" href="#" aria-label="Email {{ $member['name'] }}"><i class="bi bi-envelope" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- CTA penutup --}}
    <div class="container-xxl pb-5">
        <div class="container">
            <div class="funfact-box">
                <div class="funfact-section text-center">
                    <div class="funfact-bg" style="background-image: url('{{ asset('img/call-to-action.jpg') }}')" aria-hidden="true"></div>
                    <div class="funfact-overlay" aria-hidden="true"></div>
                    <div class="container position-relative reveal">
                        <h2 class="text-light mb-3">Mari Jadi Bagian dari Perubahan</h2>
                        <p class="text-light mx-auto mb-4" style="max-width: 600px;">Donasikan kain bekasmu, jadilah
                            pengrajin mitra, atau dukung gerakan ini lewat setiap pembelian. Bersama, kita ubah limbah
                            menjadi berkah.</p>
                        <a class="btn btn-light py-3 px-5 me-3" href="{{ route('heroes') }}">Gabung The Heroes</a>
                        <a class="btn btn-outline-light py-3 px-4" href="{{ route('contact') }}">Hubungi Kami<i class="bi bi-arrow-right ms-2" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
