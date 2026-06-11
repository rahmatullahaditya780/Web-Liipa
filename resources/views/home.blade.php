@extends('layouts.app')

@section('title', "Liipa' — Sustainable Fashion dari Kain Perca")

@section('content')
    {{-- Hero --}}
    <div class="container-fluid header position-relative overflow-hidden bg-white p-0">
        <div class="hero-blob hero-blob--one" aria-hidden="true"></div>
        <div class="hero-blob hero-blob--two" aria-hidden="true"></div>
        <div id="heroCarousel" class="carousel slide carousel-fade header-carousel position-relative"
            data-bs-ride="carousel" data-bs-interval="6000" data-bs-pause="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                        <div class="col-md-6 p-5 mt-lg-5">
                            <span class="hero-badge mb-3 hero-enter" style="--enter-delay: 0s">
                                <i class="bi bi-recycle" aria-hidden="true"></i>Sustainable Fashion &bull; Ekonomi Sirkular
                            </span>
                            <h1 class="display-5 mb-4 hero-enter" style="--enter-delay: 0.1s">Beralih ke Kehidupan <span class="text-primary">Ramah Lingkungan</span>
                                dengan Desain Unik.</h1>
                            <p class="mb-4 pb-2 hero-enter" style="--enter-delay: 0.3s">Liipa.id adalah platform syariah yang mengelola limbah tekstil secara
                                berkelanjutan melalui teknologi digital dan konsep ekonomi sirkular. Kami hadir untuk membantu
                                mengurangi sampah tekstil di Indonesia dengan cara mengumpulkan, mendaur ulang, dan meng-upcycle
                                perca menjadi produk bernilai, seperti aksesori dan barang kebutuhan harian.</p>
                            <p class="h2 hero-enter" style="--enter-delay: 0.5s"><span class="text-primary typewriter"
                                    data-text="Sustainable Fashion Starts Here...">Sustainable Fashion Starts Here...</span></p>
                            @guest
                                <a href="{{ route('register') }}" class="btn btn-primary py-3 px-5 me-3 mt-3 hero-enter" style="--enter-delay: 0.7s">Mulai Sekarang</a>
                                <a href="{{ route('catalog') }}" class="btn btn-outline-primary py-3 px-4 mt-3 hero-enter" style="--enter-delay: 0.8s">Lihat Katalog<i class="bi bi-arrow-right ms-2" aria-hidden="true"></i></a>
                            @else
                                <a href="{{ route('catalog') }}" class="btn btn-primary py-3 px-5 me-3 mt-3 hero-enter" style="--enter-delay: 0.7s">Lihat Katalog</a>
                                <a href="{{ route('about') }}" class="btn btn-outline-primary py-3 px-4 mt-3 hero-enter" style="--enter-delay: 0.8s">Tentang Kami<i class="bi bi-arrow-right ms-2" aria-hidden="true"></i></a>
                            @endguest
                            <div class="hero-stats mt-4 pt-3 hero-enter" style="--enter-delay: 0.9s">
                                <div class="hero-stat">
                                    <strong>494rb+</strong>
                                    <small>Pengguna Aktif</small>
                                </div>
                                <div class="hero-stat">
                                    <strong>26rb+</strong>
                                    <small>Transaksi</small>
                                </div>
                                <div class="hero-stat">
                                    <strong>245 ton</strong>
                                    <small>Emisi Terhindar</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="hero-img m-4 m-lg-5">
                                <picture>
                                    <source type="image/webp" srcset="{{ asset('img/hero1-600.webp') }} 600w, {{ asset('img/hero1-800.webp') }} 800w"
                                        sizes="(max-width: 767px) 100vw, 50vw">
                                    <img class="img-fluid w-100" src="{{ asset('img/hero1.jpeg') }}" width="800" height="800"
                                        fetchpriority="high" alt="Produk fashion ramah lingkungan dari kain perca Liipa">
                                </picture>
                                <div class="hero-chip">
                                    <i class="bi bi-recycle" aria-hidden="true"></i>100% Kain Daur Ulang
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                        <div class="col-md-6 p-5 mt-lg-5">
                            <span class="hero-badge mb-3 hero-enter" style="--enter-delay: 0s">
                                <i class="bi bi-scissors" aria-hidden="true"></i>Pemberdayaan Pengrajin Lokal
                            </span>
                            <h2 class="display-5 mb-4 hero-enter" style="--enter-delay: 0.1s">Di Balik Setiap Produk, Ada <span class="text-primary">Pengrajin Lokal</span> yang Berdaya.</h2>
                            <p class="mb-4 pb-2 hero-enter" style="--enter-delay: 0.3s">Bersama mitra pengrajin dan komunitas, kami mengubah tumpukan
                                perca menjadi karya penuh makna. Setiap pembelian Anda ikut membuka lapangan kerja sekaligus
                                mengurangi limbah tekstil yang berakhir di tempat pembuangan.</p>
                            <p class="h2 hero-enter" style="--enter-delay: 0.5s"><span class="text-primary typewriter"
                                    data-text="Every Scrap Tells a Story...">Every Scrap Tells a Story...</span></p>
                            <a href="{{ route('heroes') }}" class="btn btn-primary py-3 px-5 me-3 mt-3 hero-enter" style="--enter-delay: 0.7s">Kenali The Heroes</a>
                            <a href="{{ route('catalog') }}" class="btn btn-outline-primary py-3 px-4 mt-3 hero-enter" style="--enter-delay: 0.8s">Lihat Katalog<i class="bi bi-arrow-right ms-2" aria-hidden="true"></i></a>
                            <div class="hero-stats mt-4 pt-3 hero-enter" style="--enter-delay: 0.9s">
                                <div class="hero-stat">
                                    <strong>494rb+</strong>
                                    <small>Pengguna Aktif</small>
                                </div>
                                <div class="hero-stat">
                                    <strong>26rb+</strong>
                                    <small>Transaksi</small>
                                </div>
                                <div class="hero-stat">
                                    <strong>245 ton</strong>
                                    <small>Emisi Terhindar</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="hero-img m-4 m-lg-5">
                                <picture>
                                    <source type="image/webp" srcset="{{ asset('img/hero2-600.webp') }} 600w, {{ asset('img/hero2-1200.webp') }} 1200w"
                                        sizes="(max-width: 767px) 100vw, 50vw">
                                    <img class="img-fluid w-100" src="{{ asset('img/hero2.jpg') }}" width="1200" height="1200"
                                        loading="lazy" decoding="async" alt="Kerajinan tangan dari kain perca daur ulang">
                                </picture>
                                <div class="hero-chip">
                                    <i class="bi bi-scissors" aria-hidden="true"></i>Handmade Pengrajin Lokal
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="#tentang-kami" class="hero-scroll d-none d-lg-flex" aria-label="Gulir ke bagian Tentang Kami">
            <i class="bi bi-chevron-down" aria-hidden="true"></i>
        </a>
    </div>

    {{-- Tentang kami --}}
    <div id="tentang-kami" class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 reveal">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <picture>
                            <source type="image/webp" srcset="{{ asset('img/hero2-600.webp') }} 600w, {{ asset('img/hero2-1200.webp') }} 1200w"
                                sizes="(max-width: 991px) 100vw, 50vw">
                            <img class="img-fluid w-100" src="{{ asset('img/hero2.jpg') }}" width="1200" height="1200"
                                loading="lazy" decoding="async" alt="Proses pengolahan kain perca menjadi produk bernilai">
                        </picture>
                    </div>
                </div>
                <div class="col-lg-6 reveal" style="--reveal-delay: 0.2s">
                    <h2 class="mb-4 section-title section-title--start">Kenal Lebih Dekat Dengan Kami</h2>
                    <p class="mb-4">Kami mengumpulkan kain perca dan limbah tekstil dari rumah produksi fashion, pabrik
                        garmen, UMKM, individu, dan pusat daur ulang, melalui proses seleksi dan klasifikasi kualitas,
                        untuk kemudian diolah menjadi produk handmade yang bernilai guna dan disalurkan kepada
                        masyarakat luas sebagai bagian dari upaya menciptakan industri mode berkelanjutan.</p>
                    <p><i class="bi bi-check-lg text-primary me-3" aria-hidden="true"></i>Kami mengolah limbah tekstil menjadi produk bernilai</p>
                    <p><i class="bi bi-check-lg text-primary me-3" aria-hidden="true"></i>Kami memberdayakan pengrajin dan komunitas lokal</p>
                    <p><i class="bi bi-check-lg text-primary me-3" aria-hidden="true"></i>Kami mendorong mode yang ramah lingkungan</p>
                    <a class="btn btn-primary py-3 px-5 mt-3" href="{{ route('about') }}">Pelajari Lebih Lanjut</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Fun fact --}}
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
                            <h2 class="h5 fw-semibold text-uppercase text-light mb-0">Juli 2025</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="funfact-item mb-4 reveal" style="--reveal-delay: 0.1s">
                                    <span class="counter text-light" data-value="494802" data-animation-duration="3000">0</span>
                                    <small class="d-block text-light">Pengguna Aktif</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="funfact-item mb-4 reveal" style="--reveal-delay: 0.25s">
                                    <span class="counter text-light" data-value="26864" data-animation-duration="3000">0</span>
                                    <small class="d-block text-light">Transaksi</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="funfact-item mb-4 reveal" style="--reveal-delay: 0.4s">
                                    <span class="counter text-light" data-value="245" data-animation-duration="3000">0</span>
                                    <span class="text-light">ton</span>
                                    <small class="d-block text-light">Emisi Terhindar</small>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 reveal" style="--reveal-delay: 0.55s">
                            <p class="text-light mb-0">Data per Juli 2025</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Produk unggulan --}}
    <x-wave-divider />
    <div class="container-xxl py-5 bg-light">
        <div class="container">
            <div class="text-center mx-auto mb-5 reveal" style="max-width: 600px;">
                <h2 class="mb-3 section-title">Produk Kami</h2>
                <p>Melalui Liipa' kain perca yang sebelumnya dianggap limbah diubah menjadi produk bernilai tinggi.</p>
            </div>
            <div class="row g-4">
                @forelse ($featuredProducts as $product)
                    <div class="col-lg-3 col-sm-6 reveal" style="--reveal-delay: {{ $loop->index * 0.1 }}s">
                        <a class="cat-item d-block bg-white shadow-sm text-center rounded p-3 text-decoration-none"
                            href="{{ route('catalog', ['kategori' => $product->category->slug]) }}">
                            <div class="rounded p-4">
                                <div class="icon mb-3">
                                    <img class="img-fluid w-100 object-fit-cover" style="height: 150px" loading="lazy"
                                        decoding="async" width="250" height="150" src="{{ $product->display_image }}"
                                        alt="{{ $product->name }}">
                                </div>
                                <h3 class="h6">{{ $product->name }}</h3>
                                <span>Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="mb-0">Belum ada produk unggulan. Silakan kembali lagi nanti.</p>
                    </div>
                @endforelse
            </div>
            <div class="text-center mt-5">
                <a class="btn btn-outline-primary py-3 px-5" href="{{ route('catalog') }}">Lihat Semua Produk</a>
            </div>
        </div>
    </div>
    <x-wave-divider flip />

    {{-- Tim --}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 reveal" style="max-width: 600px;">
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
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Testimoni --}}
    <x-wave-divider />
    <div class="container-xxl py-5 bg-light">
        <div class="container">
            <div class="text-center mx-auto mb-5 reveal" style="max-width: 600px;">
                <h2 class="mb-3 section-title">Kata Mereka</h2>
                <p>Cerita dari pelanggan dan mitra yang telah merasakan manfaat produk daur ulang Liipa'.</p>
            </div>
            <div id="testimonialCarousel" class="carousel slide testimonial-carousel reveal" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ([
                        ['text' => 'Produknya unik dan berkualitas. Senang bisa ikut mengurangi limbah tekstil lewat belanja di Liipa.', 'name' => 'Rina S.', 'role' => 'Pelanggan', 'img' => 'testimonial-1.jpg'],
                        ['text' => 'Sebagai mitra pengrajin, Liipa memberi kami akses pasar yang lebih luas dan pelatihan yang bermanfaat.', 'name' => 'Pak Budi', 'role' => 'Mitra Pengrajin', 'img' => 'testimonial-2.jpg'],
                        ['text' => 'Aksesorisnya jadi conversation starter — semua orang tanya beli di mana. Bangga pakai produk daur ulang.', 'name' => 'Maya A.', 'role' => 'Pelanggan', 'img' => 'testimonial-3.jpg'],
                    ] as $testimonial)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="testimonial-item bg-white rounded p-3">
                                        <div class="bg-white border rounded p-4">
                                            <p>{{ $testimonial['text'] }}</p>
                                            <div class="d-flex align-items-center">
                                                <img class="img-fluid flex-shrink-0 rounded" loading="lazy" decoding="async"
                                                    src="{{ asset('img/'.$testimonial['img']) }}" width="45" height="45"
                                                    alt="Foto {{ $testimonial['name'] }}">
                                                <div class="ps-3">
                                                    <h3 class="h6 fw-bold mb-1">{{ $testimonial['name'] }}</h3>
                                                    <small>{{ $testimonial['role'] }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                    <i class="bi bi-arrow-left" aria-hidden="true"></i>
                    <span class="visually-hidden">Testimoni sebelumnya</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                    <i class="bi bi-arrow-right" aria-hidden="true"></i>
                    <span class="visually-hidden">Testimoni berikutnya</span>
                </button>
            </div>
        </div>
    </div>
    <x-wave-divider flip />
@endsection
